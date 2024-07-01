<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Enum\CardGatewayAgreementPaymentTypeEnum;
use Billwerk\Sdk\Enum\OfflineAgreementPaymentTypeEnum;
use Billwerk\Sdk\Enum\OfflineAgreementSettleTypeEnum;
use Billwerk\Sdk\Model\AbstractModel;

class OfflineAgreementModel extends AbstractModel
{
    /**
     * Name of the payment method
     *
     * @var string $name
     */
    protected string $name;

    /**
     * Optional description of the payment method
     *
     * @var string|null $description
     */
    protected ?string $description = null;

    /**
     * Instructions for the consumer
     *
     * @var string $instructions
     */
    protected string $instructions;

    /**
     * Set of currencies supported by agreement. Each currency in ISO 4217 three letter alpha code
     *
     * @var string[]|null $currencies
     */
    protected ?array $currencies = null;

    /**
     * Unique handle of the payment method
     *
     * @var string $handle
     */
    protected string $handle;

    /**
     * Optional payment method logo url. Must be hosted on a *.reepay.com domain
     *
     * @var string|null $logo
     */
    protected ?string $logo = null;

    /**
     * Instant settle type
     *
     * @see OfflineAgreementSettleTypeEnum
     * @var string $settleType
     */
    protected string $settleType;

    /**
     * Payment gateway payment type
     *
     * @see OfflineAgreementPaymentTypeEnum
     * @var string $paymentType
     */
    protected string $paymentType;

    /**
     * Set of currencies supported by agreement. Each currency in ISO 4217 three letter alpha code
     *
     * @return array|null
     */
    public function getCurrencies(): ?array
    {
        return $this->currencies;
    }

    /**
     * Payment gateway payment type
     *
     * @see OfflineAgreementPaymentTypeEnum
     * @return string
     */
    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    /**
     * Name of the payment method
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Optional description of the payment method
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Unique handle of the payment method
     *
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * Instructions for the consumer
     *
     * @return string
     */
    public function getInstructions(): string
    {
        return $this->instructions;
    }

    /**
     * Optional payment method logo url. Must be hosted on a *.reepay.com domain
     *
     * @return string|null
     */
    public function getLogo(): ?string
    {
        return $this->logo;
    }

    /**
     * Instant settle type
     *
     * @see OfflineAgreementSettleTypeEnum
     * @return string
     */
    public function getSettleType(): string
    {
        return $this->settleType;
    }

    /**
     * Name of the payment method
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set of currencies supported by agreement. Each currency in ISO 4217 three letter alpha code
     *
     * @param array|null $currencies
     *
     * @return self
     */
    public function setCurrencies(?array $currencies): self
    {
        $this->currencies = $currencies;

        return $this;
    }

    /**
     * Payment gateway payment type
     *
     * @see OfflineAgreementPaymentTypeEnum
     *
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
     * Optional description of the payment method
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Unique handle of the payment method
     *
     * @param string $handle
     *
     * @return self
     */
    public function setHandle(string $handle): self
    {
        $this->handle = $handle;

        return $this;
    }

    /**
     * Instructions for the consumer
     *
     * @param string $instructions
     *
     * @return self
     */
    public function setInstructions(string $instructions): self
    {
        $this->instructions = $instructions;

        return $this;
    }

    /**
     * Optional payment method logo url. Must be hosted on a *.reepay.com domain
     *
     * @param string|null $logo
     *
     * @return self
     */
    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Instant settle type
     *
     * @see OfflineAgreementSettleTypeEnum
     *
     * @param string $settleType
     *
     * @return self
     */
    public function setSettleType(string $settleType): self
    {
        $this->settleType = $settleType;

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
            ->setName($response['name'])
            ->setInstructions($response['instructions'])
            ->setHandle($response['handle']);

        if (isset($response['description'])) {
            $model->setDescription($response['description']);
        }

        if (isset($response['currencies'])) {
            $model->setCurrencies($response['currencies']);
        }

        if (isset($response['logo'])) {
            $model->setLogo($response['logo']);
        }

        if (isset($response['settle_type'])
            && in_array($response['settle_type'], OfflineAgreementSettleTypeEnum::getAll(), true)) {
            $model->setSettleType($response['settle_type']);
        }

        if (isset($response['payment_type'])
            && in_array($response['payment_type'], OfflineAgreementPaymentTypeEnum::getAll(), true)) {
            $model->setPaymentType($response['payment_type']);
        }

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_filter([
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'instructions' => $this->getInstructions(),
            'currencies' => $this->getCurrencies(),
            'handle' => $this->getHandle(),
            'logo' => $this->getLogo(),
            'settle_type' => $this->getSettleType(),
            'payment_type' => $this->getPaymentType(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
