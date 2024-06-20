<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Model\AbstractModel;

class ResursAgreementModel extends AbstractModel
{
    /**
     * Resurs Bank username
     *
     * @var string $username
     */
    protected string $username;

    /**
     * Resurs Bank password
     *
     * @var string $password
     */
    protected string $password;
    protected string $currency;
    protected ?bool $test = null;

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
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
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
            ->setCurrency($response['currency']);

        if (isset($response['test'])) {
            $model->setTest($response['test']);
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
            'currency' => $this->getCurrency(),
            'test' => $this->getTest(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
