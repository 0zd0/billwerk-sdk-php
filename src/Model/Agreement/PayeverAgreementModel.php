<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Model\AbstractModel;

class PayeverAgreementModel extends AbstractModel
{
    /**
     * @var string $currency
     */
    protected string $currency;

    /**
     * @var bool|null $test
     */
    protected ?bool $test = null;

    /**
     * Payever client id
     *
     * @var string|null $clientId
     */
    protected ?string $clientId = null;

    /**
     * Payever client secret
     *
     * @var string|null $clientSecret
     */
    protected ?string $clientSecret = null;

    /**
     * @return bool|null
     */
    public function getTest(): ?bool
    {
        return $this->test;
    }

    /**
     * @return string|null
     */
    public function getClientSecret(): ?string
    {
        return $this->clientSecret;
    }

    /**
     * @return string|null
     */
    public function getClientId(): ?string
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
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
     * @param string|null $clientSecret
     *
     * @return self
     */
    public function setClientSecret(?string $clientSecret): self
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * @param string|null $clientId
     *
     * @return self
     */
    public function setClientId(?string $clientId): self
    {
        $this->clientId = $clientId;

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
     * @param array $response
     *
     * @return self
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        $model->setCurrency($response['currency']);

        if (isset($response['test'])) {
            $model->setTest($response['test']);
        }

        if (isset($response['client_id'])) {
            $model->setClientId($response['client_id']);
        }

        if (isset($response['client_secret'])) {
            $model->setClientSecret($response['client_secret']);
        }

        return $model;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_filter([
            'currency' => $this->getCurrency(),
            'test' => $this->getTest(),
            'client_id' => $this->getClientId(),
            'client_secret' => $this->getClientSecret(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
