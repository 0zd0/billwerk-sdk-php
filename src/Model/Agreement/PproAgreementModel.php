<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Enum\PproAgreementPaymentTypeEnum;
use Billwerk\Sdk\Model\AbstractModel;

class PproAgreementModel extends AbstractModel
{
    protected ?bool $test = null;

    /**
     * Contract id for local payment method
     *
     * @var string|null $contractId
     */
    protected ?string $contractId = null;

    /**
     * Payment gateway payment type
     *
     * @see PproAgreementPaymentTypeEnum
     * @var string $paymentType
     */
    protected string $paymentType;

    /**
     * Optional account validation for SEPA account
     *
     * @var bool|null $secureSepa
     */
    protected ?bool $secureSepa = null;

    /**
     * Optional custom merchant id for secure SEPA
     *
     * @var string|null $tinkMerchantId
     */
    protected ?string $tinkMerchantId = null;

    /**
     * @return bool|null
     */
    public function getTest(): ?bool
    {
        return $this->test;
    }

    /**
     * @return string
     */
    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    /**
     * @return string|null
     */
    public function getContractId(): ?string
    {
        return $this->contractId;
    }

    /**
     * @return bool|null
     */
    public function getSecureSepa(): ?bool
    {
        return $this->secureSepa;
    }

    /**
     * @return string|null
     */
    public function getTinkMerchantId(): ?string
    {
        return $this->tinkMerchantId;
    }

    /**
     * @param bool|null $test
     *
     * @return self
     */
    public function setTest(?bool $test): self
    {
        $this->test = $test;

        return $this;
    }

    /**
     * @param string $paymentType
     *
     * @return self
     */
    public function setPaymentType(string $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    /**
     * @param string|null $contractId
     *
     * @return self
     */
    public function setContractId(?string $contractId): self
    {
        $this->contractId = $contractId;

        return $this;
    }

    /**
     * @param bool|null $secureSepa
     *
     * @return self
     */
    public function setSecureSepa(?bool $secureSepa): self
    {
        $this->secureSepa = $secureSepa;

        return $this;
    }

    /**
     * @param string|null $tinkMerchantId
     *
     * @return self
     */
    public function setTinkMerchantId(?string $tinkMerchantId): self
    {
        $this->tinkMerchantId = $tinkMerchantId;

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

        if (isset($response['contract_id'])) {
            $model->setContractId($response['contract_id']);
        }

        if (isset($response['payment_type'])
            && in_array($response['payment_type'], PproAgreementPaymentTypeEnum::getAll(), true)) {
            $model->setPaymentType($response['payment_type']);
        }

        if (isset($response['test'])) {
            $model->setTest($response['test']);
        }

        if (isset($response['secure_sepa'])) {
            $model->setSecureSepa($response['secure_sepa']);
        }

        if (isset($response['tink_merchant_id'])) {
            $model->setTinkMerchantId($response['tink_merchant_id']);
        }

        return $model;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_filter([
            'test' => $this->getTest(),
            'contract_id' => $this->getContractId(),
            'payment_type' => $this->getPaymentType(),
            'secure_sepa' => $this->getSecureSepa(),
            'tink_merchant_id' => $this->getTinkMerchantId(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
