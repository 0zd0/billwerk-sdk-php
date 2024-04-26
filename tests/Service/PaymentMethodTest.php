<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Service\PaymentMethod;
use Billwerk\Sdk\Test\TestCase;

final class PaymentMethodTest extends TestCase {
	
	protected PaymentMethod $paymentMethod;
	
	protected function setUp(): void {
		parent::setUp();
		$this->paymentMethod = $this->sdkMock->paymentMethod();
	}
	
	public function testPaymentMethodGet() {
		$this->paymentMethod->get('1');
	}
}
