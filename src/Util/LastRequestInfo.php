<?php

namespace Billwerk\Sdk\Util;

class LastRequestInfo
{
    private string $httpMethod;
    private string $uri;
    private array $body;
    private ?array $queryParams = null;
    private ?string $response = null;
    private ?int $responseCode = null;
    private int $timestamp;

    public function __construct(
        string $httpMethod,
        string $uri,
        array $body,
        ?array $queryParams,
        ?string $response,
        ?int $responseCode
    ) {
        $this->httpMethod   = $httpMethod;
        $this->uri          = $uri;
        $this->body         = $body;
        $this->queryParams  = $queryParams;
        $this->response     = $response;
        $this->responseCode = $responseCode;
        $this->timestamp    = gmdate('c');
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return array|null
     */
    public function getQueryParams(): ?array
    {
        return $this->queryParams;
    }

    /**
     * @return string|null
     */
    public function getResponse(): ?string
    {
        return $this->response;
    }

    /**
     * @return int|null
     */
    public function getResponseCode(): ?int
    {
        return $this->responseCode;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function toArray(): array
    {
        return [
            'httpMethod' => $this->getHttpMethod(),
            'uri' => $this->getUri(),
            'body' => $this->getBody(),
            'queryParams' => $this->getQueryParams(),
            'response' => $this->getResponse(),
            'responseCode' => $this->getResponseCode(),
            'timestamp' => $this->getTimestamp(),
        ];
    }
}
