<?php

namespace Billwerk\Sdk\Test;

use Billwerk\Sdk\BillwerkRequest;
use Billwerk\Sdk\Exception\BillwerkApiException;
use Billwerk\Sdk\Exception\BillwerkClientException;
use Billwerk\Sdk\Exception\BillwerkNetworkException;
use Billwerk\Sdk\Exception\BillwerkRequestException;
use Billwerk\Sdk\Helper\HttpStatusCodeInterface;
use Billwerk\Sdk\Model\ErrorModel;
use Billwerk\Sdk\Util\Sleep;
use Exception;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

final class BillwerkRequestTest extends TestCase
{
    use StubTrait;

    protected const STUB_ROUTE = '/v1/sss';

    protected BillwerkRequest $requester;

    protected function setUp(): void
    {
        parent::setUp();

        $this->requester    = new BillwerkRequest(
            $this->apiKey,
            $this->clientMock,
            $this->requestFactoryMock,
            $this->streamFactoryMock
        );
        $this->requestMock  = $this->createMock(RequestInterface::class);
        $this->responseMock = $this->createMock(ResponseInterface::class);
        $this->streamMock   = $this->createMock(StreamInterface::class);
        Sleep::set(0);
    }

    public function testParseResponseWithoutJson()
    {
        $expectedResponse = '';
        $errorMessage     = 'Response body is not json';

        $this->streamMock
            ->method('getContents')
            ->willReturn(json_encode($expectedResponse));
        $this->responseMock
            ->method('getBody')
            ->willReturn($this->streamMock);

        $this->requester->setLastHttpMethod(BillwerkRequest::GET_REQUEST);
        $this->requester->setLastUri('');

        $this->expectException(BillwerkApiException::class);
        $this->expectExceptionMessage($errorMessage);

        $this->requester->parseResponse($this->responseMock);
    }

    public function testGet()
    {
        $expectedResponse = ['1' => '2'];

        $this->streamMock
            ->method('getContents')
            ->willReturn(json_encode($expectedResponse));
        $this->responseMock
            ->method('getBody')
            ->willReturn($this->streamMock);
        $this->responseMock
            ->method('getStatusCode')
            ->willReturn(200);
        $this->clientMock
            ->method('sendRequest')
            ->willReturn($this->responseMock);

        $response = $this->requester->get(
            self::STUB_ROUTE,
        );

        $this::assertSame($expectedResponse, $response);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function testGetTooManyRequests(): array
    {
        $correctResponse      = ['1' => '2'];
        $error                = $this->getStubJsonModelWithAllFields(ErrorModel::getClassName());
        $error['code']        = 122;
        $error['error']       = 'Request rate limit exceeded';
        $error['http_status'] = HttpStatusCodeInterface::STATUS_TOO_MANY_REQUESTS;

        $this->streamMock
            ->method('getContents')
            ->willReturnOnConsecutiveCalls(
                json_encode($error),
                json_encode($error),
                json_encode($correctResponse),
            );
        $this->responseMock
            ->method('getBody')
            ->willReturn($this->streamMock);
        $this->responseMock
            ->method('getStatusCode')
            ->willReturnOnConsecutiveCalls(
                HttpStatusCodeInterface::STATUS_TOO_MANY_REQUESTS,
                HttpStatusCodeInterface::STATUS_TOO_MANY_REQUESTS,
                HttpStatusCodeInterface::STATUS_OK
            );
        $this->clientMock
            ->method('sendRequest')
            ->willReturn($this->responseMock);

        $this->requester->setSleepInstance(new Sleep());

        $response = $this->requester->get(
            self::STUB_ROUTE,
        );

        $this::assertSame(2, $this->requester->getRetryCount());
        $this::assertSame($correctResponse, $response);

        return $error;
    }

    /**
     * @depends testGetTooManyRequests
     */
    public function testGetTooManyRequestsMaxRetry(array $error): void
    {
        $this->streamMock
            ->method('getContents')
            ->willReturn(json_encode($error));
        $this->responseMock
            ->method('getBody')
            ->willReturn($this->streamMock);
        $this->responseMock
            ->method('getStatusCode')
            ->willReturn(HttpStatusCodeInterface::STATUS_TOO_MANY_REQUESTS);
        $this->clientMock
            ->method('sendRequest')
            ->willReturn($this->responseMock);

        $this->expectException(BillwerkApiException::class);
        $this->expectExceptionMessage("Request limit exceeded after 5 attempts");

        $this->requester->get(
            self::STUB_ROUTE,
        );
    }

    /**
     * @throws BillwerkApiException
     * @throws BillwerkRequestException
     * @throws BillwerkClientException
     */
    public function testGetConnectionExceptions()
    {
        $errorMessage = 'Connection error';
        $this->clientMock
            ->method('sendRequest')
            ->willThrowException(new ConnectException($errorMessage, $this->requestMock));

        $this->expectException(BillwerkNetworkException::class);
        $this->expectExceptionMessage($errorMessage);

        $this->requester->get(
            self::STUB_ROUTE,
        );
    }

    /**
     * @throws BillwerkNetworkException
     * @throws BillwerkApiException
     * @throws BillwerkClientException
     */
    public function testGetRequestExceptions()
    {
        $errorMessage = 'Request error';
        $this->clientMock
            ->method('sendRequest')
            ->willThrowException(new RequestException($errorMessage, $this->requestMock));

        $this->expectException(BillwerkRequestException::class);
        $this->expectExceptionMessage($errorMessage);

        $this->requester->get(
            self::STUB_ROUTE,
        );
    }

    /**
     * @throws BillwerkNetworkException
     * @throws BillwerkRequestException
     * @throws BillwerkApiException
     */
    public function testGetClientExceptions()
    {
        $errorMessage = 'Client error';
        $this->clientMock
            ->method('sendRequest')
            ->willThrowException(new TransferException($errorMessage));

        $this->expectException(BillwerkClientException::class);
        $this->expectExceptionMessage($errorMessage);

        $this->requester->get(
            self::STUB_ROUTE,
        );
    }
}
