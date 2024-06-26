<?php

namespace Billwerk\Sdk\Model\Transaction;

class SantanderTransactionModel extends AbstractTransactionModel
{
    /**
     * Santander id
     *
     * @var string|null $santanderId
     */
    protected ?string $santanderId = null;

    /**
     * Santander id
     *
     * @return string|null
     */
    public function getSantanderId(): ?string
    {
        return $this->santanderId;
    }

    /**
     * Santander id
     *
     * @param string|null $santanderId
     *
     * @return self
     */
    public function setSantanderId(?string $santanderId): self
    {
        $this->santanderId = $santanderId;

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

        if (isset($response['santander_id'])) {
            $model->setSantanderId($response['santander_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'santander_id' => $this->getSantanderId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
