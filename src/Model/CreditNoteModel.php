<?php

namespace Billwerk\Sdk\Model;

use DateTime;
use Exception;

class CreditNoteModel extends AbstractModel
{
    /**
     * Credit note id
     *
     * @var string $id
     */
    protected string $id;

    /**
     * Invoice credited by this note
     *
     * @var string $invoice
     */
    protected string $invoice;

    /**
     * Refund transaction id if credit note has an associated refund
     *
     * @var string|null $transaction
     */
    protected ?string $transaction = null;

    /**
     * Credit reference if the credit note relates to a subscription credit
     *
     * @var string|null $credit
     */
    protected ?string $credit = null;

    /**
     * Credit note amount
     *
     * @var int $amount
     */
    protected int $amount;

    /**
     * Creation date for note, in ISO-8601 extended offset date-time format
     *
     * @var DateTime $created
     */
    protected DateTime $created;

    /**
     * Credit note currency in ISO 4217 three letter alpha code
     *
     * @var string $currency
     */
    protected string $currency;

    /**
     * Customer handle
     *
     * @var string $customer
     */
    protected string $customer;

    /**
     * Subscription handle, will be null for a one-time customer invoice
     *
     * @var string|null $subscription
     */
    protected ?string $subscription = null;

    /**
     * Credit note vat amount calculated as rounded summed fractional vats for each credit note lines
     *
     * @var int $amountVat
     */
    protected int $amountVat;

    /**
     * Credit note total amount excluding VAT calculated as summed amounts excl. vats for each credit note lines
     *
     * @var int|null $amountExVat
     */
    protected ?int $amountExVat = null;

    /**
     * Credit note lines
     *
     * @var CreditNoteLineModel[] $creditNoteLines
     */
    protected array $creditNoteLines;

    /**
     * Credit note accounting number
     *
     * @var string|null $accountingNumber
     */
    protected ?string $accountingNumber = null;

    /**
     * Customer debtor id
     *
     * @var int|null $debtorId
     */
    protected ?int $debtorId = null;

    /**
     * Url to credit note pdf
     *
     * @var string|null $downloadUrl
     */
    protected ?string $downloadUrl = null;

    /**
     * When the credit note was created. A credit note is created when a non-charging
     * invoice is cancelled or refunded. Timestamp in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $accountingCreatedDate
     */
    protected ?DateTime $accountingCreatedDate = null;

    /**
     * Credit note id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Creation date for note, in ISO-8601 extended offset date-time format
     *
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * Customer handle
     *
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * Invoice credited by this note
     *
     * @return string
     */
    public function getInvoice(): string
    {
        return $this->invoice;
    }

    /**
     * Credit note amount
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Subscription handle, will be null for a one-time customer invoice
     *
     * @return string|null
     */
    public function getSubscription(): ?string
    {
        return $this->subscription;
    }

    /**
     * Url to credit note pdf
     *
     * @return string|null
     */
    public function getDownloadUrl(): ?string
    {
        return $this->downloadUrl;
    }

    /**
     * Customer debtor id
     *
     * @return int|null
     */
    public function getDebtorId(): ?int
    {
        return $this->debtorId;
    }

    /**
     * Credit note accounting number
     *
     * @return string|null
     */
    public function getAccountingNumber(): ?string
    {
        return $this->accountingNumber;
    }

    /**
     * When the credit note was created. A credit note is created when a non-charging
     *  invoice is cancelled or refunded. Timestamp in ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getAccountingCreatedDate(): ?DateTime
    {
        return $this->accountingCreatedDate;
    }

    /**
     * Credit note total amount excluding VAT calculated as summed amounts excl. vats for each credit note lines
     *
     * @return int|null
     */
    public function getAmountExVat(): ?int
    {
        return $this->amountExVat;
    }

    /**
     * Credit note vat amount calculated as rounded summed fractional vats for each credit note lines
     *
     * @return int
     */
    public function getAmountVat(): int
    {
        return $this->amountVat;
    }

    /**
     * Credit reference if the credit note relates to a subscription credit
     *
     * @return string|null
     */
    public function getCredit(): ?string
    {
        return $this->credit;
    }

    /**
     * Credit note lines
     *
     * @return array
     */
    public function getCreditNoteLines(): array
    {
        return $this->creditNoteLines;
    }

    /**
     * Refund transaction id if credit note has an associated refund
     *
     * @return string|null
     */
    public function getTransaction(): ?string
    {
        return $this->transaction;
    }

