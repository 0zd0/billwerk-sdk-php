<?php

namespace Billwerk\Sdk\Model\Invoice;

class SatispayTransactionModel extends AbstractTransactionModel
{
    /**
     * Satispay id
     *
     * @var string|null $anydayId
     */
    protected ?string $satispayId = null;

    /**
     * @return string|null
     */
    public function getSatispayId(): ?string
    {
        return $this->satispayId;
    }

    /**
     * @param string|null $satispayId
     *
     * @return self
     */
    public function setSatispayId(?string $satispayId): self
    {
        $this->satispayId = $satispayId;

        return $this;
    }

    /**
     * @param array $response
     *
     * @return self
     */
    public static function fromArray(array $response): self
    {
        $model = new static();

        $model->fromArrayDefault($response);

        if (isset($response['satispay_id'])) {
            $model->setSatispayId($response['satispay_id']);
        }

        return $model;
    }
}
