<?php

namespace Billwerk\Sdk\Service;

use Billwerk\Sdk\Billwerk;
use Billwerk\Sdk\Helper\UrlPathInterface;
use Psr\Http\Message\ResponseInterface;

class PaymentMethod extends AbstractService {
	protected string $method = '/v' . Billwerk::API_VERSION . '/' . UrlPathInterface::PAYMENT_METHOD;
	
	public function get(
		string $id
	): ResponseInterface {
		$queryParams = [];
		$response = $this->request->get($this->method . "/$id", $queryParams);
		
		return $response;
	}
}
