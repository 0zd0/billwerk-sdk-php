<?php

namespace Billwerk\Sdk;

use Billwerk\Sdk\Service\PaymentMethodService;

final class Sdk
{
    private BillwerkClientFactory $clientFactory;
    private string                $apiKey;
    
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
    
    public function paymentMethod(): PaymentMethodService
    {
        $request = new BillwerkRequest($this->getApiKey(), $this->getClientFactory()->getClient(), $this->getClientFactory()->getRequestFactory());
        
        return new PaymentMethodService($request);
    }
}