    /**
     * Credit note currency in ISO 4217 three letter alpha code
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Credit note id
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Credit note currency in ISO 4217 three letter alpha code
     *
     * @param string $currency
     *
     * @return self
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Creation date for note, in ISO-8601 extended offset date-time format
     *
     * @param DateTime $created
     *
     * @return self
     */
    public function setCreated(DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Customer handle
     *
     * @param string $customer
     *
     * @return self
     */
    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Invoice credited by this note
     *
     * @param string $invoice
     *
     * @return self
     */
    public function setInvoice(string $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Credit note amount
     *
     * @param int $amount
     *
     * @return self
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Subscription handle, will be null for a one-time customer invoice
     *
     * @param string|null $subscription
     *
     * @return self
     */
    public function setSubscription(?string $subscription): self
    {
        $this->subscription = $subscription;

        return $this;
    }

    /**
     * Url to credit note pdf
     *
     * @param string|null $downloadUrl
     *
     * @return self
     */
    public function setDownloadUrl(?string $downloadUrl): self
    {
        $this->downloadUrl = $downloadUrl;

        return $this;
    }

    /**
     * Customer debtor id
     *
     * @param int|null $debtorId
     *
     * @return self
     */
    public function setDebtorId(?int $debtorId): self
    {
        $this->debtorId = $debtorId;

        return $this;
    }

    /**
     * Credit note accounting number
     *
     * @param string|null $accountingNumber
     *
     * @return self
     */
    public function setAccountingNumber(?string $accountingNumber): self
    {
        $this->accountingNumber = $accountingNumber;

        return $this;
    }

    /**
     * When the credit note was created. A credit note is created when a non-charging
     *  invoice is cancelled or refunded. Timestamp in ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $accountingCreatedDate
     *
     * @return self
     */
    public function setAccountingCreatedDate(?DateTime $accountingCreatedDate): self
    {
        $this->accountingCreatedDate = $accountingCreatedDate;

        return $this;
    }

    /**
     * Credit note total amount excluding VAT calculated as summed amounts excl. vats for each credit note lines
     *
     * @param int|null $amountExVat
     *
     * @return self
     */
    public function setAmountExVat(?int $amountExVat): self
    {
        $this->amountExVat = $amountExVat;

        return $this;
    }

    /**
     * Credit note vat amount calculated as rounded summed fractional vats for each credit note lines
     *
     * @param int $amountVat
     *
     * @return self
     */
    public function setAmountVat(int $amountVat): self
    {
        $this->amountVat = $amountVat;

        return $this;
    }

    /**
     * Credit reference if the credit note relates to a subscription credit
     *
     * @param string|null $credit
     *
     * @return self
     */
    public function setCredit(?string $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Credit note lines
     *
     * @param array $creditNoteLines
     *
     * @return self
     */
    public function setCreditNoteLines(array $creditNoteLines): self
    {
        $this->creditNoteLines = $creditNoteLines;

        return $this;
    }

    /**
     * Refund transaction id if credit note has an associated refund
     *
     * @param string|null $transaction
     *
     * @return self
     */
    public function setTransaction(?string $transaction): self
    {
        $this->transaction = $transaction;

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
              ->setInvoice($response['invoice']);

        if (isset($response['transaction'])) {
            $model->setTransaction($response['transaction']);
        }

        if (isset($response['credit'])) {
            $model->setCredit($response['credit']);
        }

        $model->setAmount($response['amount']);
        $model->setCreated(new DateTime($response['created']));
        $model->setCurrency($response['currency']);
        $model->setCustomer($response['customer']);

        if (isset($response['subscription'])) {
            $model->setSubscription($response['subscription']);
        }

        $model->setAmountVat($response['amount_vat']);

        if (isset($response['amount_ex_vat'])) {
            $model->setAmountExVat($response['amount_ex_vat']);
        }

        $creditNoteLines = [];
        foreach ($response['credit_note_lines'] as $creditNoteLine) {
            $creditNoteLines[] = CreditNoteLineModel::fromArray($creditNoteLine);
        }
        $model->setCreditNoteLines($creditNoteLines);

        if (isset($response['accounting_number'])) {
            $model->setAccountingNumber($response['accounting_number']);
        }

        if (isset($response['debtor_id'])) {
            $model->setDebtorId($response['debtor_id']);
        }

        if (isset($response['download_url'])) {
            $model->setDownloadUrl($response['download_url']);
        }

        if (isset($response['accounting_created_date'])) {
            $model->setAccountingCreatedDate(new DateTime($response['accounting_created_date']));
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->getId(),
            'invoice' => $this->getInvoice(),
            'transaction' => $this->getTransaction(),
            'credit' => $this->getCredit(),
            'amount' => $this->getAmount(),
            'created' => $this->getCreated() ? $this->getCreated()->format('Y-m-d\TH:i:s.v') : null,
            'currency' => $this->getCurrency(),
            'customer' => $this->getCustomer(),
            'subscription' => $this->getSubscription(),
            'amount_vat' => $this->getAmountVat(),
            'amount_ex_vat' => $this->getAmountExVat(),
            'credit_note_lines' => array_map(function ($creditNoteLine) {
                return $creditNoteLine->toArray();
            }, $this->getCreditNoteLines()),
            'accounting_number' => $this->getAccountingNumber(),
            'debtor_id' => $this->getDebtorId(),
            'download_url' => $this->getDownloadUrl(),
            'accounting_created_date' =>
                $this->getAccountingCreatedDate() ? $this->getAccountingCreatedDate()->format('Y-m-d\TH:i:s.v') : null,
        ], function ($value) {
            return $value !== null;
        });
    }
}
