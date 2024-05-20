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
     * @return string|null
     */
    public function getSantanderId(): ?string
    {
        return $this->santanderId;
    }

    /**
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
}
