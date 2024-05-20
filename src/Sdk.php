<?php

namespace Billwerk\Sdk;

use Billwerk\Sdk\Service\AccountService;
use Billwerk\Sdk\Service\InvoiceService;
use Billwerk\Sdk\Service\PaymentMethodService;
use Billwerk\Sdk\Service\RefundService;
use Billwerk\Sdk\Service\TransactionService;

final class Sdk
{
    private BillwerkClientFactory $clientFactory;
    private string $apiKey;

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
        $request = $this->getRequestWithApiUrl();

        return new AccountService($request);
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
}
