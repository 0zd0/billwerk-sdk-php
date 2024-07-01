<?php

namespace Billwerk\Sdk\Model\PaymentMethod;

use Billwerk\Sdk\Enum\CardTypeEnum;
use Billwerk\Sdk\Enum\PaymentMethodPaymentTypeEnum;
use Billwerk\Sdk\Enum\PaymentMethodStateEnum;
use Billwerk\Sdk\Enum\RangeEnum;
use Billwerk\Sdk\Model\AbstractCollectionQueriesModel;
use Billwerk\Sdk\Model\HasRequestApiInterface;
use Exception;

class PaymentMethodCollectionGetModel extends AbstractCollectionQueriesModel implements HasRequestApiInterface
{
    public const RANGES = [
        RangeEnum::CREATED,
    ];

    /**
     * Payment method id
     *
     * @var string|null $id
     */
    protected ?string $id = null;

    /**
     * Payment state, multiple can be defined. States: pending, active, inactivated, failed and deleted
     *
     * @see PaymentMethodStateEnum
     * @var string[]|null $state
     */
    protected ?array $state = null;

    /**
     * Payment method payment type, multiple can be defined. card, mobilepay, mobilepay_subscriptions, vipps,
     * swish, viabill, manual, applepay, googlepay, paypal, santander, klarna_pay_now, klarna_pay_later,
     * klarna_slice_it, klarna_direct_bank_transfer, klarna_direct_debit, resurs, ideal, p24, blik, blik_oc,
     * bancontact, giropay, sepa, trustly, verkkopankki, eps, estonia_banks, latvia_banks, lithuania_banks,
     * mb_way, multibanco, mybank, payconiq, paysafecard, paysera, postfinance, satispay, wechatpay, offline_cash,
     * offline_bank_transfer or offline_other
     *
     * @see PaymentMethodPaymentTypeEnum
     * @var string[]|null $paymentType
     */
    protected ?array $paymentType = null;

    /**
     * Customer owning payment method
     *
     * @var string|null $customer
     */
    protected ?string $customer = null;

    /**
     * Payment methods for subscription
     *
     * @var string|null $subscription
     */
    protected ?string $subscription = null;

    /**
     * Payment method reference
     *
     * @var string|null $reference
     */
    protected ?string $reference = null;

    /**
     * Failed date interval
     *
     * @var string|null $failed
     */
    protected ?string $failed = null;

    /**
     * Card payment methods with card type. Multiple can be defined. unknown, visa, mc, dankort, visa_dk,
     * ffk, visa_elec, maestro, laser, amex, diners, discover or jcb
     *
     * @see CardTypeEnum
     * @var array|null $cardType
     */
    protected ?array $cardType = null;

    /**
     * Card payment methods with transaction card type. Multiple can be defined. unknown, visa, mc, dankort,
     * visa_dk, ffk, visa_elec, maestro, laser, amex, diners, discover or jcb
     *
     * @see CardTypeEnum
     * @var array|null $transactionCardType
     */
    protected ?array $transactionCardType = null;

    /**
     * Card payment methods with card with prefix
     *
     * @var string|null $cardPrefix
     */
    protected ?string $cardPrefix = null;

    /**
     * Card payment methods with card number postfix
     *
     * @var string|null $cardPostfix
     */
    protected ?string $cardPostfix = null;

    /**
     * Card payment methods with card number postfix
     *
     * @var string|null $cardFingerprint
     */
    protected ?string $cardFingerprint = null;

    /**
     * Card payment methods with card country. Multiple can be defined. In ISO 3166-1 alpha-2
     *
     * @var string[]|null $cardCountry
     */
    protected ?array $cardCountry = null;

    /**
     * Card payment methods tied to card gateway
     *
     * @var string|null $cardGateway
     */
    protected ?string $cardGateway = null;

