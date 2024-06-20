<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Model\AbstractModel;

class SwishAgreementModel extends AbstractModel
{
    /**
     * Swish Number
     *
     * @var string $swishNumber
     */
    protected string $swishNumber;

    /**
     * @return string
     */
    public function getSwishNumber(): string
    {
        return $this->swishNumber;
    }

    /**
     * @param string $swishNumber
     *
     * @return self
     */
    public function setSwishNumber(string $swishNumber): self
    {
        $this->swishNumber = $swishNumber;

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

        $model->setSwishNumber($response['swishNumber']);

        return $model;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_filter([
            'swishNumber' => $this->getSwishNumber(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
