<?php

namespace Billwerk\Sdk\Model\Invoice;

use Billwerk\Sdk\Enum\OrderLineOriginEnum;
use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasIdInterface;
use DateTime;
use Exception;

/**
 * Order lines for invoice
 *
 * @see https://optimize-docs.billwerk.com/reference/getinvoice
 *
 * @package Billwerk\Sdk\Model\Invoice
 */
class OrderLineModel extends AbstractModel implements HasIdInterface
{
    /**
     * Per account unique order line id
     *
     * @var string $id
     */
    protected string $id;

    /**
     * Order line text
     *
     * @var string $ordertext
     */
    protected string $ordertext;

    /**
     * Order line total amount including vat
     *
     * @var int $amount
     */
    protected int $amount;

    /**
     * Order line vat percent
     *
     * @var float $vat
     */
    protected float $vat;

    /**
     * Order line quantity
     *
     * @var int $quantity
     */
    protected int $quantity;

    /**
     * Order line origin, one of the following: plan, add_on, ondemand, additional_cost,
     * credit, discount, setup_fee, surcharge_fee
     *
     * @see OrderLineOriginEnum
     * @var string $origin
     */
    protected string $origin;

    /**
     * Timestamp from order line origin, in ISO-8601 extended offset date-time format
     *
     * @var DateTime $timestamp
     */
    protected DateTime $timestamp;

    /**
     * Order line amount after potential discount has been deducted
     *
     * @var int|null $discountedAmount
     */
    protected ?int $discountedAmount = null;

    /**
     * Order line total vat amount
     *
     * @var int $amountVat
     */
    protected int $amountVat;

    /**
     * Order line total amount without vat
     *
     * @var int $amountExVat
     */
    protected int $amountExVat;

    /**
     * Order line unit amount including vat
     *
     * @var int $unitAmount
     */
    protected int $unitAmount;

    /**
     * Order line unit vat amount
     *
     * @var int $unitAmountVat
     */
    protected int $unitAmountVat;

    /**
     * Order line unit amount without vat
     *
     * @var int $unitAmountExVat
     */
    protected int $unitAmountExVat;

    /**
     * Whether the amount was defined including VAT. E.g. plan amount defined including VAT
     *
     * @var bool $amountDefinedInclVat
     */
    protected bool $amountDefinedInclVat;

    /**
     * Handle for additional cost, credit, plan or subscription discount in the case one of those are the origin
     *
     * @var string|null $originHandle
     */
    protected ?string $originHandle = null;

    /**
     * The start of billing period if the order line is a plan order line for a specific billing period,
     * in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $periodFrom
     */
    protected ?DateTime $periodFrom = null;

    /**
     * The end of billing period if the order line is a plan order line for a specific billing period,
     * in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $periodTo
     */
    protected ?DateTime $periodTo = null;

    /**
     * The discount percentage for discount order lines that has a percentage discount
     *
     * @var int|null $discountPercentage
     */
    protected ?int $discountPercentage = null;