    /**
     * Card payment methods tied to card agreement with id
     *
     * @var string|null $cardAgreement
     */
    protected ?string $cardAgreement = null;

    /**
     * Offline agreement handle
     *
     * @var string|null $offlineAgreementHandle
     */
    protected ?string $offlineAgreementHandle = null;

    /**
     * MobilePay Subscription external id
     *
     * @var string|null $mpsExternalId
     */
    protected ?string $mpsExternalId = null;

    /**
     * Payment method id
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Card payment methods tied to card agreement with id
     *
     * @return string|null
     */
    public function getCardAgreement(): ?string
    {
        return $this->cardAgreement;
    }

    /**
     * Card payment methods with card country. Multiple can be defined. In ISO 3166-1 alpha-2
     *
     * @return array|null
     */
    public function getCardCountry(): ?array
    {
        return $this->cardCountry;
    }

    /**
     * Card payment methods with card number postfix
     *
     * @return string|null
     */
    public function getCardFingerprint(): ?string
    {
        return $this->cardFingerprint;
    }

    /**
     * Card payment methods tied to card gateway
     *
     * @return string|null
     */
    public function getCardGateway(): ?string
    {
        return $this->cardGateway;
    }

    /**
     * Card payment methods with card number postfix
     *
     * @return string|null
     */
    public function getCardPostfix(): ?string
    {
        return $this->cardPostfix;
    }

    /**
     * Card payment methods with card with prefix
     *
     * @return string|null
     */
    public function getCardPrefix(): ?string
    {
        return $this->cardPrefix;
    }

    /**
     * Card payment methods with card type. Multiple can be defined. unknown, visa, mc, dankort, visa_dk,
     *  ffk, visa_elec, maestro, laser, amex, diners, discover or jcb
     *
     * @see CardTypeEnum
     * @return array|null
     */
    public function getCardType(): ?array
    {
        return $this->cardType;
    }

    /**
     * Customer owning payment method
     *
     * @return string|null
     */
    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    /**
     * Payment method payment type, multiple can be defined. card, mobilepay, mobilepay_subscriptions, vipps,
     *  swish, viabill, manual, applepay, googlepay, paypal, santander, klarna_pay_now, klarna_pay_later,
     *  klarna_slice_it, klarna_direct_bank_transfer, klarna_direct_debit, resurs, ideal, p24, blik, blik_oc,
     *  bancontact, giropay, sepa, trustly, verkkopankki, eps, estonia_banks, latvia_banks, lithuania_banks,
     *  mb_way, multibanco, mybank, payconiq, paysafecard, paysera, postfinance, satispay, wechatpay, offline_cash,
     *  offline_bank_transfer or offline_other
     *
     * @see PaymentMethodPaymentTypeEnum
     * @return array|null
     */
    public function getPaymentType(): ?array
    {
        return $this->paymentType;
    }

    /**
     * Failed date interval
     *
     * @return string|null
     */
    public function getFailed(): ?string
    {
        return $this->failed;
    }

    /**
     * MobilePay Subscription external id
     *
     * @return string|null
     */
    public function getMpsExternalId(): ?string
    {
        return $this->mpsExternalId;
    }

    /**
     * Offline agreement handle
     *
     * @return string|null
     */
    public function getOfflineAgreementHandle(): ?string
    {
        return $this->offlineAgreementHandle;
    }

    /**
     * Payment methods for subscription
     *
     * @return string|null
     */
    public function getSubscription(): ?string
    {
        return $this->subscription;
    }

    /**
     * Payment state, multiple can be defined. States: pending, active, inactivated, failed and deleted
     *
     * @see PaymentMethodStateEnum
     * @return array|null
     */
    public function getState(): ?array
    {
        return $this->state;
    }

    /**
     * Payment method reference
     *
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * Card payment methods with transaction card type. Multiple can be defined. unknown, visa, mc, dankort,
     *  visa_dk, ffk, visa_elec, maestro, laser, amex, diners, discover or jcb
     *
     * @see CardTypeEnum
     * @return array|null
     */
    public function getTransactionCardType(): ?array
    {
        return $this->transactionCardType;
    }

