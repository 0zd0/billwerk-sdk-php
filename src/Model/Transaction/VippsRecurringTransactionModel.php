<?php

namespace Billwerk\Sdk\Model\Transaction;

class VippsRecurringTransactionModel extends AbstractTransactionModel
{
    /**
     * Vipps Recurring id
     *
     * @var string $vippsRecurringId
     */
    protected string $vippsRecurringId;

    /**
     * Vipps Recurring mandate object in case of Vipps Recurring payment method
     *
     * @var array $vippsRecurringMandate
     */
    protected array $vippsRecurringMandate;

    /**
     * Vipps Recurring id
     *
     * @return string
     */
    public function getVippsRecurringId(): string
    {
        return $this->vippsRecurringId;
    }

    /**
     * Vipps Recurring mandate object in case of Vipps Recurring payment method
     *
     * @return array
     */
    public function getVippsRecurringMandate(): array
    {
        return $this->vippsRecurringMandate;
    }

    /**
     * Vipps Recurring mandate object in case of Vipps Recurring payment method
     *
     * @param array $vippsRecurringMandate
     *
     * @return self
     */
    public function setVippsRecurringMandate(array $vippsRecurringMandate): self
    {
        $this->vippsRecurringMandate = $vippsRecurringMandate;

        return $this;
    }

    /**
     * Vipps Recurring id
     *
     * @param string $vippsRecurringId
     *
     * @return self
     */
    public function setVippsRecurringId(string $vippsRecurringId): self
    {
        $this->vippsRecurringId = $vippsRecurringId;

        return $this;
    }

    public static function fromArray(array $response): self
    {
        $model = new self();

        $model->fromArrayDefault($response);

        $model->setVippsRecurringId($response['vipps_recurring_id']);
        $model->setVippsRecurringMandate($response['vipps_recurring_mandate']);

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'vipps_recurring_id' => $this->getVippsRecurringId(),
            'vipps_recurring_mandate' => $this->getVippsRecurringMandate(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
