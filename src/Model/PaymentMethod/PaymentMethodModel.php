<?php

namespace Billwerk\Sdk\Model\PaymentMethod;

use Billwerk\Sdk\Enum\PaymentMethodPaymentTypeEnum;
use Billwerk\Sdk\Enum\PaymentMethodStateEnum;
use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasIdInterface;
use Billwerk\Sdk\Model\OfflineMandateModel;
use DateTime;
use Exception;

class PaymentMethodModel extends AbstractModel implements HasIdInterface
{
    /**
     * Unique id for payment method
     *
     * @var string $id
     */
    protected string $id;

    /**
     * State of the payment method: active, inactivated, failed, pending or deleted
     *
     * @see PaymentMethodStateEnum
     * @var string $state
     */
    protected string $state;

    /**
     * Customer by handle
     *
     * @var string $customer
     */
    protected string $customer;

    /**
     * Optional reference provided when creating the payment method. For payment methods created
     * with Reepay Checkout the reference will correspond to the session id for the Checkout session
     * that created the payment method
     *
     * @var string|null $reference
     */
    protected ?string $reference = null;

    /**
     * Date when the payment method failed. In ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $failed
     */
    protected ?DateTime $failed = null;

    /**
     * Date when the payment method was created. In ISO-8601 extended offset date-time format
     *
     * @var DateTime $created
     */
    protected DateTime $created;

    /**
     * Card object in case of Apple Pay payment method
     *
     * @var CardModel|null $card
     */
    protected ?CardModel $card = null;

    /**
     * Card object in case of Apple Pay payment method
     *
     * @var ApplePayModel|null $applePay
     */
    protected ?ApplePayModel $applePay = null;

    /**
     * Payment type for saved payment method, either: card, emv_token, vipps_recurring, applepay,
     * mobilepay_subscriptions, sepa, offline_cash, offline_bank_transfer or offline_other
     *
     * @see PaymentMethodPaymentTypeEnum
     * @var string|null $paymentType
     */
    protected ?string $paymentType = null;

    /**
     * MPS subscription object in case of MPS payment method
     *
     * @var MpsSubscriptionModel|null $mpsSubscription
     */
    protected ?MpsSubscriptionModel $mpsSubscription = null;

    /**
     * Vipps Recurring mandate object in case of Vipps Recurring payment method
     *
     * @var array|null $vippsRecurringMandate
     */
    protected ?array $vippsRecurringMandate = null;

    /**
     * SEPA mandate object in case of SEPA payment method
     *
     * @var SepaMandateModel|null $sepaMandate
     */
    protected ?SepaMandateModel $sepaMandate = null;

    /**
     * Offline mandate object in case of Offline payment method
     *
     * @var OfflineMandateModel|null $offlineMandate
     */
    protected ?OfflineMandateModel $offlineMandate = null;

    /**
     * Card object in case of Apple Pay payment method
     *
     * @return ApplePayModel|null
     */
    public function getApplePay(): ?ApplePayModel
    {
        return $this->applePay;
    }

    /**
     * Unique id for payment method
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Card object in case of Apple Pay payment method
     *
     * @return CardModel|null
     */
    public function getCard(): ?CardModel
    {
        return $this->card;
    }

    /**
     * Date when the payment method was created. In ISO-8601 extended offset date-time format
     *
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * Customer by handle
     *
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * Date when the payment method failed. In ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getFailed(): ?DateTime
    {
        return $this->failed;
    }

    /**
     * MPS subscription object in case of MPS payment method
     *
     * @return MpsSubscriptionModel|null
     */
    public function getMpsSubscription(): ?MpsSubscriptionModel
    {
        return $this->mpsSubscription;
    }

    /**
     * Offline mandate object in case of Offline payment method
     *
     * @return OfflineMandateModel|null
     */
    public function getOfflineMandate(): ?OfflineMandateModel
    {
        return $this->offlineMandate;
    }

    /**
     * Payment type for saved payment method, either: card, emv_token, vipps_recurring, applepay,
     *  mobilepay_subscriptions, sepa, offline_cash, offline_bank_transfer or offline_other
     *
     * @see PaymentMethodPaymentTypeEnum
     * @return string|null
     */
    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    /**
     * Optional reference provided when creating the payment method. For payment methods created
     *  with Reepay Checkout the reference will correspond to the session id for the Checkout session
     *  that created the payment method
     *
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * SEPA mandate object in case of SEPA payment method
     *
     * @return SepaMandateModel|null
     */
    public function getSepaMandate(): ?SepaMandateModel
    {
        return $this->sepaMandate;
    }

