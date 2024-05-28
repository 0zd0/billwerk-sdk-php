<?php

namespace Billwerk\Sdk\Model\Charge;

use Billwerk\Sdk\Enum\CardTypeEnum;
use Billwerk\Sdk\Enum\ProviderEnum;
use Billwerk\Sdk\Enum\SourceTypeEnum;
use Billwerk\Sdk\Enum\StrongAuthenticationStatusEnum;
use Billwerk\Sdk\Enum\ThreeDSecureStatusEnum;
use Billwerk\Sdk\Model\AbstractModel;

class SourceModel extends AbstractModel
{
    /**
     * Type of charge source: card - existing customer card, card_token - card token,
     * mpo - MobilePay Online, vipps, vipps_recurring, swish, viabill, anyday,
     * manual, applepay, googlepay, paypal, klarna_pay_now, klarna_pay_later,
     * klarna_slice_it, klarna_direct_bank_transfer, klarna_direct_debit, resurs,
     * mobilepay_subscriptions, emv_token, bancomatpay, bcmc, blik, pp_blik_oc,
     * giropay, ideal, p24, sepa, trustly, eps, estonia_banks, latvia_banks,
     * lithuania_banks, mb_way, multibanco, mybank, payconiq, paysafecard, paysera,
     * postfinance, satispay, twint, wechatpay, santander, or verkkopankki, offline_cash,
     * offline_bank_transfer, offline_other
     *
     * @see SourceTypeEnum
     * @var string $type
     */
    protected string $type;

    /**
     * Reference to customer card if source type card
     *
     * @var string|null $card
     */
    protected ?string $card = null;

    /**
     * Reference to MobilePay Subscriptions payment method if source type mobilepay_subscriptions
     *
     * @var string|null $mps
     */
    protected ?string $mps = null;

    /**
     * IBAN number if source type sepa
     *
     * @var string|null $iban
     */
    protected ?string $iban = null;

    /**
     * Uniquely identifies this particular card number if credit card source
     *
     * @var string|null $fingerprint
     */
    protected ?string $fingerprint = null;

    /**
     * Card acquirer or card payment gateway used if card source: reepay, clearhaus,
     * nets, swedbank, handelsbanken, elavon, bambora, valitor, dibs, stripe, epay, test
     *
     * @see ProviderEnum
     * @var string|null $provider
     */
    protected ?string $provider = null;

    /**
     * If the card transaction was exempted from a 3DS challenge
     *
     * @var bool|null $frictionless
     */
    protected ?bool $frictionless = null;

    /**
     * Reference to Vipps Recurring Subscriptions payment method if source type vipps_recurring
     *
     * @var string|null $vippsRecurring
     */
    protected ?string $vippsRecurring = null;

    /**
     * Reference to SEPA Mandate payment method if source type sepa
     *
     * @var string|null $sepaMandate
     */
    protected ?string $sepaMandate = null;

    /**
     * Agreement handle if source type offline_cash, offline_bank_transfer, offline_other
     *
     * @var string|null $offlineAgreementHandle
     */
    protected ?string $offlineAgreementHandle = null;

    /**
     * Reference to authorization transaction if charge is settled after authorization
     *
     * @var string|null $authTransaction
     */
    protected ?string $authTransaction = null;

    /**
     * Card type if credit card source: unknown, visa, mc, dankort, visa_dk, ffk,
     * visa_elec, maestro, laser, amex, diners, discover or jcb
     *
     * @see CardTypeEnum
     * @var string|null $cardType
     */
    protected ?string $cardType = null;

    /**
     * Transaction card type if credit card source. Will differ from card_type if
     * co-branded card. Transaction card type is the card type used for the transaction.
     * unknown, visa, mc, dankort, visa_dk, ffk, visa_elec, maestro, laser, amex, diners,
     * discover or jcb
     *
     * @var string|null $transactionCardType
     */
    protected ?string $transactionCardType = null;

    /**
     * Card expire date on form MM-YY if credit card source
     *
     * @var string|null $expDate
     */
    protected ?string $expDate = null;

    /**
     * Masked card number if credit card source
     *
     * @var string|null $maskedCard
     */
    protected ?string $maskedCard = null;

    /**
     * Card issuing country if credit card source, in ISO 3166-1 alpha-2
     *
     * @var string|null $cardCountry
     */
    protected ?string $cardCountry = null;

