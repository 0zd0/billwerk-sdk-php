<?php

namespace Billwerk\Sdk\Model\Transaction;

class ViabillTransactionModel extends AbstractTransactionModel
{
    /**
     * ViaBill id
     *
     * @var string|null $viabillId
     */
    protected ?string $viabillId = null;

    /**
     * ViaBill id
     *
     * @return string|null
     */
    public function getViabillId(): ?string
    {
        return $this->viabillId;
    }

    /**
     * ViaBill id
     *
     * @param string|null $viabillId
     *
     * @return self
     */
    public function setViabillId(?string $viabillId): self
    {
        $this->viabillId = $viabillId;

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

        if (isset($response['viabill_id'])) {
            $model->setViabillId($response['viabill_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'viabill_id' => $this->getViabillId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
