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
     * @return string|null
     */
    public function getBlikId(): ?string
    {
        return $this->blikId;
    }

    /**
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
}
