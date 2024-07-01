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
     * Currency to use for the agreement
     *
     * @see VippsRecurringAgreementCurrencyEnum
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Merchant cancel url
     *
     * @return string|null
     */
    public function getMerchantCancelUrl(): ?string
    {
        return $this->merchantCancelUrl;
    }

    /**
     * Charge Type to be used on MIT charges
     *
     * @see VippsRecurringAgreementChargeTypeEnum
     * @return string|null
     */
    public function getChargeType(): ?string
    {
        return $this->chargeType;
    }

    /**
     * Merchant serial number
     *
     * @return string|null
     */
    public function getMerchantSerialNumber(): ?string
    {
        return $this->merchantSerialNumber;
    }

    /**
     * Currency to use for the agreement
     *
     * @see VippsRecurringAgreementCurrencyEnum
     *
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
     * Merchant cancel url
     *
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
     * Merchant serial number
     *
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
     * Charge Type to be used on MIT charges
     *
     * @see VippsRecurringAgreementChargeTypeEnum
     *
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
