<?php

namespace Billwerk\Sdk;

use Billwerk\Sdk\Service\AccountService;
use Billwerk\Sdk\Service\PaymentMethodService;

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
            $this->getClientFactory()->getRequestFactory()
        );
    }

    public function getRequestWithCheckoutUrl(): BillwerkRequest
    {
        return new BillwerkRequest(
            $this->getApiKey(),
            $this->getClientFactory()->getClient(),
            $this->getClientFactory()->getRequestFactory(),
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
}
