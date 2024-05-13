<?php

namespace Billwerk\Sdk\Test;

use Billwerk\Sdk\BillwerkClientFactory;
use Billwerk\Sdk\Sdk;
use GuzzleHttp\Client;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

trait HelperTrait
{
    /**
     * @var ClientInterface|MockObject
     */
    protected $clientMock;

    /**
     * @var RequestFactoryInterface|MockObject
     */
    protected RequestFactoryInterface $requestFactoryMock;

    /**
     * @var StreamFactoryInterface|MockObject
     */
    protected StreamFactoryInterface $streamFactoryMock;

    protected string $apiKey;

    protected BillwerkClientFactory $clientFactoryMock;

    protected Sdk $sdkMock;

    protected function setUpConfig()
    {
        $this->apiKey = getenv('API_KEY');

        $this->clientMock         = $this->createMock(ClientInterface::class);
        $this->requestFactoryMock = $this->createMock(RequestFactoryInterface::class);
        $this->streamFactoryMock  = $this->createMock(StreamFactoryInterface::class);

        $this->clientFactoryMock = new BillwerkClientFactory(
            $this->clientMock,
            $this->requestFactoryMock,
            $this->streamFactoryMock
        );

        $this->sdkMock = new Sdk(
            $this->clientFactoryMock,
            $this->apiKey
        );
    }
}
