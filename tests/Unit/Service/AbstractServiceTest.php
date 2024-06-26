<?php

namespace Billwerk\Sdk\Test\Unit\Service;

use Billwerk\Sdk\Service\AccountService;
use Billwerk\Sdk\Service\AgreementService;
use Billwerk\Sdk\Service\ChargeService;
use Billwerk\Sdk\Service\CustomerService;
use Billwerk\Sdk\Service\InvoiceService;
use Billwerk\Sdk\Service\PaymentMethodService;
use Billwerk\Sdk\Service\RefundService;
use Billwerk\Sdk\Service\SessionService;
use Billwerk\Sdk\Service\TransactionService;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

abstract class AbstractServiceTest extends TestCase
{
    use StubTrait;

    protected PaymentMethodService $paymentMethod;
    protected InvoiceService $invoice;
    protected ChargeService $charge;
    protected SessionService $session;
    protected CustomerService $customer;
    protected TransactionService $transaction;
    protected AccountService $account;
    protected RefundService $refund;
    protected AgreementService $agreement;

    protected function setUp(): void
    {
        parent::setUp();
        $this->responseMock       = $this->createMock(ResponseInterface::class);
        $this->streamResponseMock = $this->createMock(StreamInterface::class);
        $this->streamRequestMock = $this->createMock(StreamInterface::class);
        $this->requestMock        = $this->createMock(RequestInterface::class);

        $this->paymentMethod = $this->sdkMock->paymentMethod();
        $this->account       = $this->sdkMock->account();
        $this->refund        = $this->sdkMock->refund();
        $this->invoice       = $this->sdkMock->invoice();
        $this->transaction   = $this->sdkMock->transaction();
        $this->customer      = $this->sdkMock->customer();
        $this->charge        = $this->sdkMock->charge();
        $this->session        = $this->sdkMock->session();
        $this->agreement        = $this->sdkMock->agreement();
    }

    /**
     * @throws Exception
     */
    protected function setMockJsonModel(string $className, bool $allFields = false, bool $arrayModels = false)
    {
        $json = $this::getStubJsonModelWithRequiredFields($className);
        if ($allFields) {
            $json = $this::getStubJsonModelWithAllFields($className);
        }
        if ($arrayModels) {
            $json = [$json, $json];
        }

        $this->requestMock
            ->method('withHeader')
            ->willReturn($this->requestMock);

        $this->requestMock
            ->method('withBody')
            ->willReturn($this->requestMock);

        $this->requestFactoryMock
            ->method('createRequest')
            ->willReturn($this->requestMock);

        $this->streamResponseMock
            ->method('getContents')
            ->willReturn(json_encode($json));

        $this->responseMock
            ->method('getBody')
            ->willReturn($this->streamResponseMock);

        $this->responseMock
            ->method('getStatusCode')
            ->willReturn(200);

        $this->clientMock
            ->method('sendRequest')
            ->willReturn($this->responseMock);
    }
}
