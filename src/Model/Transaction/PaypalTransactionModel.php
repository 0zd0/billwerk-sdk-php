<?php

namespace Billwerk\Sdk\Model\Transaction;

class PaypalTransactionModel extends AbstractTransactionModel
{
    /**
     * PayPal id
     *
     * @var string|null $paypalId
     */
    protected ?string $paypalId = null;

    /**
     * PayPal id
     *
     * @return string|null
     */
    public function getPaypalId(): ?string
    {
        return $this->paypalId;
    }

    /**
     * PayPal id
     *
     * @param string|null $paypalId
     *
     * @return self
     */
    public function setPaypalId(?string $paypalId): self
    {
        $this->paypalId = $paypalId;

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

        if (isset($response['paypal_id'])) {
            $model->setPaypalId($response['paypal_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'paypal_id' => $this->getPaypalId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
