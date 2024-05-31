<?php

namespace Billwerk\Sdk;

use Billwerk\Sdk\Logger\SdkLoggerInterface;
use Billwerk\Sdk\Service\AccountService;
use Billwerk\Sdk\Service\ChargeService;
use Billwerk\Sdk\Service\CustomerService;
use Billwerk\Sdk\Service\InvoiceService;
use Billwerk\Sdk\Service\PaymentMethodService;
use Billwerk\Sdk\Service\RefundService;
use Billwerk\Sdk\Service\SessionService;
use Billwerk\Sdk\Service\TransactionService;

final class Sdk
{
    private BillwerkClientFactory $clientFactory;
    private string $apiKey;
    private ?AccountService $accountService = null;
    private ?RefundService $refundService = null;
    private ?InvoiceService $invoiceService = null;
    private ?TransactionService $transactionService = null;
    private ?CustomerService $customerService = null;
    private ?ChargeService $chargeService = null;
    private ?SessionService $sessionService = null;
    private ?SdkLoggerInterface $logger = null;

    public function __construct(
        BillwerkClientFactory $clientFactory,
        string $apiKey
    ) {
        $this->clientFactory = $clientFactory;
        $this->apiKey        = $apiKey;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return BillwerkClientFactory
     */
    public function getClientFactory(): BillwerkClientFactory
    {
        return $this->clientFactory;
    }

    /**
     * @param AccountService|null $accountService
     *
     * @return self
     */
    public function setAccountService(?AccountService $accountService): self
    {
        $this->accountService = $accountService;
        return $this;
    }

    /**
     * @param SdkLoggerInterface|null $logger
     */
    public function setLogger(?SdkLoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @param ChargeService|null $chargeService
     *
     * @return self
     */
    public function setChargeService(?ChargeService $chargeService): self
    {
        $this->chargeService = $chargeService;

        return $this;
    }

    /**
     * @param CustomerService|null $customerService
     *
     * @return self
     */
    public function setCustomerService(?CustomerService $customerService): self
    {
        $this->customerService = $customerService;

        return $this;
    }

    /**
     * @param InvoiceService|null $invoiceService
     *
     * @return self
     */
    public function setInvoiceService(?InvoiceService $invoiceService): self
    {
        $this->invoiceService = $invoiceService;

        return $this;
    }

    /**
     * @param RefundService|null $refundService
     *
     * @return self
     */
    public function setRefundService(?RefundService $refundService): self
    {
        $this->refundService = $refundService;

        return $this;
    }

    /**
     * @param SessionService|null $sessionService
     *
     * @return self
     */
    public function setSessionService(?SessionService $sessionService): self
    {
        $this->sessionService = $sessionService;

        return $this;
    }

    /**
     * @param TransactionService|null $transactionService
     *
     * @return self
     */
    public function setTransactionService(?TransactionService $transactionService): self
    {
        $this->transactionService = $transactionService;

        return $this;
    }

    public function getRequestWithApiUrl(): BillwerkRequest
    {
        return new BillwerkRequest(
            $this->getApiKey(),
            $this->getClientFactory()->getClient(),
            $this->getClientFactory()->getRequestFactory(),
            $this->getClientFactory()->getStreamFactory(),
            $this->logger,
        );
    }

    public function getRequestWithCheckoutUrl(): BillwerkRequest
    {
        return new BillwerkRequest(
            $this->getApiKey(),
            $this->getClientFactory()->getClient(),
            $this->getClientFactory()->getRequestFactory(),
            $this->getClientFactory()->getStreamFactory(),
            $this->logger,
            Billwerk::CHECKOUT_BASE
        );
    }

    public function paymentMethod(): PaymentMethodService
    {
        $request = $this->getRequestWithApiUrl();

        return new PaymentMethodService($request);
    }

    public function account(): AccountService
    {
        if (is_null($this->accountService)) {
            $request = $this->getRequestWithApiUrl();
            $this->accountService = new AccountService($request);
        }

        return $this->accountService;
    }

    public function refund(): RefundService
    {
        if (is_null($this->refundService)) {
            $request = $this->getRequestWithApiUrl();
            $this->refundService = new RefundService($request);
        }

        return $this->refundService;
    }

    public function invoice(): InvoiceService
    {
        if (is_null($this->invoiceService)) {
            $request = $this->getRequestWithApiUrl();
            $this->invoiceService = new InvoiceService($request);
        }

        return $this->invoiceService;
    }

    public function transaction(): TransactionService
    {
        if (is_null($this->transactionService)) {
            $request = $this->getRequestWithApiUrl();
            $this->transactionService = new TransactionService($request);
        }

        return $this->transactionService;
    }

    public function customer(): CustomerService
    {
        if (is_null($this->customerService)) {
            $request = $this->getRequestWithApiUrl();
            $this->customerService = new CustomerService($request);
        }

        return $this->customerService;
    }

    public function charge(): ChargeService
    {
        if (is_null($this->chargeService)) {
            $request = $this->getRequestWithApiUrl();
            $this->chargeService = new ChargeService($request);
        }

        return $this->chargeService;
    }

    public function session(): SessionService
    {
        if (is_null($this->sessionService)) {
            $request = $this->getRequestWithApiUrl();
            $this->sessionService = new SessionService($request);
        }

        return $this->sessionService;
    }
}