    /**
     * Status for strong customer authentication: threed_secure - 3D Secure authenticated,
     * threed_secure_not_enrolled - 3D Secure authentication not performed as card not enrolled,
     * secured_by_nets - Secure by Nets authenticated
     *
     * @see StrongAuthenticationStatusEnum
     * @var string|null $strongAuthenticationStatus
     */
    protected ?string $strongAuthenticationStatus = null;

    /**
     * If 3D Secure authenticated the 3D status will either be Y (fully authenticated) or
     * A (attempted authenticated). An attempted authentication means that card issuer
     * (e.g. bank) does not support 3D Secure so no full authentication has been performed.
     * Attempted authentication normally means liability shift, but this can differ between acquirers
     *
     * @see ThreeDSecureStatusEnum
     * @var string|null $threeDSecureStatus
     */
    protected ?string $threeDSecureStatus = null;

    /**
     * If this parameter is set the charge has either been flagged or declined by a Reepay Risk
     * Filter rule. For flag action rules the charge can be successful, but may require special
     * attention. For block action rules the decline error will be risk_filter_block
     *
     * @var string|null $riskRule
     */
    protected ?string $riskRule = null;

    /**
     * Card acquirer error code in case of card error
     *
     * @var string|null $acquirerCode
     */
    protected ?string $acquirerCode = null;

    /**
     * Acquirer message in case of error
     *
     * @var string|null $acquirerMessage
     */
    protected ?string $acquirerMessage = null;

    /**
     * Card acquirer reference to transaction in case of card source. E.g. Nets order id or Clearhaus reference
     *
     * @var string|null $acquirerReference
     */
    protected ?string $acquirerReference = null;

    /**
     * Resulting text on bank statement if known
     *
     * @var string|null $textOnStatement
     */
    protected ?string $textOnStatement = null;

    /**
     * Potential card surcharge fee added to amount if surcharging enabled
     *
     * @var int|null $surchargeFee
     */
    protected ?int $surchargeFee = null;

