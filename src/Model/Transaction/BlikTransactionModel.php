<?php

namespace Billwerk\Sdk\Model\Transaction;

class BlikTransactionModel extends AbstractTransactionModel
{
    /**
     * Blik id
     *
     * @var string|null $blikId
     */
    protected ?string $blikId = null;

    /**
     * Blik id
     *
     * @return string|null
     */
    public function getBlikId(): ?string
    {
        return $this->blikId;
    }

    /**
     * Blik id
     *
     * @param string|null $blikId
     *
     * @return self
     */
    public function setBlikId(?string $blikId): self
    {
        $this->blikId = $blikId;

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

        if (isset($response['blik_id'])) {
            $model->setBlikId($response['blik_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'blik_id' => $this->getBlikId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
