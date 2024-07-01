<?php

namespace Billwerk\Sdk\Model\Transaction;

class PayconiqTransactionModel extends AbstractTransactionModel
{
    /**
     * Payconiq id
     *
     * @var string|null $payconiqId
     */
    protected ?string $payconiqId = null;

    /**
     * Payconiq id
     *
     * @return string|null
     */
    public function getPayconiqId(): ?string
    {
        return $this->payconiqId;
    }

    /**
     * Payconiq id
     *
     * @param string|null $payconiqId
     *
     * @return self
     */
    public function setPayconiqId(?string $payconiqId): self
    {
        $this->payconiqId = $payconiqId;

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

        if (isset($response['payconiq_id'])) {
            $model->setPayconiqId($response['payconiq_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'payconiq_id' => $this->getPayconiqId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
