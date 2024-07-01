<?php

namespace Billwerk\Sdk\Model\Refund;

use Billwerk\Sdk\Model\AbstractModel;

/**
 * Refund credit note lines
 *
 * @see https://optimize-docs.billwerk.com/reference/createrefund
 *
 * @package Billwerk\Sdk\Model
 */
class NoteLineModel extends AbstractModel
{
    /**
     * Per quantity amount in the smallest unit for the account currency
     *
     * @var int $amount
     */
    protected int $amount;
    /**
     * Credit note line text
     *
     * @var string $text
     */
    protected string $text;
    /**
     * Quantity
     *
     * @var int $quantity
     */
    protected int $quantity;
    /**
     * Optional vat for this credit note line
     *
     * @var float|null $vat
     */
    protected ?float $vat = null;
    /**
     * Optional reference to invoice order line for which this refund line is related
     *
     * @var string|null $orderLineId
     */
    protected ?string $orderLineId = null;

    /**
     * Optional whether the amount is including VAT
     *
     * @var bool|null $amountInclVat
     */
    protected ?bool $amountInclVat = null;

    /**
     * Per quantity amount in the smallest unit for the account currency
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Optional whether the amount is including VAT
     *
     * @return bool|null
     */
    public function getAmountInclVat(): ?bool
    {
        return $this->amountInclVat;
    }

    /**
     * Optional reference to invoice order line for which this refund line is related
     *
     * @return string|null
     */
    public function getOrderLineId(): ?string
    {
        return $this->orderLineId;
    }

    /**
     * Quantity
     *
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Credit note line text
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Optional vat for this credit note line
     *
     * @return float|null
     */
    public function getVat(): ?float
    {
        return $this->vat;
    }

    /**
     * Per quantity amount in the smallest unit for the account currency
     *
     * @param int $amount
     *
     * @return NoteLineModel
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Optional whether the amount is including VAT
     *
     * @param bool|null $amountInclVat
     *
     * @return NoteLineModel
     */
    public function setAmountInclVat(?bool $amountInclVat): self
    {
        $this->amountInclVat = $amountInclVat;

        return $this;
    }

    /**
     * Optional reference to invoice order line for which this refund line is related
     *
     * @param string|null $orderLineId
     *
     * @return NoteLineModel
     */
    public function setOrderLineId(?string $orderLineId): self
    {
        $this->orderLineId = $orderLineId;

        return $this;
    }

    /**
     * Quantity
     *
     * @param int $quantity
     *
     * @return NoteLineModel
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Credit note line text
     *
     * @param string $text
     *
     * @return NoteLineModel
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Optional vat for this credit note line
     *
     * @param float|null $vat
     *
     * @return NoteLineModel
     */
    public function setVat(?float $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * @param array $response
     *
     * @return self
     */
    public static function fromArray(array $response): self
    {
        $model = new self();
        $model->setAmount($response['amount'])
              ->setText($response['text'])
              ->setQuantity($response['quantity']);

        if (isset($response['vat'])) {
            $model->setVat($response['vat']);
        }

        if (isset($response['amount_incl_vat'])) {
            $model->setAmountInclVat($response['amount_incl_vat']);
        }

        if (isset($response['order_line_id'])) {
            $model->setOrderLineId($response['order_line_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'amount' => $this->getAmount(),
            'text' => $this->getText(),
            'quantity' => $this->getQuantity(),
            'vat' => $this->getVat(),
            'amount_incl_vat' => $this->getAmountInclVat(),
            'order_line_id' => $this->getOrderLineId(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
