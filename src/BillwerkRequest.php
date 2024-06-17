<?php

namespace Billwerk\Sdk;

use Billwerk\Sdk\Exception\BillwerkApiException;
use Billwerk\Sdk\Exception\BillwerkClientException;
use Billwerk\Sdk\Exception\BillwerkNetworkException;
use Billwerk\Sdk\Exception\BillwerkRequestException;
use Billwerk\Sdk\Helper\HttpStatusCodeInterface;
use Billwerk\Sdk\Logger\SdkLoggerInterface;
use Billwerk\Sdk\Model\ErrorModel;
use Billwerk\Sdk\Util\LastRequestInfo;
use Billwerk\Sdk\Util\Sleep;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Client\NetworkExceptionInterface;
use Psr\Http\Client\RequestExceptionInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

class BillwerkRequest
{
    public const POST_REQUEST            = 'POST';
    public const PUT_REQUEST             = 'PUT';
    public const GET_REQUEST             = 'GET';
    public const PATCH_REQUEST           = 'PATCH';
    public const DELETE_REQUEST          = 'DELETE';
    public const APPLICATION_JSON_HEADER = 'application/json';

    private int $retryCount    = 0;
    private int $maxRetryCount = 5;
    private bool $needToRetry   = false;

    private string $apiKey;
    private string $baseUrl;
    private ClientInterface $client;
    private RequestFactoryInterface $requestFactory;
    private StreamFactoryInterface $streamFactory;
    private Sleep $sleepInstance;
    private ?SdkLoggerInterface $logger = null;

    private string $lastHttpMethod;
    private string $lastUri;
    private array $lastBody         = [];
    private ?array $lastQueryParams  = null;
    private ?string $lastResponse     = null;
    private ?int $lastResponseCode = null;

    public function __construct(
        string $apiKey,
        ClientInterface $client,
        RequestFactoryInterface $requestFactory,
        StreamFactoryInterface $streamFactory,
        ?SdkLoggerInterface $logger,
        ?string $baseUrl = Billwerk::API_BASE
    ) {
        $this->apiKey         = $apiKey;
        $this->client         = $client;
        $this->baseUrl        = $baseUrl;
        $this->requestFactory = $requestFactory;
        $this->streamFactory  = $streamFactory;
        $this->logger  = $logger;
        $this->sleepInstance  = new Sleep();
    }

