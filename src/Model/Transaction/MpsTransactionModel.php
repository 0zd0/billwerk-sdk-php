<?php

namespace Billwerk\Sdk\Model\Transaction;

use Billwerk\Sdk\Enum\MpsPaymentTypeEnum;
use Exception;

class MpsTransactionModel extends AbstractTransactionModel
{
    /**
     * MobilePay Subscriptions id
     *
     * @var string $mpsId
     */
    protected string $mpsId;

    /**
     * MobilePay Subscriptions agreement
     *
     * @var MpsSubscriptionModel $mpsSubscription
     */
    protected MpsSubscriptionModel $mpsSubscription;

    /**
     * MobilePay Subscriptions payment type: regular, one_off_cit (customer initiated),
     * one_off_mit (merchant initiated auto reserve)
     *
     * @see MpsPaymentTypeEnum
     * @var string $mpsPaymentType
     */
    protected string $mpsPaymentType;

    /**
     * MobilePay Subscriptions id
     *
     * @return string
     */
    public function getMpsId(): string
    {
        return $this->mpsId;
    }

    /**
     * MobilePay Subscriptions agreement
     *
     * @return MpsSubscriptionModel
     */
    public function getMpsSubscription(): MpsSubscriptionModel
    {
        return $this->mpsSubscription;
    }

    /**
     * MobilePay Subscriptions payment type: regular, one_off_cit (customer initiated),
     *  one_off_mit (merchant initiated auto reserve)
     *
     * @see MpsPaymentTypeEnum
     * @return string
     */
    public function getMpsPaymentType(): string
    {
        return $this->mpsPaymentType;
    }

    /**
     * MobilePay Subscriptions agreement
     *
     * @param MpsSubscriptionModel $mpsSubscription
     *
     * @return self
     */
    public function setMpsSubscription(MpsSubscriptionModel $mpsSubscription): self
    {
        $this->mpsSubscription = $mpsSubscription;

        return $this;
    }

    /**
     * MobilePay Subscriptions id
     *
     * @param string $mpsId
     *
     * @return self
     */
    public function setMpsId(string $mpsId): self
    {
        $this->mpsId = $mpsId;

        return $this;
    }

    /**
     * MobilePay Subscriptions payment type: regular, one_off_cit (customer initiated),
     *  one_off_mit (merchant initiated auto reserve)
     *
     * @see MpsPaymentTypeEnum
     *
     * @param string $mpsPaymentType
     *
     * @return self
     */
    public function setMpsPaymentType(string $mpsPaymentType): self
    {
        $this->mpsPaymentType = $mpsPaymentType;

        return $this;
    }

    /**
     * @param array $response
     *
     * @return self
     * @throws Exception
     */
    public static function fromArray(array $response): self
    {
        $model = new static();

        $model->fromArrayDefault($response);

        $model->setMpsId($response['mps_id']);

        $model->setMpsSubscription(MpsSubscriptionModel::fromArray($response['mps_subscription']));

        if (in_array($response['mps_payment_type'], MpsPaymentTypeEnum::getAll(), true)) {
            $model->setMpsPaymentType($response['mps_payment_type']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'mps_id' => $this->getMpsId(),
            'mps_payment_type' => $this->getMpsPaymentType(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
