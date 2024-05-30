<?php

namespace Billwerk\Sdk;

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

    public function __construct(BillwerkClientFactory $clientFactory, string $apiKey)
    {
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

    public function getRequestWithApiUrl(): BillwerkRequest
    {
        return new BillwerkRequest(
            $this->getApiKey(),
            $this->getClientFactory()->getClient(),
            $this->getClientFactory()->getRequestFactory(),
            $this->getClientFactory()->getStreamFactory(),
        );
    }

    public function getRequestWithCheckoutUrl(): BillwerkRequest
    {
        return new BillwerkRequest(
            $this->getApiKey(),
            $this->getClientFactory()->getClient(),
            $this->getClientFactory()->getRequestFactory(),
            $this->getClientFactory()->getStreamFactory(),
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
        if ($this->accountService === null) {
            $request = $this->getRequestWithApiUrl();
            $this->accountService = new AccountService($request);
        }

        return $this->accountService;
    }

    public function refund(): RefundService
    {
        $request = $this->getRequestWithApiUrl();

        return new RefundService($request);
    }

    public function invoice(): InvoiceService
    {
        $request = $this->getRequestWithApiUrl();

        return new InvoiceService($request);
    }

    public function transaction(): TransactionService
    {
        $request = $this->getRequestWithApiUrl();

        return new TransactionService($request);
    }

    public function customer(): CustomerService
    {
        $request = $this->getRequestWithApiUrl();

        return new CustomerService($request);
    }

    public function charge(): ChargeService
    {
        $request = $this->getRequestWithApiUrl();

        return new ChargeService($request);
    }

    public function session(): SessionService
    {
        $request = $this->getRequestWithCheckoutUrl();

        return new SessionService($request);
    }
}
