<?php

namespace Billwerk\Sdk;

use Billwerk\Sdk\Exception\BillwerkClientException;
use Billwerk\Sdk\Exception\BillwerkNetworkException;
use Billwerk\Sdk\Exception\BillwerkRequestException;
use Billwerk\Sdk\Util\LastRequestInfo;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Client\NetworkExceptionInterface;
use Psr\Http\Client\RequestExceptionInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;

class BillwerkRequest {
	public const POST_REQUEST   = 'POST';
	public const PUT_REQUEST    = 'PUT';
	public const GET_REQUEST    = 'GET';
	public const PATCH_REQUEST  = 'PATCH';
	public const DELETE_REQUEST = 'DELETE';
	public const APPLICATION_JSON_HEADER = 'application/json';
	
	public const CONNECT_TIMEOUT = 5;
	public const REQUEST_TIMEOUT = 20;
	
	public const SUCCESS_STATUSES = [
		200,
	];
	
	private string                  $_apiKey;
	private string                  $baseUrl;
	private ClientInterface         $client;
	private RequestFactoryInterface $requestFactory;
	
	private string $lastHttpMethod;
	private string $lastUri;
	private array $lastBody = [];
	private ?array $lastQueryParams = null;
	private ?string $lastResponse = null;
	private ?int $lastResponseCode = null;
	
	public function __construct(
		string $apiKey,
		ClientInterface $client,
		RequestFactoryInterface $requestFactory,
		?string $baseUrl = Billwerk::API_BASE
	) {
		$this->_apiKey = $apiKey;
		$this->client  = $client;
		$this->baseUrl = $baseUrl;
		$this->requestFactory = $requestFactory;
	}
	
	private static function _getDefaultHeaders(
		string $apiKey
	): array {
		return [
			'Accept'        => self::APPLICATION_JSON_HEADER,
			'Content-Type'  => self::APPLICATION_JSON_HEADER,
			'Authorization' => 'Basic ' . base64_encode( $apiKey . ':' )
		];
	}
	
	/**
	 * @param string $baseUrl
	 */
	public function setBaseUrl( string $baseUrl ): void {
		$this->baseUrl = $baseUrl;
	}
	
	/**
	 * @throws BillwerkNetworkException
	 * @throws BillwerkRequestException
	 * @throws BillwerkClientException
	 */
	public function get(
		string $route,
		array $queryParams = [],
		array $headers = []
	): ResponseInterface {
		$headers = array_merge( $headers, self::_getDefaultHeaders( $this->_apiKey ) );
		$queryString = !empty($queryParams) ? '?' . http_build_query($queryParams) : '';
		$uri = Billwerk::PROTOCOL . $this->baseUrl . $route . $queryString;
		
		$request = $this->requestFactory->createRequest( self::GET_REQUEST, $uri );
		foreach ( $headers as $header => $value ) {
			$request->withAddedHeader( $header, $value );
		}
		
		$this->lastHttpMethod = self::GET_REQUEST;
		$this->lastUri = $uri;
		$this->lastBody = [];
		$this->lastQueryParams = $queryParams;
		
		try {
			$response = $this->client->sendRequest( $request );
		}
		catch ( NetworkExceptionInterface $e ) {
			throw new BillwerkNetworkException($e->getMessage(), $e->getCode(), $this->getLastRequestInfo());
		}
		catch ( RequestExceptionInterface $e ) {
			throw new BillwerkRequestException($e->getMessage(), $e->getCode(), $this->getLastRequestInfo());
		}
		catch (ClientExceptionInterface $e) {
			throw new BillwerkClientException($e->getMessage(), $e->getCode(), $this->getLastRequestInfo());
		}
		
		return $response;
	}
	
	/**
	 * @return LastRequestInfo
	 */
	public function getLastRequestInfo(): LastRequestInfo
	{
		return new LastRequestInfo(
			$this->lastHttpMethod,
			$this->lastUri,
			$this->lastBody,
			$this->lastQueryParams,
			$this->lastResponse,
			$this->lastResponseCode
		);
	}
}
