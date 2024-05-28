<?php

namespace Billwerk\Sdk\Model\Transaction;

class WechatpayTransactionModel extends AbstractTransactionModel
{
    /**
     * Wechatpay id
     *
     * @var string|null $wechatpayId
     */
    protected ?string $wechatpayId = null;

    /**
     * @return string|null
     */
    public function getWechatpayId(): ?string
    {
        return $this->wechatpayId;
    }

    /**
     * @param string|null $wechatpayId
     *
     * @return self
     */
    public function setWechatpayId(?string $wechatpayId): self
    {
        $this->wechatpayId = $wechatpayId;

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

        if (isset($response['wechatpay_id'])) {
            $model->setWechatpayId($response['wechatpay_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'wechatpay_id' => $this->getWechatpayId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
