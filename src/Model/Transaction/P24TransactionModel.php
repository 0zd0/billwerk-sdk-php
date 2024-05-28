<?php

namespace Billwerk\Sdk\Model\Transaction;

class P24TransactionModel extends AbstractTransactionModel
{
    /**
     * P24 id
     *
     * @var string|null $p24Id
     */
    protected ?string $p24Id = null;

    /**
     * @return string|null
     */
    public function getP24Id(): ?string
    {
        return $this->p24Id;
    }

    /**
     * @param string|null $p24Id
     *
     * @return self
     */
    public function setP24Id(?string $p24Id): self
    {
        $this->p24Id = $p24Id;

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

        if (isset($response['p24_id'])) {
            $model->setP24Id($response['p24_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'p24_id' => $this->getP24Id(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
