<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Service\PaymentMethodService;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

abstract class AbstractServiceTest extends TestCase
{
    use StubTrait;
    
    protected PaymentMethodService $paymentMethod;
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->paymentMethod = $this->sdkMock->paymentMethod();
        $this->responseMock  = $this->createMock(ResponseInterface::class);
        $this->streamMock    = $this->createMock(StreamInterface::class);
    }
}
