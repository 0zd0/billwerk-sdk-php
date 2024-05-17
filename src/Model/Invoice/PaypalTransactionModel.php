<?php

namespace Billwerk\Sdk\Model\Invoice;

class PaypalTransactionModel extends AbstractTransactionModel
{
    /**
     * PayPal id
     *
     * @var string|null $paypalId
     */
    protected ?string $paypalId = null;

    /**
     * @return string|null
     */
    public function getPaypalId(): ?string
    {
        return $this->paypalId;
    }

    /**
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
}
