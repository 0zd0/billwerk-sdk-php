<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Service\AccountService;
use Billwerk\Sdk\Service\InvoiceService;
use Billwerk\Sdk\Service\PaymentMethodService;
use Billwerk\Sdk\Service\RefundService;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

abstract class AbstractServiceTest extends TestCase
{
    use StubTrait;

    protected PaymentMethodService $paymentMethod;
    protected InvoiceService $invoice;
    protected AccountService $account;
    protected RefundService $refund;

    protected function setUp(): void
    {
        parent::setUp();
        $this->responseMock  = $this->createMock(ResponseInterface::class);
        $this->streamMock    = $this->createMock(StreamInterface::class);
        $this->paymentMethod = $this->sdkMock->paymentMethod();
        $this->account       = $this->sdkMock->account();
        $this->refund        = $this->sdkMock->refund();
        $this->invoice       = $this->sdkMock->invoice();
    }

    /**
     * @throws Exception
     */
    protected function setMockJsonModel(string $className, bool $allFields = false)
    {
        $json = $this::getStubJsonModelWithRequiredFields($className);
        if ($allFields) {
            $json = $this::getStubJsonModelWithAllFields($className);
        }

        $this->streamMock
            ->method('getContents')
            ->willReturn(json_encode($json));

        $this->responseMock
            ->method('getBody')
            ->willReturn($this->streamMock);

        $this->responseMock
            ->method('getStatusCode')
            ->willReturn(200);

        $this->clientMock
            ->method('sendRequest')
            ->willReturn($this->responseMock);
    }
}
