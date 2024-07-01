<?php

namespace Billwerk\Sdk\Model\Checkout\Session;

use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasRequestApiInterface;

class OrderLineModel extends AbstractModel implements HasRequestApiInterface
{
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
     * @var float|null $vat
     */
    protected ?float $vat = null;

    /**
     * Order line quantity
     *
     * @var int|null $quantity
     */
    protected ?int $quantity = null;

    /**
     * Whether the per quantity amount is including VAT. Defaults to true
     *
     * @var bool|null $amountInclVat
     */
    protected ?bool $amountInclVat = null;

    /**
     * Optional tax policy handle for this order line. Account default vat is used if none given
     *
     * @var string|null $taxPolicy
     */
    protected ?string $taxPolicy = null;

    /**
     * Order line vat percent
     *
     * @return float|null
     */
    public function getVat(): ?float
    {
        return $this->vat;
    }

    /**
     * Order line total amount including vat
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Whether the per quantity amount is including VAT. Defaults to true
     *
     * @return bool|null
     */
    public function getAmountInclVat(): ?bool
    {
        return $this->amountInclVat;
    }

    /**
     * Order line quantity
     *
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * Order line text
     *
     * @return string
     */
    public function getOrdertext(): string
    {
        return $this->ordertext;
    }

    /**
     * Optional tax policy handle for this order line. Account default vat is used if none given
     *
     * @return string|null
     */
    public function getTaxPolicy(): ?string
    {
        return $this->taxPolicy;
    }

    /**
     * Order line vat percent
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
     * Order line total amount including vat
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
     * Whether the per quantity amount is including VAT. Defaults to true
     *
     * @param bool|null $amountInclVat
     *
     * @return self
     */
    public function setAmountInclVat(?bool $amountInclVat): self
    {
        $this->amountInclVat = $amountInclVat;

        return $this;
    }

    /**
     * Order line quantity
     *
     * @param int|null $quantity
     *
     * @return self
     */
    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Order line text
     *
     * @param string $ordertext
     *
     * @return self
     */
    public function setOrdertext(string $ordertext): self
    {
        $this->ordertext = $ordertext;

        return $this;
    }

    /**
     * Optional tax policy handle for this order line. Account default vat is used if none given
     *
     * @param string|null $taxPolicy
     *
     * @return self
     */
    public function setTaxPolicy(?string $taxPolicy): self
    {
        $this->taxPolicy = $taxPolicy;

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

        $model->setOrdertext($response['ordertext'])
              ->setAmount($response['amount']);

        if (isset($response['vat'])) {
            $model->setVat($response['vat']);
        }

        if (isset($response['quantity'])) {
            $model->setQuantity($response['quantity']);
        }

        if (isset($response['amount_incl_vat'])) {
            $model->setAmountInclVat($response['amount_incl_vat']);
        }

        if (isset($response['tax_policy'])) {
            $model->setTaxPolicy($response['tax_policy']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'ordertext' => $this->getOrdertext(),
            'amount' => $this->getAmount(),
            'vat' => $this->getVat(),
            'quantity' => $this->getQuantity(),
            'amount_incl_vat' => $this->getAmountInclVat(),
            'tax_policy' => $this->getTaxPolicy(),
        ], function ($value) {
            return $value !== null;
        });
    }

    public function toApi(): array
    {
        return $this->toArray();
    }
}
