<?php

namespace Billwerk\Sdk\Model\Invoice;

class PayconiqTransactionModel extends AbstractTransactionModel
{
    /**
     * Payconiq id
     *
     * @var string|null $payconiqId
     */
    protected ?string $payconiqId = null;

    /**
     * @return string|null
     */
    public function getPayconiqId(): ?string
    {
        return $this->payconiqId;
    }

    /**
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
}
