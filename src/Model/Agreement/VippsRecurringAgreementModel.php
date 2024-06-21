<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Enum\VippsRecurringAgreementChargeTypeEnum;
use Billwerk\Sdk\Model\AbstractModel;

class VippsRecurringAgreementModel extends AbstractModel
{
    /**
     * Merchant serial number
     *
     * @var string|null $merchantSerialNumber
     */
    protected ?string $merchantSerialNumber = null;

    /**
     * Merchant cancel url
     *
     * @var string|null $merchantCancelUrl
     */
    protected ?string $merchantCancelUrl = null;

    /**
     * Currency to use for the agreement
     *
     * @see VippsRecurringAgreementCurrencyEnum
     * @var string|null $currency
     */
    protected ?string $currency = null;

    /**
     * Charge Type to be used on MIT charges
     *
     * @see VippsRecurringAgreementChargeTypeEnum
     * @var string|null $chargeType
     */
    protected ?string $chargeType = null;

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @return string|null
     */
    public function getMerchantCancelUrl(): ?string
    {
        return $this->merchantCancelUrl;
    }

    /**
     * @return string|null
     */
    public function getChargeType(): ?string
    {
        return $this->chargeType;
    }

    /**
     * @return string|null
     */
    public function getMerchantSerialNumber(): ?string
    {
        return $this->merchantSerialNumber;
    }

    /**
     * @param string|null $currency
     *
     * @return self
     */
    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param string|null $merchantCancelUrl
     *
     * @return self
     */
    public function setMerchantCancelUrl(?string $merchantCancelUrl): self
    {
        $this->merchantCancelUrl = $merchantCancelUrl;

        return $this;
    }

    /**
     * @param string|null $merchantSerialNumber
     *
     * @return self
     */
    public function setMerchantSerialNumber(?string $merchantSerialNumber): self
    {
        $this->merchantSerialNumber = $merchantSerialNumber;

        return $this;
    }

    /**
     * @param string|null $chargeType
     *
     * @return self
     */
    public function setChargeType(?string $chargeType): self
    {
        $this->chargeType = $chargeType;

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

        if (isset($response['merchantSerialNumber'])) {
            $model->setMerchantSerialNumber($response['merchantSerialNumber']);
        }

        if (isset($response['merchantCancelUrl'])) {
            $model->setMerchantCancelUrl($response['merchantCancelUrl']);
        }

        if (isset($response['currency'])) {
            $model->setCurrency($response['currency']);
        }

        if (isset($response['charge_type'])
            && in_array($response['charge_type'], VippsRecurringAgreementChargeTypeEnum::getAll(), true)) {
            $model->setChargeType($response['charge_type']);
        }

        return $model;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_filter([
            'merchantSerialNumber' => $this->getMerchantSerialNumber(),
            'merchantCancelUrl' => $this->getMerchantCancelUrl(),
            'currency' => $this->getCurrency(),
            'charge_type' => $this->getChargeType(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
