<?php

namespace Billwerk\Sdk\Model\Invoice;

class BancomatpayTransactionModel extends AbstractTransactionModel
{
    /**
     * Bancomat Pay id
     *
     * @var string|null $bancomatpayId
     */
    protected ?string $bancomatpayId = null;

    /**
     * @return string|null
     */
    public function getBancomatpayId(): ?string
    {
        return $this->bancomatpayId;
    }

    /**
     * @param string|null $bancomatpayId
     *
     * @return self
     */
    public function setBancomatpayId(?string $bancomatpayId): self
    {
        $this->bancomatpayId = $bancomatpayId;

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

        if (isset($response['bancomatpay_id'])) {
            $model->setBancomatpayId($response['bancomatpay_id']);
        }

        return $model;
    }
}