    private static function getDefaultHeaders(
        string $apiKey
    ): array {
        return [
            'Accept'        => self::APPLICATION_JSON_HEADER,
            'Content-Type'  => self::APPLICATION_JSON_HEADER,
            'Authorization' => 'Basic ' . base64_encode($apiKey . ':')
        ];
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @throws BillwerkNetworkException
     * @throws BillwerkRequestException
     * @throws BillwerkClientException
     * @throws BillwerkApiException
     */
    public function get(
        string $route,
        array $queryParams = [],
        array $headers = [],
        int $delayBetweenRetry = 1
    ): array {
        return $this->sendRequest(self::GET_REQUEST, $route, $queryParams, [], $headers, $delayBetweenRetry);
    }

    /**
     * @throws BillwerkRequestException
     * @throws BillwerkApiException
     * @throws BillwerkNetworkException
     * @throws BillwerkClientException
     */
    public function post(
        string $route,
        array $body = [],
        array $headers = [],
        int $delayBetweenRetry = 1
    ): array {
        return $this->sendRequest(self::POST_REQUEST, $route, [], $body, $headers, $delayBetweenRetry);
    }

    /**
     * @throws BillwerkNetworkException
     * @throws BillwerkRequestException
     * @throws BillwerkClientException
     * @throws BillwerkApiException
     */
    public function sendRequest(
        string $method,
        string $route,
        array $queryParams = [],
        array $body = [],
        array $headers = [],
        int $delayBetweenRetry = 1
    ): array {
        $this->setNeedToRetry(false);
        $headers     = array_merge($headers, self::getDefaultHeaders($this->apiKey));
        $queryString = ! empty($queryParams) ? '?' . $this->buildQueryWithoutIndexes($queryParams) : '';
        $uri         = Billwerk::PROTOCOL . $this->baseUrl . $route . $queryString;

        $request = $this->requestFactory->createRequest($method, $uri);
        foreach ($headers as $header => $value) {
            $request = $request->withHeader($header, $value);
        }

        $this->setLastHttpMethod($method);
        $this->setLastUri($uri);
        $this->setLastBody($body);
        $this->setLastQueryParams($queryParams);

        if ($method === self::POST_REQUEST) {
            $bodyStream = $this->streamFactory->createStream(json_encode($body));
            $request = $request->withBody($bodyStream);
        }

        try {
            $response = $this->client->sendRequest($request);
        } catch (NetworkExceptionInterface $e) {
            $this->error($e->getMessage());
            throw new BillwerkNetworkException($e->getMessage(), $e->getCode(), $this->getLastRequestInfo());
        } catch (RequestExceptionInterface $e) {
            $this->error($e->getMessage());
            throw new BillwerkRequestException($e->getMessage(), $e->getCode(), $this->getLastRequestInfo());
        } catch (ClientExceptionInterface $e) {
            $this->error($e->getMessage());
            throw new BillwerkClientException($e->getMessage(), $e->getCode(), $this->getLastRequestInfo());
        }

        $parsedResponse = $this->parseResponse($response);

        if ($this->getNeedToRetry()) {
            if ($this->getRetryCount() < $this->getMaxRetryCount()) {
                $this->setRetryCount($this->getRetryCount() + 1);
                $this->getSleepInstance()::start($delayBetweenRetry);

                return $this->sendRequest($method, $route, $queryParams, $body, $headers, $delayBetweenRetry * 2);
            } else {
                $retryCount = $this->getRetryCount();
                $this->setRetryCount(0);
                $message = "Request limit exceeded after $retryCount attempts";
                $this->error($message);
                throw new BillwerkApiException(
                    $message,
                    $response->getStatusCode(),
                    $this->getLastRequestInfo(),
                    ErrorModel::fromArray($parsedResponse)
                );
            }
        }
        $this->info("Api request {$this->getLastHttpMethod()} - {$this->getLastUri()}");

        return $parsedResponse;
    }

    /**
     * @throws BillwerkApiException
     */
    public function parseResponse(ResponseInterface $response): array
    {
        $stream             = $response->getBody();
        $bodyContents       = $stream->getContents();
        $this->setLastResponse($bodyContents);

        $decodedBody = json_decode($bodyContents, true);

        if (
            empty($bodyContents) || ! $decodedBody
        ) {
            $this->error("Response body is not json");
            throw new BillwerkApiException(
                "Response body is not json",
                $response->getStatusCode(),
                $this->getLastRequestInfo()
            );
        }

        $this->checkHttpStatus($response, $decodedBody);

        return $decodedBody;
    }

    /**
     * @throws BillwerkApiException
     */
    public function checkHttpStatus(ResponseInterface $response, array $decodedBody): void
    {
        $statusCode             = $response->getStatusCode();
        $this->lastResponseCode = $statusCode;

        if ($statusCode === HttpStatusCodeInterface::STATUS_TOO_MANY_REQUESTS) {
            $this->setNeedToRetry(true);
            $this->debug("Too many requests. Retry {$this->getLastUri()}");

            return;
        }

        if ($statusCode !== HttpStatusCodeInterface::STATUS_OK) {
            $this->error(
                "Invalid http status"
            );
            throw new BillwerkApiException(
                "Invalid http status",
                $response->getStatusCode(),
                $this->getLastRequestInfo(),
                ErrorModel::fromArray($decodedBody)
            );
        }
    }

    /**
     * Custom build query for API
     *
     * @param array $params
     * @param string $prefix
     *
     * @return string
     */
    public function buildQueryWithoutIndexes(array $params, string $prefix = ''): string
    {
        $query = '';
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $val) {
                    $query .= $prefix . $key . '=' . urlencode($val) . '&';
                }
            } else {
                $query .= $prefix . $key . '=' . urlencode($value) . '&';
            }
        }
        return rtrim($query, '&');
    }

    private function log(string $level, string $message, array $context = [])
    {
        if (!is_null($this->logger)) {
            $context = array_merge(
                ['lastRequestInfo' => $this->getLastRequestInfo()->toArray()],
                $context
            );
            $this->logger->$level($message, $context);
        }
    }

    private function error(string $message, array $context = [])
    {
        $this->log('error', $message, $context);
    }

    private function info(string $message, array $context = [])
    {
        $this->log('info', $message, $context);
    }

    private function debug(string $message, array $context = [])
    {
        $this->log('debug', $message, $context);
    }

    /**
     * @return LastRequestInfo
     */
    public function getLastRequestInfo(): LastRequestInfo
    {
        return new LastRequestInfo(
            $this->getLastHttpMethod(),
            $this->getLastUri(),
            $this->getLastBody(),
            $this->getLastQueryParams(),
            $this->getLastResponse(),
            $this->getLastResponseCode()
        );
    }

    /**
     * @param bool $needToRetry
     */
    public function setNeedToRetry(bool $needToRetry): void
    {
        $this->needToRetry = $needToRetry;
    }

    public function getNeedToRetry(): bool
    {
        return $this->needToRetry;
    }

    /**
     * @param int $retryCount
     */
    public function setRetryCount(int $retryCount): void
    {
        $this->retryCount = $retryCount;
    }

    /**
     * @return int
     */
    public function getRetryCount(): int
    {
        return $this->retryCount;
    }

    /**
     * @return int
     */
    public function getMaxRetryCount(): int
    {
        return $this->maxRetryCount;
    }

    /**
     * @return string
     */
    public function getLastHttpMethod(): string
    {
        return $this->lastHttpMethod;
    }

    /**
     * @return array
     */
    public function getLastBody(): array
    {
        return $this->lastBody;
    }

    /**
     * @return array|null
     */
    public function getLastQueryParams(): ?array
    {
        return $this->lastQueryParams;
    }

    /**
     * @return string|null
     */
    public function getLastResponse(): ?string
    {
        return $this->lastResponse;
    }

    /**
     * @return int|null
     */
    public function getLastResponseCode(): ?int
    {
        return $this->lastResponseCode;
    }

    /**
     * @return string
     */
    public function getLastUri(): string
    {
        return $this->lastUri;
    }

    /**
     * @param string $lastHttpMethod
     */
    public function setLastHttpMethod(string $lastHttpMethod): void
    {
        $this->lastHttpMethod = $lastHttpMethod;
    }

    /**
     * @param array $lastBody
     */
    public function setLastBody(array $lastBody): void
    {
        $this->lastBody = $lastBody;
    }

    /**
     * @param array|null $lastQueryParams
     */
    public function setLastQueryParams(?array $lastQueryParams): void
    {
        $this->lastQueryParams = $lastQueryParams;
    }

    /**
     * @param string|null $lastResponse
     */
    public function setLastResponse(?string $lastResponse): void
    {
        $this->lastResponse = $lastResponse;
    }

    /**
     * @param int|null $lastResponseCode
     */
    public function setLastResponseCode(?int $lastResponseCode): void
    {
        $this->lastResponseCode = $lastResponseCode;
    }

    /**
     * @param string $lastUri
     */
    public function setLastUri(string $lastUri): void
    {
        $this->lastUri = $lastUri;
    }

    /**
     * @param Sleep $sleepInstance
     */
    public function setSleepInstance(Sleep $sleepInstance): void
    {
        $this->sleepInstance = $sleepInstance;
    }

    /**
     * @return Sleep
     */
    public function getSleepInstance(): Sleep
    {
        return $this->sleepInstance;
    }
}
