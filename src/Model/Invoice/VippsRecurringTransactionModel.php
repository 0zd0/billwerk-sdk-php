<?php

namespace Billwerk\Sdk\Model\Invoice;

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
     * @return string
     */
    public function getVippsRecurringId(): string
    {
        return $this->vippsRecurringId;
    }

    /**
     * @return array
     */
    public function getVippsRecurringMandate(): array
    {
        return $this->vippsRecurringMandate;
    }

    /**
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
}