    /**
     * State of the payment method: active, inactivated, failed, pending or deleted
     *
     * @see PaymentMethodStateEnum
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * Vipps Recurring mandate object in case of Vipps Recurring payment method
     *
     * @return array|null
     */
    public function getVippsRecurringMandate(): ?array
    {
        return $this->vippsRecurringMandate;
    }

    /**
     * Card object in case of Apple Pay payment method
     *
     * @param ApplePayModel|null $applePay
     *
     * @return PaymentMethodModel
     */
    public function setApplePay(?ApplePayModel $applePay): self
    {
        $this->applePay = $applePay;

        return $this;
    }

    /**
     * Card object in case of Apple Pay payment method
     *
     * @param CardModel|null $card
     *
     * @return PaymentMethodModel
     */
    public function setCard(?CardModel $card): self
    {
        $this->card = $card;

        return $this;
    }

    /**
     * Date when the payment method was created. In ISO-8601 extended offset date-time format
     *
     * @param DateTime $created
     *
     * @return PaymentMethodModel
     */
    public function setCreated(DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Customer by handle
     *
     * @param string $customer
     *
     * @return PaymentMethodModel
     */
    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Date when the payment method failed. In ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $failed
     *
     * @return PaymentMethodModel
     */
    public function setFailed(?DateTime $failed): self
    {
        $this->failed = $failed;

        return $this;
    }

    /**
     * Unique id for payment method
     *
     * @param string $id
     *
     * @return PaymentMethodModel
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * MPS subscription object in case of MPS payment method
     *
     * @param MpsSubscriptionModel|null $mpsSubscription
     *
     * @return PaymentMethodModel
     */
    public function setMpsSubscription(?MpsSubscriptionModel $mpsSubscription): self
    {
        $this->mpsSubscription = $mpsSubscription;

        return $this;
    }

    /**
     * Offline mandate object in case of Offline payment method
     *
     * @param OfflineMandateModel|null $offlineMandate
     *
     * @return PaymentMethodModel
     */
    public function setOfflineMandate(?OfflineMandateModel $offlineMandate): self
    {
        $this->offlineMandate = $offlineMandate;

        return $this;
    }

    /**
     * Payment type for saved payment method, either: card, emv_token, vipps_recurring, applepay,
     *  mobilepay_subscriptions, sepa, offline_cash, offline_bank_transfer or offline_other
     *
     * @see PaymentMethodPaymentTypeEnum
     *
     * @param string|null $paymentType
     *
     * @return PaymentMethodModel
     */
    public function setPaymentType(?string $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    /**
     * Optional reference provided when creating the payment method. For payment methods created
     *  with Reepay Checkout the reference will correspond to the session id for the Checkout session
     *  that created the payment method
     *
     * @param string|null $reference
     *
     * @return PaymentMethodModel
     */
    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * SEPA mandate object in case of SEPA payment method
     *
     * @param SepaMandateModel|null $sepaMandate
     *
     * @return PaymentMethodModel
     */
    public function setSepaMandate(?SepaMandateModel $sepaMandate): self
    {
        $this->sepaMandate = $sepaMandate;

        return $this;
    }

    /**
     * State of the payment method: active, inactivated, failed, pending or deleted
     *
     * @see PaymentMethodStateEnum
     *
     * @param string $state
     *
     * @return PaymentMethodModel
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Vipps Recurring mandate object in case of Vipps Recurring payment method
     *
     * @param array|null $vippsRecurringMandate
     *
     * @return PaymentMethodModel
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

        if (in_array($response['state'], PaymentMethodStateEnum::getAll(), true)) {
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

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->getId(),
            'customer' => $this->getCustomer(),
            'created' => $this->getCreated() ? $this->getCreated()->format('Y-m-d\TH:i:s.v') : null,
            'payment_type' => $this->getPaymentType(),
            'state' => $this->getState(),
            'reference' => $this->getReference(),
            'failed' => $this->getFailed() ? $this->getFailed()->format('Y-m-d\TH:i:s.v') : null,
            'card' => $this->getCard() ? $this->getCard()->toArray() : null,
            'applepay' => $this->getApplePay() ? $this->getApplePay()->toArray() : null,
            'mps_subscription' => $this->getMpsSubscription() ? $this->getMpsSubscription()->toArray() : null,
            'vipps_recurring_mandate' => $this->getVippsRecurringMandate(),
            'sepa_mandate' => $this->getSepaMandate() ? $this->getSepaMandate()->toArray() : null,
            'offline_mandate' => $this->getOfflineMandate() ? $this->getOfflineMandate()->toArray() : null,
        ], function ($value) {
            return $value !== null;
        });
    }
}
