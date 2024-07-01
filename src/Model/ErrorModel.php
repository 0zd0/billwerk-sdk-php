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
     * @var null|int $code
     */
    protected ?int $code = null;

    /**
     * Short error message
     *
     * @var null|string $error
     */
    protected ?string $error = null;

    /**
     * Optional clarifying error message
     *
     * @var string|null $message
     */
    protected ?string $message = null;

    /**
     * The path generating the error response
     *
     * @var null|string $path
     */
    protected ?string $path = null;

    /**
     * Timestamp for the error response in ISO-8601 extended offset date-time format
     *
     * @var null|string $timestamp
     */
    protected ?string $timestamp = null;

    /**
     * HTTP status code of the error
     *
     * @var null|int $httpStatus
     */
    protected ?int $httpStatus = null;

    /**
     * HTTP reason of the error
     *
     * @var null|string $httpReason
     */
    protected ?string $httpReason = null;

    /**
     * Request-Id for the failed request
     *
     * @var null|string $requestId
     */
    protected ?string $requestId = null;

    /**
     * Optional transaction error in the case the request involved a transaction processing. See transaction errors
     *
     * @var string|null $transactionError
     */
    protected ?string $transactionError = null;

    /**
     * Reepay API error codes
     *
     * @return int|null
     */
    public function getCode(): ?int
    {
        return $this->code;
    }

    /**
     * Reepay API error codes
     *
     * @param int|null $code
     *
     * @return ErrorModel
     */
    public function setCode(?int $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Short error message
     *
     * @param string|null $error
     *
     * @return ErrorModel
     */
    public function setError(?string $error): self
    {
        $this->error = $error;

        return $this;
    }

    /**
     * HTTP reason of the error
     *
     * @param string|null $httpReason
     *
     * @return ErrorModel
     */
    public function setHttpReason(?string $httpReason): self
    {
        $this->httpReason = $httpReason;

        return $this;
    }

    /**
     * HTTP status code of the error
     *
     * @param int|null $httpStatus
     *
     * @return ErrorModel
     */
    public function setHttpStatus(?int $httpStatus): self
    {
        $this->httpStatus = $httpStatus;

        return $this;
    }

    /**
     * Optional clarifying error message
     *
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
     * The path generating the error response
     *
     * @param string|null $path
     *
     * @return ErrorModel
     */
    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Request-Id for the failed request
     *
     * @param string|null $requestId
     *
     * @return ErrorModel
     */
    public function setRequestId(?string $requestId): self
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * Timestamp for the error response in ISO-8601 extended offset date-time format
     *
     * @param string|null $timestamp
     *
     * @return ErrorModel
     */
    public function setTimestamp(?string $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Optional transaction error in the case the request involved a transaction processing. See transaction errors
     *
     * @param string|null $transactionError TransactionErrorInterface
     */
    public function setTransactionError(?string $transactionError): self
    {
        $this->transactionError = $transactionError;

        return $this;
    }

    /**
     * Short error message
     *
     * @return string|null
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * HTTP reason of the error
     *
     * @return string|null
     */
    public function getHttpReason(): ?string
    {
        return $this->httpReason;
    }

    /**
     * HTTP status code of the error
     *
     * @return int|null
     */
    public function getHttpStatus(): ?int
    {
        return $this->httpStatus;
    }

    /**
     * Optional clarifying error message
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * The path generating the error response
     *
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * Request-Id for the failed request
     *
     * @return string|null
     */
    public function getRequestId(): ?string
    {
        return $this->requestId;
    }

    /**
     * Timestamp for the error response in ISO-8601 extended offset date-time format
     *
     * @return string|null
     */
    public function getTimestamp(): ?string
    {
        return $this->timestamp;
    }

    /**
     * Optional transaction error in the case the request involved a transaction processing. See transaction errors
     *
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

        if (isset($response['code'])) {
            $model->setCode($response['code']);
        }

        if (isset($response['error'])) {
            $model->setError($response['error']);
        }

        if (isset($response['message'])) {
            $model->setMessage($response['message']);
        }

        if (isset($response['path'])) {
            $model->setPath($response['path']);
        }

        if (isset($response['timestamp'])) {
            $model->setTimestamp($response['timestamp']);
        }

        if (isset($response['http_status'])) {
            $model->setHttpStatus($response['http_status']);
        }

        if (isset($response['http_reason'])) {
            $model->setHttpReason($response['http_reason']);
        }

        if (isset($response['request_id'])) {
            $model->setRequestId($response['request_id']);
        }

        if (isset($response['transaction_error'])) {
            if (in_array($response['transaction_error'], TransactionErrorEnum::getAll(), true)) {
                $model->setTransactionError($response['transaction_error']);
            }
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'code' => $this->getCode(),
            'error' => $this->getError(),
            'message' => $this->getMessage(),
            'path' => $this->getPath(),
            'timestamp' => $this->getTimestamp(),
            'http_status' => $this->getHttpStatus(),
            'http_reason' => $this->getHttpReason(),
            'request_id' => $this->getRequestId(),
            'transaction_error' => $this->getTransactionError(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
