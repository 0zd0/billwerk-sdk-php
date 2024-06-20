<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Model\AbstractModel;

class GooglepayAgreementModel extends AbstractModel
{
    /**
     * @var bool|null $test
     */
    protected ?bool $test = null;

    /**
     * @var string|null $displayName
     */
    protected ?string $displayName = null;

    /**
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    /**
     * @return bool|null
     */
    public function getTest(): ?bool
    {
        return $this->test;
    }

    /**
     * @param string|null $displayName
     *
     * @return self
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->displayName = $displayName;

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

        if (isset($response['display_name'])) {
            $model->setDisplayName($response['display_name']);
        }

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
            'display_name' => $this->getDisplayName(),
            'test' => $this->getTest(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
