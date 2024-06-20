<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Model\AbstractModel;

class AnydayAgreementModel extends AbstractModel
{
    /**
     * @var bool|null $test
     */
    protected ?bool $test = null;

    /**
     * Anyday API key
     *
     * @var string|null $apiKey
     */
    protected ?string $apiKey = null;

    /**
     * Anyday private key for callback verification
     *
     * @var string|null $privateKey
     */
    protected ?string $privateKey = null;

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
    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }

    /**
     * @return string|null
     */
    public function getPrivateKey(): ?string
    {
        return $this->privateKey;
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
     * @param string|null $apiKey
     *
     * @return self
     */
    public function setApiKey(?string $apiKey): self
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * @param string|null $privateKey
     *
     * @return self
     */
    public function setPrivateKey(?string $privateKey): self
    {
        $this->privateKey = $privateKey;

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

        if (isset($response['test'])) {
            $model->setTest($response['test']);
        }

        if (isset($response['api_key'])) {
            $model->setApiKey($response['api_key']);
        }

        if (isset($response['private_key'])) {
            $model->setPrivateKey($response['private_key']);
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
            'api_key' => $this->getApiKey(),
            'private_key' => $this->getPrivateKey(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
