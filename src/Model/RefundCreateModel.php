<?php

namespace Billwerk\Sdk\Model;

class RefundCreateModel extends AbstractModel implements HasRequestApiInterface
{
    /**
     * Handle or id for invoice/charge to refund
     *
     * @var string $invoice
     */
    protected string $invoice;
    /**
     * Optional idempotency key. Only one refund can be performed for the same key. An idempotency key
     * identifies uniquely the request and multiple requests with the same key and invoice will yield
     * the same result. In case of networking errors the same request with same key can safely be retried
     *
     * @var string|null $key
     */
    protected ?string $key = null;
    /**
     * Optional amount in the smallest unit for the account currency. Either amount or note_lines can
     * be provided, if neither is provided the full refundable amount is refunded
     *
     * @var int|null $amount
     */
    protected ?int $amount = null;
    /**
     * Optional vat for this refund
     *
     * @var float|null $vat
     */
    protected ?float $vat = null;
    /**
     * Optional refund text to use on credit note. Used in conjunction with amount. Ignored
     * if note_lines is provided
     *
     * @var string|null $text
     */
    protected ?string $text = null;
    /**
     * Whether the amount is including VAT. Default true
     *
     * @var bool|null $amountInclVat
     */
    protected ?bool $amountInclVat = null;

    /**
     * Refund credit note lines to give detailed information for credit note. Alternative to amount
     *
     * @var NoteLineModel[] $note_lines
     */
    protected ?array $note_lines = null;
    /**
     * Optional manual transfer. If given no refund will be performed on potential online settled
     * transaction like card transaction
     *
     * @var ManualTransferModel|null $manualTransfer
     */
    protected ?ManualTransferModel $manualTransfer = null;
    /**
     * Optional reference for the transaction at the acquirer. Notice the following about this argument:
     *
     * 1. It only works for some acquirers.
     *
     * 2. Acquirers may have rigid rules on the content of the acquirer reference.
     * Not complying to these rules can result in declined payments.
     *
     * 3. It is already possible to define custom acquirer reference using templating in the Reepay Administration.
     * Contact support for help. We highly recommend to only supply this argument if absolutely necessary,
     * and the templated default acquirer reference is not sufficient. Maximum length is 128,
     * but most acquirers require a maximum length of 22 characters.
     * Truncating will be applied if too long for specific acquirer.
     * Characters must match regex [\x20-\x7F]
     *
     * @var string|null $acquirerReference
     */
    protected ?string $acquirerReference = null;

    /**
     * @return float|null
     */
    public function getVat(): ?float
    {
        return $this->vat;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @return bool|null
     */
    public function getAmountInclVat(): ?bool
    {
        return $this->amountInclVat;
    }

    /**
     * @return int|null
     */
    public function getAmount(): ?int
    {
        return $this->amount;
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
    public function getAcquirerReference(): ?string
    {
        return $this->acquirerReference;
    }

    /**
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @return ManualTransferModel|null
     */
    public function getManuaTransfer(): ?ManualTransferModel
    {
        return $this->manualTransfer;
    }

    /**
     * @return array|null
     */
    public function getNoteLines(): ?array
    {
        return $this->note_lines;
    }

    /**
     * @param float|null $vat
     *
     * @return RefundCreateModel
     */
    public function setVat(?float $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * @param string|null $text
     *
     * @return RefundCreateModel
     */
    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param bool|null $amountInclVat
     *
     * @return RefundCreateModel
     */
    public function setAmountInclVat(?bool $amountInclVat): self
    {
        $this->amountInclVat = $amountInclVat;

        return $this;
    }

    /**
     * @param int|null $amount
     *
     * @return RefundCreateModel
     */
    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $invoice
     *
     * @return RefundCreateModel
     */
    public function setInvoice(string $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @param string|null $acquirerReference
     *
     * @return RefundCreateModel
     */
    public function setAcquirerReference(?string $acquirerReference): self
    {
        $this->acquirerReference = $acquirerReference;

        return $this;
    }

    /**
     * @param string|null $key
     *
     * @return RefundCreateModel
     */
    public function setKey(?string $key): self
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @param ManualTransferModel|null $manualTransfer
     *
     * @return RefundCreateModel
     */
    public function setManualTransfer(?ManualTransferModel $manualTransfer): self
    {
        $this->manualTransfer = $manualTransfer;

        return $this;
    }

    /**
     * @param NoteLineModel[]|null $note_lines
     *
     * @return RefundCreateModel
     */
    public function setNoteLines(?array $note_lines): self
    {
        $this->note_lines = $note_lines;

        return $this;
    }

    public function toApi(): array
    {
        $result = [
            'invoice' => $this->getInvoice(),
        ];

        if (! is_null($this->getKey())) {
            $result['key'] = $this->getKey();
        }

        if (! is_null($this->getAmount())) {
            $result['amount'] = $this->getAmount();
        }

        if (! is_null($this->getVat())) {
            $result['vat'] = $this->getVat();
        }

        if (! is_null($this->getText())) {
            $result['text'] = $this->getText();
        }

        if (! is_null($this->getAmountInclVat())) {
            $result['amount_incl_vat'] = $this->getAmountInclVat();
        }

        if (! is_null($this->getNoteLines())) {
            $result['note_lines'] = [];
            foreach ($this->getNoteLines() as $noteLine) {
                $result['note_lines'][] = $noteLine->toArray();
            }
        }

        if (! is_null($this->getManuaTransfer())) {
            $result['manual_transfer'] = $this->getManuaTransfer()->toArray();
        }

        if (! is_null($this->getAcquirerReference())) {
            $result['acquirer_reference'] = $this->getAcquirerReference();
        }

        return $result;
    }

    public static function fromArray(array $response): self
    {
        $model = new self();

        $model->setInvoice($response['invoice']);

        if (isset($response['key'])) {
            $model->setKey($response['key']);
        }

        if (isset($response['amount'])) {
            $model->setAmount($response['amount']);
        }

        if (isset($response['vat'])) {
            $model->setVat($response['vat']);
        }

        if (isset($response['text'])) {
            $model->setText($response['text']);
        }

        if (isset($response['amount_incl_vat'])) {
            $model->setAmountInclVat($response['amount_incl_vat']);
        }

        if (isset($response['note_lines']) && is_array($response['note_lines'])) {
            $noteLines = [];
            foreach ($response['note_lines'] as $noteLine) {
                $noteLines[] = NoteLineModel::fromArray($noteLine);
            }
            if (count($noteLines) > 0) {
                $model->setNoteLines($noteLines);
            }
        }

        if (isset($response['manual_transfer'])) {
            $model->setManualTransfer(ManualTransferModel::fromArray($response['manual_transfer']));
        }

        if (isset($response['acquirer_reference'])) {
            $model->setAcquirerReference($response['acquirer_reference']);
        }

        return $model;
    }
}