    /**
     * For discount order lines a reference to the order line for which the order line is a discount
     *
     * @var string|null $discountedOrderLine
     */
    protected ?string $discountedOrderLine = null;

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return float
     */
    public function getVat(): float
    {
        return $this->vat;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getTimestamp(): DateTime
    {
        return $this->timestamp;
    }

    /**
     * @return int
     */
    public function getAmountExVat(): int
    {
        return $this->amountExVat;
    }

    /**
     * @return string|null
     */
    public function getDiscountedOrderLine(): ?string
    {
        return $this->discountedOrderLine;
    }

    /**
     * @return bool
     */
    public function getAmountDefinedInclVat(): bool
    {
        return $this->amountDefinedInclVat;
    }

    /**
     * @return int
     */
    public function getAmountVat(): int
    {
        return $this->amountVat;
    }

    /**
     * @return int|null
     */
    public function getDiscountedAmount(): ?int
    {
        return $this->discountedAmount;
    }

    /**
     * @return int|null
     */
    public function getDiscountPercentage(): ?int
    {
        return $this->discountPercentage;
    }

    /**
     * @return string
     */
    public function getOrdertext(): string
    {
        return $this->ordertext;
    }

    /**
     * @return string
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * @return string|null
     */
    public function getOriginHandle(): ?string
    {
        return $this->originHandle;
    }

    /**
     * @return DateTime|null
     */
    public function getPeriodFrom(): ?DateTime
    {
        return $this->periodFrom;
    }

    /**
     * @return DateTime|null
     */
    public function getPeriodTo(): ?DateTime
    {
        return $this->periodTo;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getUnitAmount(): int
    {
        return $this->unitAmount;
    }

    /**
     * @return int
     */
    public function getUnitAmountExVat(): int
    {
        return $this->unitAmountExVat;
    }

    /**
     * @return int
     */
    public function getUnitAmountVat(): int
    {
        return $this->unitAmountVat;
    }

    /**
     * @param int $amount
     *
     * @return OrderLineModel
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param float $vat
     *
     * @return OrderLineModel
     */
    public function setVat(float $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * @param string $id
     *
     * @return OrderLineModel
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param DateTime $timestamp
     *
     * @return OrderLineModel
     */
    public function setTimestamp(DateTime $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @param bool $amountDefinedInclVat
     *
     * @return OrderLineModel
     */
    public function setAmountDefinedInclVat(bool $amountDefinedInclVat): self
    {
        $this->amountDefinedInclVat = $amountDefinedInclVat;

        return $this;
    }

    /**
     * @param int $amountExVat
     *
     * @return OrderLineModel
     */
    public function setAmountExVat(int $amountExVat): self
    {
        $this->amountExVat = $amountExVat;

        return $this;
    }

    /**
     * @param int $amountVat
     *
     * @return OrderLineModel
     */
    public function setAmountVat(int $amountVat): self
    {
        $this->amountVat = $amountVat;

        return $this;
    }

    /**
     * @param int|null $discountedAmount
     *
     * @return OrderLineModel
     */
    public function setDiscountedAmount(?int $discountedAmount): self
    {
        $this->discountedAmount = $discountedAmount;

        return $this;
    }

    /**
     * @param string|null $discountedOrderLine
     *
     * @return OrderLineModel
     */
    public function setDiscountedOrderLine(?string $discountedOrderLine): self
    {
        $this->discountedOrderLine = $discountedOrderLine;

        return $this;
    }

    /**
     * @param int|null $discountPercentage
     *
     * @return OrderLineModel
     */
    public function setDiscountPercentage(?int $discountPercentage): self
    {
        $this->discountPercentage = $discountPercentage;

        return $this;
    }

    /**
     * @param string $ordertext
     *
     * @return OrderLineModel
     */
    public function setOrdertext(string $ordertext): self
    {
        $this->ordertext = $ordertext;

        return $this;
    }

    /**
     * @param string $origin
     *
     * @return OrderLineModel
     */
    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * @param string|null $originHandle
     *
     * @return OrderLineModel
     */
    public function setOriginHandle(?string $originHandle): self
    {
        $this->originHandle = $originHandle;

        return $this;
    }

    /**
     * @param DateTime|null $periodFrom
     *
     * @return OrderLineModel
     */
    public function setPeriodFrom(?DateTime $periodFrom): self
    {
        $this->periodFrom = $periodFrom;

        return $this;
    }

    /**
     * @param DateTime|null $periodTo
     *
     * @return OrderLineModel
     */
    public function setPeriodTo(?DateTime $periodTo): self
    {
        $this->periodTo = $periodTo;

        return $this;
    }

    /**
     * @param int $quantity
     *
     * @return OrderLineModel
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @param int $unitAmount
     *
     * @return OrderLineModel
     */
    public function setUnitAmount(int $unitAmount): self
    {
        $this->unitAmount = $unitAmount;

        return $this;
    }

    /**
     * @param int $unitAmountExVat
     *
     * @return OrderLineModel
     */
    public function setUnitAmountExVat(int $unitAmountExVat): self
    {
        $this->unitAmountExVat = $unitAmountExVat;

        return $this;
    }

    /**
     * @param int $unitAmountVat
     *
     * @return OrderLineModel
     */
    public function setUnitAmountVat(int $unitAmountVat): self
    {
        $this->unitAmountVat = $unitAmountVat;

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
              ->setOrdertext($response['ordertext'])
              ->setAmount($response['amount'])
              ->setVat($response['vat'])
              ->setQuantity($response['quantity'])
              ->setTimestamp(new DateTime($response['timestamp']))
              ->setAmountVat($response['amount_vat'])
              ->setAmountExVat($response['amount_ex_vat'])
              ->setUnitAmount($response['unit_amount'])
              ->setUnitAmountVat($response['unit_amount_vat'])
              ->setUnitAmountExVat($response['unit_amount_ex_vat'])
              ->setAmountDefinedInclVat($response['amount_defined_incl_vat']);

        if (in_array($response['origin'], OrderLineOriginEnum::getAll())) {
            $model->setOrigin($response['origin']);
        }

        if (isset($response['discounted_amount'])) {
            $model->setDiscountedAmount($response['discounted_amount']);
        }

        if (isset($response['origin_handle'])) {
            $model->setOriginHandle($response['origin_handle']);
        }

        if (isset($response['period_from'])) {
            $model->setPeriodFrom(new DateTime($response['period_from']));
        }

        if (isset($response['period_to'])) {
            $model->setPeriodTo(new DateTime($response['period_to']));
        }

        if (isset($response['discount_percentage'])) {
            $model->setDiscountPercentage($response['discount_percentage']);
        }

        if (isset($response['discounted_order_line'])) {
            $model->setDiscountedOrderLine($response['discounted_order_line']);
        }

        return $model;
    }
}
