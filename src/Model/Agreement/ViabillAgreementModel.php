<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Model\AbstractModel;

class ViabillAgreementModel extends AbstractModel
{
    /**
     * @var bool|null $test
     */
    protected ?bool $test = null;

    /**
     * Viabill API key
     *
     * @var string|null $apiKey
     */
    protected ?string $apiKey = null;

    /**
     * Viabill API key
     *
     * @return string|null
     */
    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }

    /**
     * @return bool|null
     */
    public function getTest(): ?bool
    {
        return $this->test;
    }

    /**
     * Viabill API key
     *
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
        ], function ($value) {
            return $value !== null;
        });
    }
}
