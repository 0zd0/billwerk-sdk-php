<?php

namespace Billwerk\Sdk\Model;

use Billwerk\Sdk\Enum\PaymentTypeEnum;
use Billwerk\Sdk\Enum\StatePaymentMethodEnum;
use DateTime;
use Exception;

class PaymentMethodModel extends AbstractModel implements HasIdInterface
{
    protected string $id;
    protected string $state;
    protected string $customer;
    protected ?string $reference;
    protected ?DateTime $failed;
    protected DateTime $created;
    protected ?CardModel $card;
    protected ?ApplePayModel $applePay;
    protected ?string $paymentType;
    protected ?MpsSubscriptionModel $mpsSubscription;
    protected ?array $vippsRecurringMandate;
    protected ?SepaMandateModel $sepaMandate;
    protected ?OfflineMandateModel $offlineMandate;

    /**
     * @return ApplePayModel|null
     */
    public function getApplePay(): ?ApplePayModel
    {
        return $this->applePay;
    }

    /**
     * @return CardModel|null
     */
    public function getCard(): ?CardModel
    {
        return $this->card;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * @return DateTime|null
     */
    public function getFailed(): ?DateTime
    {
        return $this->failed;
    }

    /**
     * @return MpsSubscriptionModel|null
     */
    public function getMpsSubscription(): ?MpsSubscriptionModel
    {
        return $this->mpsSubscription;
    }

    /**
     * @return OfflineMandateModel|null
     */
    public function getOfflineMandate(): ?OfflineMandateModel
    {
        return $this->offlineMandate;
    }

    /**
     * @return string|null
     */
    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @return SepaMandateModel|null
     */
    public function getSepaMandate(): ?SepaMandateModel
    {
        return $this->sepaMandate;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return array|null
     */
    public function getVippsRecurringMandate(): ?array
    {
        return $this->vippsRecurringMandate;
    }

    /**
     * @param ApplePayModel|null $applePay
     */
    public function setApplePay(?ApplePayModel $applePay): self
    {
        $this->applePay = $applePay;

        return $this;
    }

    /**
     * @param CardModel|null $card
     */
    public function setCard(?CardModel $card): self
    {
        $this->card = $card;

        return $this;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated(DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @param string $customer
     */
    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @param DateTime|null $failed
     */
    public function setFailed(?DateTime $failed): self
    {
        $this->failed = $failed;

        return $this;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param MpsSubscriptionModel|null $mpsSubscription
     */
    public function setMpsSubscription(?MpsSubscriptionModel $mpsSubscription): self
    {
        $this->mpsSubscription = $mpsSubscription;

        return $this;
    }

    /**
     * @param OfflineMandateModel|null $offlineMandate
     */
    public function setOfflineMandate(?OfflineMandateModel $offlineMandate): self
    {
        $this->offlineMandate = $offlineMandate;

        return $this;
    }

    /**
     * @param string|null $paymentType
     */
    public function setPaymentType(?string $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @param SepaMandateModel|null $sepaMandate
     */
    public function setSepaMandate(?SepaMandateModel $sepaMandate): self
    {
        $this->sepaMandate = $sepaMandate;

        return $this;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @param array|null $vippsRecurringMandate
     */
    public function setVippsRecurringMandate(?array $vippsRecurringMandate): self
    {
        $this->vippsRecurringMandate = $vippsRecurringMandate;

        return $this;
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        $model
            ->setId($response['id'])
            ->setCustomer($response['customer'])
            ->setCreated(new DateTime($response['created']))
            ->setPaymentType($response['payment_type']);

        if (in_array($response['state'], StatePaymentMethodEnum::getAll(), true)) {
            $model->setState($response['state']);
        }

        if (isset($response['reference'])) {
            $model->setReference($response['reference']);
        }

        if (isset($response['failed'])) {
            $model->setFailed(new DateTime($response['failed']));
        }

        if (isset($response['card'])) {
            $model->setCard(CardModel::fromArray($response['card']));
        }

        if (isset($response['applepay'])) {
            $model->setApplePay(ApplePayModel::fromArray($response['applepay']));
        }

        if (isset($response['mps_subscription'])) {
            $model->setMpsSubscription(MpsSubscriptionModel::fromArray($response['mps_subscription']));
        }

        if (isset($response['vipps_recurring_mandate'])) {
            $model->setVippsRecurringMandate($response['vipps_recurring_mandate']);
        }

        if (isset($response['sepa_mandate'])) {
            $model->setSepaMandate(SepaMandateModel::fromArray($response['sepa_mandate']));
        }

        if (isset($response['offline_mandate'])) {
            $model->setOfflineMandate(OfflineMandateModel::fromArray($response['offline_mandate']));
        }

        return $model;
    }

    public function getId(): ?string
    {
        return $this->id;
    }
}
