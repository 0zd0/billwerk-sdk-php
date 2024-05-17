<?php

namespace Billwerk\Sdk\Model\Invoice;

use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\TransactionErrorEnum;
use Billwerk\Sdk\Model\AbstractModel;

abstract class AbstractTransactionModel extends AbstractModel
{
    /**
     * Error code if failed. See transaction errors
     *
     * @see TransactionErrorEnum
     * @var string|null $error
     */
    protected ?string $error = null;

    /**
     * Id of a possible referenced transaction
     *
     * @var string|null $refTransaction
     */
    protected ?string $refTransaction = null;

    /**
     * Error state if failed: pending, soft_declined, hard_declined or processing_error
     *
     * @see ErrorStateEnum
     * @var string|null $errorState
     */
    protected ?string $errorState = null;

    /**
     * Acquirer message in case of error
     *
     * @var string|null $acquirerMessage
     */
    protected ?string $acquirerMessage = null;

    /**
     * @return string|null
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * @return string|null
     */
    public function getRefTransaction(): ?string
    {
        return $this->refTransaction;
    }

    /**
     * @return string|null
     */
    public function getErrorState(): ?string
    {
        return $this->errorState;
    }

    /**
     * @return string|null
     */
    public function getAcquirerMessage(): ?string
    {
        return $this->acquirerMessage;
    }

    /**
     * @param string|null $errorState
     *
     * @return self
     */
    public function setErrorState(?string $errorState): self
    {
        $this->errorState = $errorState;

        return $this;
    }

    /**
     * @param string|null $refTransaction
     *
     * @return self
     */
    public function setRefTransaction(?string $refTransaction): self
    {
        $this->refTransaction = $refTransaction;

        return $this;
    }

    /**
     * @param string|null $acquirerMessage
     *
     * @return self
     */
    public function setAcquirerMessage(?string $acquirerMessage): self
    {
        $this->acquirerMessage = $acquirerMessage;

        return $this;
    }

    /**
     * @param string|null $error
     *
     * @return self
     */
    public function setError(?string $error): self
    {
        $this->error = $error;

        return $this;
    }

    public function fromArrayDefault(array $response)
    {
        if (isset($response['error'])) {
            $this->setError($response['error']);
        }

        if (isset($response['ref_transaction'])) {
            $this->setRefTransaction($response['ref_transaction']);
        }

        if (isset($response['error_state']) && in_array($response['error_state'], ErrorStateEnum::getAll(), true)) {
            $this->setErrorState($response['error_state']);
        }

        if (isset($response['acquirer_message'])) {
            $this->setAcquirerMessage($response['acquirer_message']);
        }
    }
}
