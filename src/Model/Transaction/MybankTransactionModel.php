<?php

namespace Billwerk\Sdk\Model\Transaction;

class MybankTransactionModel extends AbstractTransactionModel
{
    /**
     * MyBank id
     *
     * @var string|null $mybankId
     */
    protected ?string $mybankId = null;

    /**
     * MyBank id
     *
     * @return string|null
     */
    public function getMybankId(): ?string
    {
        return $this->mybankId;
    }

    /**
     * MyBank id
     *
     * @param string|null $mybankId
     *
     * @return self
     */
    public function setMybankId(?string $mybankId): self
    {
        $this->mybankId = $mybankId;

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

        if (isset($response['mybank_id'])) {
            $model->setMybankId($response['mybank_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'mybank_id' => $this->getMybankId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