    /**
     * @return string|null
     */
    public function getOfflineAgreementHandle(): ?string
    {
        return $this->offlineAgreementHandle;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getAcquirerMessage(): ?string
    {
        return $this->acquirerMessage;
    }

    /**
     * @return string|null
     */
    public function getTransactionCardType(): ?string
    {
        return $this->transactionCardType;
    }

    /**
     * @return string|null
     */
    public function getThreeDSecureStatus(): ?string
    {
        return $this->threeDSecureStatus;
    }

    /**
     * @return string|null
     */
    public function getStrongAuthenticationStatus(): ?string
    {
        return $this->strongAuthenticationStatus;
    }

    /**
     * @return string|null
     */
    public function getRiskRule(): ?string
    {
        return $this->riskRule;
    }

    /**
     * @return string|null
     */
    public function getMaskedCard(): ?string
    {
        return $this->maskedCard;
    }

    /**
     * @return string|null
     */
    public function getFingerprint(): ?string
    {
        return $this->fingerprint;
    }

    /**
     * @return string|null
     */
    public function getExpDate(): ?string
    {
        return $this->expDate;
    }

    /**
     * @return string|null
     */
    public function getCardType(): ?string
    {
        return $this->cardType;
    }

    /**
     * @return string|null
     */
    public function getCardCountry(): ?string
    {
        return $this->cardCountry;
    }

    /**
     * @return string|null
     */
    public function getTextOnStatement(): ?string
    {
        return $this->textOnStatement;
    }

    /**
     * @return int|null
     */
    public function getSurchargeFee(): ?int
    {
        return $this->surchargeFee;
    }

    /**
     * @return string|null
     */
    public function getProvider(): ?string
    {
        return $this->provider;
    }

    /**
     * @return bool|null
     */
    public function getFrictionless(): ?bool
    {
        return $this->frictionless;
    }

    /**
     * @return string|null
     */
    public function getAcquirerReference(): ?string
    {
        return $this->acquirerReference;
    }

    /**
     * @return string|null
     */
    public function getAcquirerCode(): ?string
    {
        return $this->acquirerCode;
    }

    /**
     * @return string|null
     */
    public function getCard(): ?string
    {
        return $this->card;
    }

    /**
     * @return string|null
     */
    public function getSepaMandate(): ?string
    {
        return $this->sepaMandate;
    }

    /**
     * @return string|null
     */
    public function getIban(): ?string
    {
        return $this->iban;
    }

    /**
     * @return string|null
     */
    public function getAuthTransaction(): ?string
    {
        return $this->authTransaction;
    }

    /**
     * @return string|null
     */
    public function getMps(): ?string
    {
        return $this->mps;
    }

    /**
     * @return string|null
     */
    public function getVippsRecurring(): ?string
    {
        return $this->vippsRecurring;
    }

    /**
     * @param string|null $acquirerMessage
     *
     * @return self
     */
    public function setAcquirerMessage(?string $acquirerMessage): self
    {
        $this->acquirerMessage = $acquirerMessage;

        return $this;
    }

    /**
     * @param string|null $fingerprint
     *
     * @return self
     */
    public function setFingerprint(?string $fingerprint): self
    {
        $this->fingerprint = $fingerprint;

        return $this;
    }

    /**
     * @param int|null $surchargeFee
     *
     * @return self
     */
    public function setSurchargeFee(?int $surchargeFee): self
    {
        $this->surchargeFee = $surchargeFee;

        return $this;
    }

    /**
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
     * @param string|null $transactionCardType
     *
     * @return self
     */
    public function setTransactionCardType(?string $transactionCardType): self
    {
        $this->transactionCardType = $transactionCardType;

        return $this;
    }

    /**
     * @param string|null $threeDSecureStatus
     *
     * @return self
     */
    public function setThreeDSecureStatus(?string $threeDSecureStatus): self
    {
        $this->threeDSecureStatus = $threeDSecureStatus;

        return $this;
    }

    /**
     * @param string|null $strongAuthenticationStatus
     *
     * @return self
     */
    public function setStrongAuthenticationStatus(?string $strongAuthenticationStatus): self
    {
        $this->strongAuthenticationStatus = $strongAuthenticationStatus;

        return $this;
    }

    /**
     * @param string|null $riskRule
     *
     * @return self
     */
    public function setRiskRule(?string $riskRule): self
    {
        $this->riskRule = $riskRule;

        return $this;
    }

    /**
     * @param string|null $maskedCard
     *
     * @return self
     */
    public function setMaskedCard(?string $maskedCard): self
    {
        $this->maskedCard = $maskedCard;

        return $this;
    }

    /**
     * @param string|null $expDate
     *
     * @return self
     */
    public function setExpDate(?string $expDate): self
    {
        $this->expDate = $expDate;

        return $this;
    }

    /**
     * @param string|null $cardType
     *
     * @return self
     */
    public function setCardType(?string $cardType): self
    {
        $this->cardType = $cardType;

        return $this;
    }

    /**
     * @param string|null $cardCountry
     *
     * @return self
     */
    public function setCardCountry(?string $cardCountry): self
    {
        $this->cardCountry = $cardCountry;

        return $this;
    }

    /**
     * @param string|null $textOnStatement
     *
     * @return self
     */
    public function setTextOnStatement(?string $textOnStatement): self
    {
        $this->textOnStatement = $textOnStatement;

        return $this;
    }

    /**
     * @param string|null $provider
     *
     * @return self
     */
    public function setProvider(?string $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * @param bool|null $frictionless
     *
     * @return self
     */
    public function setFrictionless(?bool $frictionless): self
    {
        $this->frictionless = $frictionless;

        return $this;
    }

    /**
     * @param string|null $acquirerReference
     *
     * @return self
     */
    public function setAcquirerReference(?string $acquirerReference): self
    {
        $this->acquirerReference = $acquirerReference;

        return $this;
    }

    /**
     * @param string|null $acquirerCode
     *
     * @return self
     */
    public function setAcquirerCode(?string $acquirerCode): self
    {
        $this->acquirerCode = $acquirerCode;

        return $this;
    }

    /**
     * @param string|null $card
     *
     * @return self
     */
    public function setCard(?string $card): self
    {
        $this->card = $card;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string|null $sepaMandate
     *
     * @return self
     */
    public function setSepaMandate(?string $sepaMandate): self
    {
        $this->sepaMandate = $sepaMandate;

        return $this;
    }

    /**
     * @param string|null $iban
     *
     * @return self
     */
    public function setIban(?string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * @param string|null $authTransaction
     *
     * @return self
     */
    public function setAuthTransaction(?string $authTransaction): self
    {
        $this->authTransaction = $authTransaction;

        return $this;
    }

    /**
     * @param string|null $mps
     *
     * @return self
     */
    public function setMps(?string $mps): self
    {
        $this->mps = $mps;

        return $this;
    }

    /**
     * @param string|null $vippsRecurring
     *
     * @return self
     */
    public function setVippsRecurring(?string $vippsRecurring): self
    {
        $this->vippsRecurring = $vippsRecurring;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        if (in_array($response['type'], SourceTypeEnum::getAll(), true)) {
            $model->setType($response['type']);
        }

        if (isset($response['card'])) {
            $model->setCard($response['card']);
        }

        if (isset($response['mps'])) {
            $model->setMps($response['mps']);
        }

        if (isset($response['iban'])) {
            $model->setIban($response['iban']);
        }

        if (isset($response['fingerprint'])) {
            $model->setFingerprint($response['fingerprint']);
        }

        if (isset($response['provider']) && in_array($response['provider'], ProviderEnum::getAll(), true)) {
            $model->setProvider($response['provider']);
        }

        if (isset($response['frictionless'])) {
            $model->setFrictionless($response['frictionless']);
        }

        if (isset($response['vipps_recurring'])) {
            $model->setVippsRecurring($response['vipps_recurring']);
        }

        if (isset($response['sepa_mandate'])) {
            $model->setSepaMandate($response['sepa_mandate']);
        }

        if (isset($response['offline_agreement_handle'])) {
            $model->setOfflineAgreementHandle($response['offline_agreement_handle']);
        }

        if (isset($response['auth_transaction'])) {
            $model->setAuthTransaction($response['auth_transaction']);
        }

        if (isset($response['card_type'])
            && in_array($response['card_type'], CardTypeEnum::getAll(), true)) {
            $model->setCardType($response['card_type']);
        }

        if (isset($response['transaction_card_type'])
            && in_array($response['transaction_card_type'], CardTypeEnum::getAll(), true)) {
            $model->setTransactionCardType($response['transaction_card_type']);
        }

        if (isset($response['exp_date'])) {
            $model->setExpDate($response['exp_date']);
        }

        if (isset($response['masked_card'])) {
            $model->setMaskedCard($response['masked_card']);
        }

        if (isset($response['card_country'])) {
            $model->setCardCountry($response['card_country']);
        }

        if (isset($response['strong_authentication_status'])
            && in_array($response['strong_authentication_status'], StrongAuthenticationStatusEnum::getAll(), true)) {
            $model->setStrongAuthenticationStatus($response['strong_authentication_status']);
        }

        if (isset($response['three_d_secure_status'])
            && in_array($response['three_d_secure_status'], ThreeDSecureStatusEnum::getAll(), true)) {
            $model->setThreeDSecureStatus($response['three_d_secure_status']);
        }

        if (isset($response['risk_rule'])) {
            $model->setRiskRule($response['risk_rule']);
        }

        if (isset($response['acquirer_code'])) {
            $model->setAcquirerCode($response['acquirer_code']);
        }

        if (isset($response['acquirer_message'])) {
            $model->setAcquirerMessage($response['acquirer_message']);
        }

        if (isset($response['acquirer_reference'])) {
            $model->setAcquirerReference($response['acquirer_reference']);
        }

        if (isset($response['text_on_statement'])) {
            $model->setTextOnStatement($response['text_on_statement']);
        }

        if (isset($response['surcharge_fee'])) {
            $model->setSurchargeFee($response['surcharge_fee']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'type' => $this->getType(),
            'card' => $this->getCard(),
            'mps' => $this->getMps(),
            'iban' => $this->getIban(),
            'fingerprint' => $this->getFingerprint(),
            'provider' => $this->getProvider(),
            'frictionless' => $this->getFrictionless(),
            'vipps_recurring' => $this->getVippsRecurring(),
            'sepa_mandate' => $this->getSepaMandate(),
            'offline_agreement_handle' => $this->getOfflineAgreementHandle(),
            'auth_transaction' => $this->getAuthTransaction(),
            'card_type' => $this->getCardType(),
            'transaction_card_type' => $this->getTransactionCardType(),
            'exp_date' => $this->getExpDate(),
            'masked_card' => $this->getMaskedCard(),
            'card_country' => $this->getCardCountry(),
            'strong_authentication_status' => $this->getStrongAuthenticationStatus(),
            'three_d_secure_status' => $this->getThreeDSecureStatus(),
            'risk_rule' => $this->getRiskRule(),
            'acquirer_code' => $this->getAcquirerCode(),
            'acquirer_message' => $this->getAcquirerMessage(),
            'acquirer_reference' => $this->getAcquirerReference(),
            'text_on_statement' => $this->getTextOnStatement(),
            'surcharge_fee' => $this->getSurchargeFee(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
