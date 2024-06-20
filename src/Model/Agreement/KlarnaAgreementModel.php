<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Enum\KlarnaAgreementPaymentTypeEnum;
use Billwerk\Sdk\Model\AbstractModel;

class KlarnaAgreementModel extends AbstractModel
{
    /**
     * Klarna username
     *
     * @var string $username
     */
    protected string $username;

    /**
     * Klarna password
     *
     * @var string $password
     */
    protected string $password;

    /**
     * @var bool|null $test
     */
    protected ?bool $test = null;

    /**
     * Set of currencies supported by agreement. Each currency in ISO 4217 three letter alpha code
     *
     * @var array $currencies
     */
    protected array $currencies;

    /**
     * Payment gateway payment type
     *
     * @see KlarnaAgreementPaymentTypeEnum
     * @var string $paymentType
     */
    protected string $paymentType;

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

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
     * @return array
     */
    public function getCurrencies(): array
    {
        return $this->currencies;
    }

    /**
     * @param string $password
     *
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param string $username
     *
     * @return self
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
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
     * @param array $currencies
     *
     * @return self
     */
    public function setCurrencies(array $currencies): self
    {
        $this->currencies = $currencies;

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
            ->setUsername($response['username'])
            ->setPassword($response['password'])
            ->setCurrencies($response['currencies']);

        if (isset($response['test'])) {
            $model->setTest($response['test']);
        }

        if (isset($response['payment_type'])
            && in_array($response['payment_type'], KlarnaAgreementPaymentTypeEnum::getAll(), true)) {
            $model->setPaymentType($response['payment_type']);
        }

        return $model;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_filter([
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'test' => $this->getTest(),
            'currencies' => $this->getCurrencies(),
            'payment_type' => $this->getPaymentType(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
