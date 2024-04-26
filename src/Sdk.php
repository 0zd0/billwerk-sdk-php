<?php

namespace Billwerk\Sdk;

use Billwerk\Sdk\Service\PaymentMethod;

class Sdk {
	private ClientFactory $clientFactory;
	private string        $apiKey;
	
	public function __construct( ClientFactory $clientFactory, string $apiKey ) {
		$this->clientFactory = $clientFactory;
		$this->apiKey        = $apiKey;
	}
	
	/**
	 * @return string
	 */
	public function getApiKey(): string {
		return $this->apiKey;
	}
	
	/**
	 * @return ClientFactory
	 */
	public function getClientFactory(): ClientFactory {
		return $this->clientFactory;
	}
	
	public function paymentMethod(): PaymentMethod {
		$request = new BillwerkRequest( $this->getApiKey(), $this->getClientFactory()->getClient(), $this->getClientFactory()->getRequestFactory() );
		
		return new PaymentMethod( $request );
	}
}
