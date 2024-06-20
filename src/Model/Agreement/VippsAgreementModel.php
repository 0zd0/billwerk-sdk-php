<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Model\AbstractModel;

class VippsAgreementModel extends AbstractModel
{
    /**
     * @var string $merchantSerialNumber
     */
    protected string $merchantSerialNumber;

    /**
     * @return string
     */
    public function getMerchantSerialNumber(): string
    {
        return $this->merchantSerialNumber;
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
     * @param array $response
     *
     * @return self
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        $model->setMerchantSerialNumber($response['merchantSerialNumber']);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_filter([
            'merchantSerialNumber' => $this->getMerchantSerialNumber(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
