<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Model\AbstractModel;

class VippsRecurringAgreementModel extends AbstractModel
{
    /**
     * Merchant serial number
     *
     * @var string $merchantSerialNumber
     */
    protected string $merchantSerialNumber;

    /**
     * Merchant cancel url
     *
     * @var string $merchantCancelUrl
     */
    protected string $merchantCancelUrl;

    /**
     * Currency to use for the agreement
     *
     * @see VippsRecurringAgreementCurrencyEnum
     * @var string $currency
     */
    protected string $currency;

    /**
     * Charge Type to be used on MIT charges
     *
     * @see VippsRecurringAgreementChargeTypeEnum
     * @var string $chargeType
     */
    protected string $chargeType;

    /**
     * @return string
     */
    public function getMerchantSerialNumber(): string
    {
        return $this->merchantSerialNumber;
    }

    /**
     * @return string
     */
    public function getChargeType(): string
    {
        return $this->chargeType;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getMerchantCancelUrl(): string
    {
        return $this->merchantCancelUrl;
    }

    /**
     * @param string $chargeType
     *
     * @return self
     */
    public function setChargeType(string $chargeType): self
    {
        $this->chargeType = $chargeType;

        return $this;
    }

    /**
     * @param string $merchantSerialNumber
     *
     * @return self
     */
    public function setMerchantSerialNumber(string $merchantSerialNumber): self
    {
        $this->merchantSerialNumber = $merchantSerialNumber;

        return $this;
    }

    /**
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
     * @param string $merchantCancelUrl
     *
     * @return self
     */
    public function setMerchantCancelUrl(string $merchantCancelUrl): self
    {
        $this->merchantCancelUrl = $merchantCancelUrl;

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

        $model
            ->setMerchantSerialNumber($response['merchantSerialNumber'])
            ->setMerchantCancelUrl($response['merchantCancelUrl'])
            ->setCurrency($response['currency'])
            ->setChargeType($response['charge_type']);

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