    /**
     * Payment method id
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Payment state, multiple can be defined. States: pending, active, inactivated, failed and deleted
     *
     * @see PaymentMethodStateEnum
     *
     * @param array|null $state
     *
     * @return self
     */
    public function setState(?array $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Payment method payment type, multiple can be defined. card, mobilepay, mobilepay_subscriptions, vipps,
     *  swish, viabill, manual, applepay, googlepay, paypal, santander, klarna_pay_now, klarna_pay_later,
     *  klarna_slice_it, klarna_direct_bank_transfer, klarna_direct_debit, resurs, ideal, p24, blik, blik_oc,
     *  bancontact, giropay, sepa, trustly, verkkopankki, eps, estonia_banks, latvia_banks, lithuania_banks,
     *  mb_way, multibanco, mybank, payconiq, paysafecard, paysera, postfinance, satispay, wechatpay, offline_cash,
     *  offline_bank_transfer or offline_other
     *
     * @see PaymentMethodPaymentTypeEnum
     *
     * @param array|null $paymentType
     *
     * @return self
     */
    public function setPaymentType(?array $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    /**
     * Customer owning payment method
     *
     * @param string|null $customer
     *
     * @return self
     */
    public function setCustomer(?string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Payment methods for subscription
     *
     * @param string|null $subscription
     *
     * @return self
     */
    public function setSubscription(?string $subscription): self
    {
        $this->subscription = $subscription;

        return $this;
    }

    /**
     * Payment method reference
     *
     * @param string|null $reference
     *
     * @return self
     */
    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Failed date interval
     *
     * @param string|null $failed
     *
     * @return self
     */
    public function setFailed(?string $failed): self
    {
        $this->failed = $failed;

        return $this;
    }

    /**
     * Card payment methods with card type. Multiple can be defined. unknown, visa, mc, dankort, visa_dk,
     *  ffk, visa_elec, maestro, laser, amex, diners, discover or jcb
     *
     * @see CardTypeEnum
     *
     * @param array|null $cardType
     *
     * @return self
     */
    public function setCardType(?array $cardType): self
    {
        $this->cardType = $cardType;

        return $this;
    }

    /**
     * Card payment methods with transaction card type. Multiple can be defined. unknown, visa, mc, dankort,
     *  visa_dk, ffk, visa_elec, maestro, laser, amex, diners, discover or jcb
     *
     * @see CardTypeEnum
     *
     * @param array|null $transactionCardType
     *
     * @return self
     */
    public function setTransactionCardType(?array $transactionCardType): self
    {
        $this->transactionCardType = $transactionCardType;

        return $this;
    }

    /**
     * Card payment methods with card with prefix
     *
     * @param string|null $cardPrefix
     *
     * @return self
     */
    public function setCardPrefix(?string $cardPrefix): self
    {
        $this->cardPrefix = $cardPrefix;

        return $this;
    }

    /**
     * Card payment methods with card number postfix
     *
     * @param string|null $cardPostfix
     *
     * @return self
     */
    public function setCardPostfix(?string $cardPostfix): self
    {
        $this->cardPostfix = $cardPostfix;

        return $this;
    }

    /**
     * Card payment methods with card number postfix
     *
     * @param string|null $cardFingerprint
     *
     * @return self
     */
    public function setCardFingerprint(?string $cardFingerprint): self
    {
        $this->cardFingerprint = $cardFingerprint;

        return $this;
    }

    /**
     * Card payment methods with card country. Multiple can be defined. In ISO 3166-1 alpha-2
     *
     * @param array|null $cardCountry
     *
     * @return self
     */
    public function setCardCountry(?array $cardCountry): self
    {
        $this->cardCountry = $cardCountry;

        return $this;
    }

    /**
     * Card payment methods tied to card gateway
     *
     * @param string|null $cardGateway
     *
     * @return self
     */
    public function setCardGateway(?string $cardGateway): self
    {
        $this->cardGateway = $cardGateway;

        return $this;
    }

    /**
     * Card payment methods tied to card agreement with id
     *
     * @param string|null $cardAgreement
     *
     * @return self
     */
    public function setCardAgreement(?string $cardAgreement): self
    {
        $this->cardAgreement = $cardAgreement;

        return $this;
    }

    /**
     * Offline agreement handle
     *
     * @param string|null $offlineAgreementHandle
     *
     * @return self
     */
    public function setOfflineAgreementHandle(?string $offlineAgreementHandle): self
    {
        $this->offlineAgreementHandle = $offlineAgreementHandle;

        return $this;
    }

    /**
     * MobilePay Subscription external id
     *
     * @param string|null $mpsExternalId
     *
     * @return self
     */
    public function setMpsExternalId(?string $mpsExternalId): self
    {
        $this->mpsExternalId = $mpsExternalId;

        return $this;
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $response): self
    {
        $model = new static();

        $model->fromArrayDefault($response);

        if (isset($response['id'])) {
            $model->setId($response['id']);
        }

        if (isset($response['state'])) {
            $model->setState($response['state']);
        }

        if (isset($response['payment_type'])) {
            $model->setPaymentType($response['payment_type']);
        }

        if (isset($response['customer'])) {
            $model->setCustomer($response['customer']);
        }

        if (isset($response['subscription'])) {
            $model->setSubscription($response['subscription']);
        }

        if (isset($response['reference'])) {
            $model->setReference($response['reference']);
        }

        if (isset($response['failed'])) {
            $model->setFailed($response['failed']);
        }

        if (isset($response['card_type'])) {
            $model->setCardType($response['card_type']);
        }

        if (isset($response['transaction_card_type'])) {
            $model->setTransactionCardType($response['transaction_card_type']);
        }

        if (isset($response['card_prefix'])) {
            $model->setCardPrefix($response['card_prefix']);
        }

        if (isset($response['card_postfix'])) {
            $model->setCardPostfix($response['card_postfix']);
        }

        if (isset($response['card_fingerprint'])) {
            $model->setCardFingerprint($response['card_fingerprint']);
        }

        if (isset($response['card_country'])) {
            $model->setCardCountry($response['card_country']);
        }

        if (isset($response['card_gateway'])) {
            $model->setCardGateway($response['card_gateway']);
        }

        if (isset($response['card_agreement'])) {
            $model->setCardAgreement($response['card_agreement']);
        }

        if (isset($response['offline_agreement_handle'])) {
            $model->setOfflineAgreementHandle($response['offline_agreement_handle']);
        }

        if (isset($response['mps_external_id'])) {
            $model->setMpsExternalId($response['mps_external_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'id' => $this->getId(),
            'state' => $this->getState(),
            'payment_type' => $this->getPaymentType(),
            'customer' => $this->getCustomer(),
            'subscription' => $this->getSubscription(),
            'reference' => $this->getReference(),
            'failed' => $this->getFailed(),
            'card_type' => $this->getCardType(),
            'transaction_card_type' => $this->getTransactionCardType(),
            'card_prefix' => $this->getCardPrefix(),
            'card_postfix' => $this->getCardPostfix(),
            'card_fingerprint' => $this->getCardFingerprint(),
            'card_country' => $this->getCardCountry(),
            'card_gateway' => $this->getCardGateway(),
            'card_agreement' => $this->getCardAgreement(),
            'offline_agreement_handle' => $this->getOfflineAgreementHandle(),
            'mps_external_id' => $this->getMpsExternalId(),
        ]), function ($value) {
            return $value !== null;
        });
    }

    public function toApi(): array
    {
        return $this->toArray();
    }
}
