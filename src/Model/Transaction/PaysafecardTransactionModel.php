<?php

namespace Billwerk\Sdk\Model\Transaction;

class PaysafecardTransactionModel extends AbstractTransactionModel
{
    /**
     * Paysafecard id
     *
     * @var string|null $paysafecardId
     */
    protected ?string $paysafecardId = null;

    /**
     * @return string|null
     */
    public function getPaysafecardId(): ?string
    {
        return $this->paysafecardId;
    }

    /**
     * @param string|null $paysafecardId
     *
     * @return self
     */
    public function setPaysafecardId(?string $paysafecardId): self
    {
        $this->paysafecardId = $paysafecardId;

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

        if (isset($response['paysafecard_id'])) {
            $model->setPaysafecardId($response['paysafecard_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'paysafecard_id' => $this->getPaysafecardId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
