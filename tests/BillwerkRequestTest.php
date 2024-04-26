<?php

namespace Billwerk\Sdk\Test;

use Billwerk\Sdk\BillwerkRequest;
use Billwerk\Sdk\Exception\BillwerkClientException;
use Billwerk\Sdk\Exception\BillwerkNetworkException;
use Billwerk\Sdk\Exception\BillwerkRequestException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class BillwerkRequestTest extends TestCase {
	const STUB_ROUTE = '/v1/sss';
	protected BillwerkRequest $requesterMock;
	
	protected function setUp(): void {
		parent::setUp();
		
		$this->requesterMock = new BillwerkRequest( $this->apiKey, $this->clientMock, $this->requestFactoryMock );
		$this->requestMock   = $this->createMock( RequestInterface::class );
		$this->responseMock  = $this->createMock( ResponseInterface::class );
	}
	
	public function testGet() {
		$this->clientMock
			->method( 'sendRequest' )
			->willReturn( $this->responseMock );
		
		$response = $this->requesterMock->get(
			self::STUB_ROUTE,
		);
		
		$this::assertSame( $this->responseMock, $response );
	}
	
	public function testGetConnectionExceptions() {
		$errorMessage = 'Connection error';
		$this->clientMock
			->method( 'sendRequest' )
			->willThrowException( new ConnectException( $errorMessage, $this->requestMock ) );
		
		$this->expectException( BillwerkNetworkException::class );
		$this->expectExceptionMessage( $errorMessage );
		
		$this->requesterMock->get(
			self::STUB_ROUTE,
		);
	}
	
	public function testGetRequestExceptions() {
		$errorMessage = 'Request error';
		$this->clientMock
			->method( 'sendRequest' )
			->willThrowException( new RequestException( $errorMessage, $this->requestMock ) );
		
		$this->expectException( BillwerkRequestException::class );
		$this->expectExceptionMessage( $errorMessage );
		
		$this->requesterMock->get(
			self::STUB_ROUTE,
		);
	}
	
	public function testGetClientExceptions() {
		$errorMessage = 'Client error';
		$this->clientMock
			->method( 'sendRequest' )
			->willThrowException( new TransferException( $errorMessage ) );
		
		$this->expectException( BillwerkClientException::class );
		$this->expectExceptionMessage( $errorMessage );
		
		$this->requesterMock->get(
			self::STUB_ROUTE,
		);
	}
}
