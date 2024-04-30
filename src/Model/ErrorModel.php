<?php

namespace Billwerk\Sdk\Model;

use Billwerk\Sdk\Enum\TransactionErrorEnum;

class ErrorModel extends AbstractModel
{
    protected int     $code;
    protected string  $error;
    protected ?string $message          = null;
    protected string  $path;
    protected string  $timestamp;
    protected int     $httpStatus;
    protected string  $httpReason;
    protected string  $requestId;
    protected ?string $transactionError = null;
    
    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }
    
    /**
     * @param int $code
     */
    public function setCode(int $code): void
    {
        $this->code = $code;
    }
    
    /**
     * @param string $error
     */
    public function setError(string $error): void
    {
        $this->error = $error;
    }
    
    /**
     * @param string $httpReason
     */
    public function setHttpReason(string $httpReason): void
    {
        $this->httpReason = $httpReason;
    }
    
    /**
     * @param int $httpStatus
     */
    public function setHttpStatus(int $httpStatus): void
    {
        $this->httpStatus = $httpStatus;
    }
    
    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }
    
    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }
    
    /**
     * @param string $requestId
     */
    public function setRequestId(string $requestId): void
    {
        $this->requestId = $requestId;
    }
    
    /**
     * @param string $timestamp
     */
    public function setTimestamp(string $timestamp): void
    {
        $this->timestamp = $timestamp;
    }
    
    /**
     * @param string|null $transactionError TransactionErrorInterface
     */
    public function setTransactionError(?string $transactionError): void
    {
        $this->transactionError = $transactionError;
    }
    
    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }
    
    /**
     * @return string
     */
    public function getHttpReason(): string
    {
        return $this->httpReason;
    }
    
    /**
     * @return int
     */
    public function getHttpStatus(): int
    {
        return $this->httpStatus;
    }
    
    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    
    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }
    
    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->requestId;
    }
    
    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }
    
    /**
     * @return string|null
     */
    public function getTransactionError(): ?string
    {
        return $this->transactionError;
    }
    
    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): self
    {
        $error = new self();
        
        $error->setCode($response['code']);
        
        $error->setError($response['error']);
        
        if (isset($response['message'])) {
            $error->setMessage($response['message']);
        }
        
        $error->setPath($response['path']);
        
        $error->setTimestamp($response['timestamp']);
        
        $error->setHttpStatus($response['http_status']);
        
        $error->setHttpReason($response['http_reason']);
        
        $error->setRequestId($response['request_id']);
        
        if (isset($response['transaction_error'])) {
            if (in_array($response['transaction_error'], TransactionErrorEnum::getAll(), true)) {
                $error->setTransactionError($response['transaction_error']);
            }
        }
        
        return $error;
    }
}
