<?php

namespace Billwerk\Sdk\Model\Transaction;

class SatispayTransactionModel extends AbstractTransactionModel
{
    /**
     * Satispay id
     *
     * @var string|null $satispayId
     */
    protected ?string $satispayId = null;

    /**
     * Satispay id
     *
     * @return string|null
     */
    public function getSatispayId(): ?string
    {
        return $this->satispayId;
    }

    /**
     * Satispay id
     *
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

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'satispay_id' => $this->getSatispayId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
