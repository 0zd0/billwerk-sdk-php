<?php

namespace Billwerk\Sdk\Model;

use DateTime;
use Exception;

class CreditNoteLineModel extends AbstractModel
{
    /**
     * Credit note line total amount
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
     * Credit note line quantity
     *
     * @var int $quantity
     */
    protected int $quantity;

    /**
     * Vat for this credit note line
     *
     * @var float|null $vat
     */
    protected ?float $vat = null;

    /**
     * Creation date for this credit note line, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $created
     */
    protected ?DateTime $created = null;

    /**
     * Reference to invoice orderline this credit note line relates to
     *
     * @var string|null $orderLineId
     */
    protected ?string $orderLineId = null;

    /**
     * Credit note line total amount including VAT
     *
     * @var int|null $amountInclVat
     */
    protected ?int $amountInclVat = null;

    /**
     * Credit note line total amount excluding VAT
     *
     * @var int|null $amountExVat
     */
    protected ?int $amountExVat = null;

    /**
     * Credit note line unit amount
     *
     * @var int|null $unitAmount
     */
    protected ?int $unitAmount = null;

    /**
     * Credit note line vat amount
     *
     * @var int|null $unitAmountVat
     */
    protected ?int $unitAmountVat = null;

    /**
     * Credit note line unit amount excluding VAT
     *
     * @var int|null $unitAmountExVat
     */
    protected ?int $unitAmountExVat = null;

    /**
     * Whether the total and units are including VAT
     *
     * @var bool|null $amountInclVatDefined
     */
    protected ?bool $amountInclVatDefined = null;

    /**
     * The start of billing period in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $periodFrom
     */
    protected ?DateTime $periodFrom = null;

    /**
     * The end of billing period in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $periodTo
     */
    protected ?DateTime $periodTo = null;

    /**
     * Credit note line total amount excluding VAT
     *
     * @return int|null
     */
    public function getAmountExVat(): ?int
    {
        return $this->amountExVat;
    }

    /**
     * Credit note line total amount
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Creation date for this credit note line, in ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getCreated(): ?DateTime
    {
        return $this->created;
    }

    /**
     * Vat for this credit note line
     *
     * @return float|null
     */
    public function getVat(): ?float
    {
        return $this->vat;
    }

    /**
     * The start of billing period in ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getPeriodFrom(): ?DateTime
    {
        return $this->periodFrom;
    }

    /**
     * The end of billing period in ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getPeriodTo(): ?DateTime
    {
        return $this->periodTo;
    }

    /**
     * Credit note line vat amount
     *
     * @return int|null
     */
    public function getUnitAmountVat(): ?int
    {
        return $this->unitAmountVat;
    }

    /**
     * Credit note line unit amount excluding VAT
     *
     * @return int|null
     */
    public function getUnitAmountExVat(): ?int
    {
        return $this->unitAmountExVat;
    }

    /**
     * Credit note line unit amount
     *
     * @return int|null
     */
    public function getUnitAmount(): ?int
    {
        return $this->unitAmount;
    }

    /**
     * Credit note line quantity
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
     * Credit note line total amount including VAT
     *
     * @return int|null
     */
    public function getAmountInclVat(): ?int
    {
        return $this->amountInclVat;
    }

    /**
     * Whether the total and units are including VAT
     *
     * @return bool|null
     */
    public function getAmountInclVatDefined(): ?bool
    {
        return $this->amountInclVatDefined;
    }

    /**
     * Reference to invoice orderline this credit note line relates to
     *
     * @return string|null
     */
    public function getOrderLineId(): ?string
    {
        return $this->orderLineId;
    }

