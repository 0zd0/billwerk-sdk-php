<?php

namespace Billwerk\Sdk\Test;

use Billwerk\Sdk\BillwerkClientFactory;
use Billwerk\Sdk\Logger\SdkLoggerInterface;
use Billwerk\Sdk\Sdk;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Yosymfony\Toml\Toml;

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

    protected BillwerkClientFactory $clientFactory;

    /**
     * @var SdkLoggerInterface|MockObject
     */
    protected SdkLoggerInterface $loggerMock;

    protected Sdk $sdkMock;
    protected Sdk $sdk;

    /**
     * Config from config.dev.toml
     *
     * @var array $devConfig
     */
    protected array $devConfig;

    protected function setUpConfig()
    {
        $this->devConfig = Toml::ParseFile('config.dev.toml');
        $this->apiKey = $this->devConfig['api']['key'];

        $this->clientMock         = $this->createMock(ClientInterface::class);
        $this->requestFactoryMock = $this->createMock(RequestFactoryInterface::class);
        $this->streamFactoryMock  = $this->createMock(StreamFactoryInterface::class);
        $this->streamFactoryMock  = $this->createMock(StreamFactoryInterface::class);
        $this->loggerMock  = $this->createMock(SdkLoggerInterface::class);

        $this->clientFactoryMock = new BillwerkClientFactory(
            $this->clientMock,
            $this->requestFactoryMock,
            $this->streamFactoryMock
        );

        $this->sdkMock = new Sdk(
            $this->clientFactoryMock,
            $this->apiKey
        );

        $this->clientFactory = new BillwerkClientFactory(
            new Client(),
            new HttpFactory(),
            new HttpFactory(),
        );

        $this->sdk = new Sdk(
            $this->clientFactory,
            $this->apiKey
        );
    }
}
