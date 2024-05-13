<?php

namespace Billwerk\Sdk\Model;

use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\RefundStateEnum;
use Billwerk\Sdk\Enum\RefundTypeEnum;
use DateTime;
use Exception;

/**
 * Refund
 *
 * @see https://optimize-docs.billwerk.com/reference/createrefund
 *
 * @package Billwerk\Sdk\Model
 */
class RefundModel extends AbstractModel implements HasIdInterface
{
    /**
     * Refund id assigned by Reepay
     *
     * @var string $id
     */
    protected string $id;
    /**
     * @see RefundStateEnum
     *
     * The refund state either refunded, failed or processing. The processing state can only be returned
     * for asynchronous payment method (not card)
     *
     * @var string $state
     */
    protected string $state;
    /**
     * Invoice/charge handle
     *
     * @var string $invoice
     */
    protected string $invoice;
    /**
     * Refunded amount
     *
     * @var int $amount
     */
    protected int $amount;
    /**
     * Currency for the account in ISO 4217 three letter alpha code
     *
     * @var string $currency
     */
    protected string $currency;
    /**
     * Transaction id assigned by Reepay
     *
     * @var string $transaction
     */
    protected string $transaction;
    /**
     * Reepay error code if failed
     *
     * @var string|null $error
     */
    protected ?string $error = null;
    /**
     * @see RefundTypeEnum
     *
     * Type of refund, either card, mpo, mobilepay, vipps, vipps_recurring, swish, viabill, anyday, manual,
     * applepay, googlepay, paypal, klarna_pay_now, klarna_pay_later, klarna_slice_it, klarna_direct_bank_transfer,
     * klarna_direct_debit, resurs, mobilepay_subscriptions, emv_token, bancomatpay, bcmc, blik, pp_blik_oc, giropay,
     * ideal, p24, sepa, trustly, eps, estonia_banks, latvia_banks, lithuania_banks, mb_way, multibanco, mybank,
     * payconiq, paysafecard, paysera, postfinance, satispay, twint, wechatpay, santander, or verkkopankki,
     * offline_cash, offline_bank_transfer, offline_other
     *
     * @var string $type
     */
    protected string $type;
    /**
     * When the refund was created, in ISO-8601 extended offset date-time format
     *
     * @var DateTime $created
     */
    protected DateTime $created;
    /**
     * Credit note id for successful refund
     *
     * @var string|null $creditNoteId
     */
    protected ?string $creditNoteId = null;
    /**
     * Id of a possible settled transaction that has been refunded
     *
     * @var string|null $refTransaction
     */
    protected ?string $refTransaction = null;
    /**
     * @see ErrorStateEnum
     *
     * Reepay error state if failed: hard_declined or processing_error. A hard decline indicates a refund decline
     * by acquirer. A processing error indicates an error processing the refund either at Reepay, the acquirer,
     * or between Reepay and the acquirer
     *
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
     * Invoice accounting number
     *
     * @var string|null $accountingNumber
     */
    protected ?string $accountingNumber = null;

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
    public function getAccountingNumber(): ?string
    {
        return $this->accountingNumber;
    }

    /**
     * @return string|null
     */
    public function getAcquirerMessage(): ?string
    {
        return $this->acquirerMessage;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @return string|null
     */
    public function getCreditNoteId(): ?string
    {
        return $this->creditNoteId;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return string|null
     */
    public function getErrorSate(): ?string
    {
        return $this->errorState;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getInvoice(): string
    {
        return $this->invoice;
    }

    /**
     * @return string|null
     */
    public function getRefTransaction(): ?string
    {
        return $this->refTransaction;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getTransaction(): string
    {
        return $this->transaction;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string|null $accountingNumber
     *
     * @return RefundModel
     */
    public function setAccountingNumber(?string $accountingNumber): self
    {
        $this->accountingNumber = $accountingNumber;

        return $this;
    }

    /**
     * @param string|null $acquirerMessage
     *
     * @return RefundModel
     */
    public function setAcquirerMessage(?string $acquirerMessage): self
    {
        $this->acquirerMessage = $acquirerMessage;

        return $this;
    }

    /**
     * @param int $amount
     *
     * @return RefundModel
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param DateTime $created
     *
     * @return RefundModel
     */
    public function setCreated(DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @param string|null $creditNoteId
     *
     * @return RefundModel
     */
    public function setCreditNoteId(?string $creditNoteId): self
    {
        $this->creditNoteId = $creditNoteId;

        return $this;
    }

    /**
     * @param string $currency
     *
     * @return RefundModel
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param string|null $error
     *
     * @return RefundModel
     */
    public function setError(?string $error): self
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @param string|null $errorState
     *
     * @return RefundModel
     */
    public function setErrorState(?string $errorState): self
    {
        $this->errorState = $errorState;

        return $this;
    }

    /**
     * @param string $id
     *
     * @return RefundModel
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $invoice
     *
     * @return RefundModel
     */
    public function setInvoice(string $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @param string|null $refTransaction
     *
     * @return RefundModel
     */
    public function setRefTransaction(?string $refTransaction): self
    {
        $this->refTransaction = $refTransaction;

        return $this;
    }

    /**
     * @param string $state
     *
     * @return RefundModel
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @param string $transaction
     *
     * @return RefundModel
     */
    public function setTransaction(string $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return RefundModel
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param array $response
     *
     * @return self
     * @throws Exception
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        $model->setId($response['id'])
              ->setInvoice($response['invoice'])
              ->setAmount($response['amount'])
              ->setCurrency($response['currency'])
              ->setTransaction($response['transaction'])
              ->setCreated(new DateTime($response['created']));

        if (in_array($response['type'], RefundTypeEnum::getAll())) {
            $model->setType($response['type']);
        }

        if (in_array($response['state'], RefundStateEnum::getAll())) {
            $model->setState($response['state']);
        }

        if (isset($response['error'])) {
            $model->setError($response['error']);
        }

        if (isset($response['credit_note_id'])) {
            $model->setCreditNoteId($response['credit_note_id']);
        }

        if (isset($response['ref_transaction'])) {
            $model->setRefTransaction($response['ref_transaction']);
        }

        if (isset($response['error_state']) && in_array($response['error_state'], ErrorStateEnum::getAll())) {
            $model->setErrorState($response['error_state']);
        }

        if (isset($response['acquirer_message'])) {
            $model->setAcquirerMessage($response['acquirer_message']);
        }

        if (isset($response['accounting_number'])) {
            $model->setAccountingNumber($response['accounting_number']);
        }

        return $model;
    }
}