    /**
     * Credit note line total amount excluding VAT
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
     * Credit note line total amount
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
     * Creation date for this credit note line, in ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $created
     *
     * @return self
     */
    public function setCreated(?DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Vat for this credit note line
     *
     * @param float|null $vat
     *
     * @return self
     */
    public function setVat(?float $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * The start of billing period in ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $periodFrom
     *
     * @return self
     */
    public function setPeriodFrom(?DateTime $periodFrom): self
    {
        $this->periodFrom = $periodFrom;

        return $this;
    }

    /**
     * The end of billing period in ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $periodTo
     *
     * @return self
     */
    public function setPeriodTo(?DateTime $periodTo): self
    {
        $this->periodTo = $periodTo;

        return $this;
    }

    /**
     * Credit note line vat amount
     *
     * @param int|null $unitAmountVat
     *
     * @return self
     */
    public function setUnitAmountVat(?int $unitAmountVat): self
    {
        $this->unitAmountVat = $unitAmountVat;

        return $this;
    }

    /**
     * Credit note line unit amount excluding VAT
     *
     * @param int|null $unitAmountExVat
     *
     * @return self
     */
    public function setUnitAmountExVat(?int $unitAmountExVat): self
    {
        $this->unitAmountExVat = $unitAmountExVat;

        return $this;
    }

    /**
     * Credit note line unit amount
     *
     * @param int|null $unitAmount
     *
     * @return self
     */
    public function setUnitAmount(?int $unitAmount): self
    {
        $this->unitAmount = $unitAmount;

        return $this;
    }

    /**
     * Credit note line quantity
     *
     * @param int $quantity
     *
     * @return self
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Credit note line total amount including VAT
     *
     * @param int|null $amountInclVat
     *
     * @return self
     */
    public function setAmountInclVat(?int $amountInclVat): self
    {
        $this->amountInclVat = $amountInclVat;

        return $this;
    }

    /**
     * Whether the total and units are including VAT
     *
     * @param bool|null $amountInclVatDefined
     *
     * @return self
     */
    public function setAmountInclVatDefined(?bool $amountInclVatDefined): self
    {
        $this->amountInclVatDefined = $amountInclVatDefined;

        return $this;
    }

    /**
     * Reference to invoice orderline this credit note line relates to
     *
     * @param string|null $orderLineId
     *
     * @return self
     */
    public function setOrderLineId(?string $orderLineId): self
    {
        $this->orderLineId = $orderLineId;

        return $this;
    }

    /**
     * Credit note line text
     *
     * @param string $text
     *
     * @return self
     */
    public function setText(string $text): self
    {
        $this->text = $text;

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

        $model->setAmount($response['amount']);
        $model->setText($response['text']);
        $model->setQuantity($response['quantity']);

        if (isset($response['vat'])) {
            $model->setVat($response['vat']);
        }

        if (isset($response['created'])) {
            $model->setCreated(new DateTime($response['created']));
        }

        if (isset($response['order_line_id'])) {
            $model->setOrderLineId($response['order_line_id']);
        }

        if (isset($response['amount_incl_vat'])) {
            $model->setAmountInclVat($response['amount_incl_vat']);
        }

        if (isset($response['amount_ex_vat'])) {
            $model->setAmountExVat($response['amount_ex_vat']);
        }

        if (isset($response['unit_amount'])) {
            $model->setUnitAmount($response['unit_amount']);
        }

        if (isset($response['unit_amount_vat'])) {
            $model->setUnitAmountVat($response['unit_amount_vat']);
        }

        if (isset($response['unit_amount_ex_vat'])) {
            $model->setUnitAmountExVat($response['unit_amount_ex_vat']);
        }

        if (isset($response['amount_incl_vat_defined'])) {
            $model->setAmountInclVatDefined($response['amount_incl_vat_defined']);
        }

        if (isset($response['period_from'])) {
            $model->setPeriodFrom(new DateTime($response['period_from']));
        }

        if (isset($response['period_to'])) {
            $model->setPeriodTo(new DateTime($response['period_to']));
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
            'created' => $this->getCreated() ? $this->getCreated()->format('Y-m-d\TH:i:s.v') : null,
            'order_line_id' => $this->getOrderLineId(),
            'amount_incl_vat' => $this->getAmountInclVat(),
            'amount_ex_vat' => $this->getAmountExVat(),
            'unit_amount' => $this->getUnitAmount(),
            'unit_amount_vat' => $this->getUnitAmountVat(),
            'unit_amount_ex_vat' => $this->getUnitAmountExVat(),
            'amount_incl_vat_defined' => $this->getAmountInclVatDefined(),
            'period_from' => $this->getPeriodFrom() ? $this->getPeriodFrom()->format('Y-m-d\TH:i:s.v') : null,
            'period_to' => $this->getPeriodTo() ? $this->getPeriodTo()->format('Y-m-d\TH:i:s.v') : null,
        ], function ($value) {
            return $value !== null;
        });
    }
}
