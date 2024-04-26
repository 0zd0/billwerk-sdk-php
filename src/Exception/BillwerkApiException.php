<?php

namespace Billwerk\Sdk\Exception;

use Billwerk\Sdk\Util\LastRequestInfo;
use Exception;
use Throwable;

class BillwerkApiException extends Exception {
	protected int             $errorCode;
	protected string          $title       = "";
	protected string          $description = "";
	protected ?LastRequestInfo $lastRequestInfo = null;
	
	
	public function __construct(
		$message = "",
		$code = 0,
		LastRequestInfo $lastRequestInfo = null,
		string $description = "",
		Throwable $previous = null
	) {
		parent::__construct( $message, $code, $previous );
		
		$this
			->setTitle( $message )
			->setErrorCode( $code )
			->setLastRequestInfo( $lastRequestInfo )
			->setDescription( $description );
	}
	
	/**
	 * @return int
	 */
	public function getErrorCode(): int {
		return $this->errorCode;
	}
	
	/**
	 * @param int $errorCode
	 *
	 * @return BillwerkApiException
	 */
	public function setErrorCode( int $errorCode ): self {
		$this->errorCode = $errorCode;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getTitle(): string {
		return $this->title;
	}
	
	/**
	 * @param string $title
	 *
	 * @return BillwerkApiException
	 */
	public function setTitle( string $title ): self {
		$this->title = $title;
		
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getDescription(): string {
		return $this->description;
	}
	
	/**
	 * @param string $description
	 *
	 * @return BillwerkApiException
	 */
	public function setDescription( string $description ): self {
		$this->description = $description;
		
		return $this;
	}
	
	/**
	 * @param LastRequestInfo|null $lastRequestInfo
	 *
	 * @return BillwerkApiException
	 */
	public function setLastRequestInfo( ?LastRequestInfo $lastRequestInfo ): self {
		$this->lastRequestInfo = $lastRequestInfo;
		
		return $this;
	}
	
	/**
	 * @return LastRequestInfo|null
	 */
	public function getLastRequestInfo(): ?LastRequestInfo {
		return $this->lastRequestInfo;
	}
}
