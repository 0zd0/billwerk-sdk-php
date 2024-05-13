<?php

namespace Billwerk\Sdk\Model;

use Billwerk\Sdk\Enum\TransactionErrorEnum;

/**
 * Error Billwerk
 *
 * @see https://optimize-docs.billwerk.com/reference/getpaymentmethodv2
 *
 * @package Billwerk\Sdk\Model
 */
class ErrorModel extends AbstractModel
{
    /**
     * Reepay API error codes
     *
     * @var int $code
     */
    protected int $code;

    /**
     * Short error message
     *
     * @var string $error
     */
    protected string $error;

    /**
     * Optional clarifying error message
     *
     * @var string|null $message
     */
    protected ?string $message = null;

    /**
     * The path generating the error response
     *
     * @var string $path
     */
    protected string $path;

    /**
     * Timestamp for the error response in ISO-8601 extended offset date-time format
     *
     * @var string $timestamp
     */
    protected string $timestamp;

    /**
     * HTTP status code of the error
     *
     * @var int $httpStatus
     */
    protected int $httpStatus;

    /**
     * HTTP reason of the error
     *
     * @var string $httpReason
     */
    protected string $httpReason;

    /**
     * Request-Id for the failed request
     *
     * @var string $requestId
     */
    protected string $requestId;

    /**
     * Optional transaction error in the case the request involved a transaction processing. See transaction errors
     *
     * @var string|null $transactionError
     */
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
     *
     * @return ErrorModel
     */
    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @param string $error
     *
     * @return ErrorModel
     */
    public function setError(string $error): self
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @param string $httpReason
     *
     * @return ErrorModel
     */
    public function setHttpReason(string $httpReason): self
    {
        $this->httpReason = $httpReason;

        return $this;
    }

    /**
     * @param int $httpStatus
     *
     * @return ErrorModel
     */
    public function setHttpStatus(int $httpStatus): self
    {
        $this->httpStatus = $httpStatus;

        return $this;
    }

    /**
     * @param string|null $message
     *
     * @return ErrorModel
     */
    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param string $path
     *
     * @return ErrorModel
     */
    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @param string $requestId
     *
     * @return ErrorModel
     */
    public function setRequestId(string $requestId): self
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * @param string $timestamp
     *
     * @return ErrorModel
     */
    public function setTimestamp(string $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @param string|null $transactionError TransactionErrorInterface
     */
    public function setTransactionError(?string $transactionError): self
    {
        $this->transactionError = $transactionError;

        return $this;
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
        $model = new self();

        $model->setCode($response['code']);

        $model->setError($response['error']);

        if (isset($response['message'])) {
            $model->setMessage($response['message']);
        }

        $model->setPath($response['path']);

        $model->setTimestamp($response['timestamp']);

        $model->setHttpStatus($response['http_status']);

        $model->setHttpReason($response['http_reason']);

        $model->setRequestId($response['request_id']);

        if (isset($response['transaction_error'])) {
            if (in_array($response['transaction_error'], TransactionErrorEnum::getAll(), true)) {
                $model->setTransactionError($response['transaction_error']);
            }
        }

        return $model;
    }
}
