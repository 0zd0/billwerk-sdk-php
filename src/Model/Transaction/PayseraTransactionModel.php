<?php

namespace Billwerk\Sdk\Model\Transaction;

class PayseraTransactionModel extends AbstractTransactionModel
{
    /**
     * Paysera id
     *
     * @var string|null $payseraId
     */
    protected ?string $payseraId = null;

    /**
     * Paysera id
     *
     * @return string|null
     */
    public function getPayseraId(): ?string
    {
        return $this->payseraId;
    }

    /**
     * Paysera id
     *
     * @param string|null $payseraId
     *
     * @return self
     */
    public function setPayseraId(?string $payseraId): self
    {
        $this->payseraId = $payseraId;

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

        if (isset($response['paysera_id'])) {
            $model->setPayseraId($response['paysera_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'paysera_id' => $this->getPayseraId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
