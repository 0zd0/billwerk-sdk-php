<?php

namespace Billwerk\Sdk\Model\Transaction;

use Billwerk\Sdk\Enum\CardTypeEnum;
use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\ProviderEnum;
use Billwerk\Sdk\Enum\StrongAuthenticationStatusEnum;
use Billwerk\Sdk\Enum\ThreeDSecureStatusEnum;
use Billwerk\Sdk\Model\Invoice\CardModel;
use DateTime;
use Exception;

/**
 * Card transaction in invoice
 *
 * @see https://optimize-docs.billwerk.com/reference/getinvoice
 *
 * @package Billwerk\Sdk\Model\Invoice
 */
class CardTransactionModel extends AbstractTransactionModel
{
    /**
     * Saved card used for transaction. Only present if a saved card was used
     *
     * @var CardModel|null $card
     */
    protected ?CardModel $card = null;

    /**
     * Uniquely identifies this particular card number
     *
     * @var string|null $fingerprint
     */
    protected ?string $fingerprint = null;

    /**
     * Acquirer or payment gateway used: reepay, clearhaus, nets, swedbank, handelsbanken,
     * elavon, bambora, valitor, dibs, stripe, test
     *
     * @see ProviderEnum
     * @var string|null $provider
     */
    protected ?string $provider = null;

    /**
     * If the transaction was exempted from a 3DS challenge
     *
     * @var bool|null $frictionless
     */
    protected ?bool $frictionless = null;

    /**
     * Gateway id for card
     *
     * @var string|null $gwId
     */
    protected ?string $gwId = null;

    /**
     * When the card transaction last failed, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $lastFailed
     */
    protected ?DateTime $lastFailed = null;

    /**
     * When the card transaction first failed, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $firstFailed
     */
    protected ?DateTime $firstFailed = null;

    /**
     * Card type: unknown, visa, mc, dankort, visa_dk, ffk, visa_elec, maestro, laser, amex, diners, discover or jcb
     *
     * @see CardTypeEnum
     * @var string $cardType
     */
    protected string $cardType;

    /**
     * Transaction card type. Will differ from card_type if co-branded card. Transaction card type is the card type
     * used for the transaction. unknown, visa, mc, dankort, visa_dk, ffk, visa_elec, maestro, laser, amex, diners,
     * discover or jcb
     *
     * @see CardTypeEnum
     * @var string|null $transactionCardType
     */
    protected ?string $transactionCardType = null;

    /**
     * Card expire date on form MM-YY
     *
     * @var string|null $expDate
     */
    protected ?string $expDate = null;

    /**
     * Masked card number
     *
     * @var string|null $maskedCard
     */
    protected ?string $maskedCard = null;

    /**
     * Card issuing country in ISO 3166-1 alpha-2
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
     * If 3D Secure authenticated the 3D status will either be Y (fully authenticated) or A (attempted
     * authenticated). An attempted authentication means that card issuer (e.g. bank) does not support
     * 3D Secure so no full authentication has been performed. Attempted authentication normally means
     * liability shift, but this can differ between acquirers
     *
     * @var string|null $threeDSecureStatus
     */
    protected ?string $threeDSecureStatus = null;

    /**
     * If this parameter is set the card has been flagged by Reepay Risk Filter with a flag rule. Special
     * attention may be required before using the card for recurring payments or subscription sign-up
     *
     * @var string|null $riskRule
     */
    protected ?string $riskRule = null;

    /**
     * Acquirer error code in case of error
     *
     * @var string|null $acquirerCode
     */
    protected ?string $acquirerCode = null;

    /**
     * Acquirer reference to transaction. E.g. Nets order id or Clearhaus reference
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
     * @return CardModel|null
     */
    public function getCard(): ?CardModel
    {
        return $this->card;
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
     * @return DateTime|null
     */
    public function getLastFailed(): ?DateTime
    {
        return $this->lastFailed;
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
     * @return string
     */
    public function getCardType(): string
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
    public function getAcquirerCode(): ?string
    {
        return $this->acquirerCode;
    }

    /**
     * @return string|null
     */
    public function getAcquirerReference(): ?string
    {
        return $this->acquirerReference;
    }

    /**
     * @return DateTime|null
     */
    public function getFirstFailed(): ?DateTime
    {
        return $this->firstFailed;
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
    public function getGwId(): ?string
    {
        return $this->gwId;
    }

    /**
     * @return string|null
     */
    public function getProvider(): ?string
    {
        return $this->provider;
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
    public function getTextOnStatement(): ?string
    {
        return $this->textOnStatement;
    }

    /**
     * @param CardModel|null $card
     *
     * @return self
     */
    public function setCard(?CardModel $card): self
    {
        $this->card = $card;

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
     * @param DateTime|null $lastFailed
     *
     * @return self
     */
    public function setLastFailed(?DateTime $lastFailed): self
    {
        $this->lastFailed = $lastFailed;

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
     * @param string $cardType
     *
     * @return self
     */
    public function setCardType(string $cardType): self
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
     * @param DateTime|null $firstFailed
     *
     * @return self
     */
    public function setFirstFailed(?DateTime $firstFailed): self
    {
        $this->firstFailed = $firstFailed;

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
     * @param string|null $gwId
     *
     * @return self
     */
    public function setGwId(?string $gwId): self
    {
        $this->gwId = $gwId;

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
     * @param array $response
     *
     * @return static
     * @throws Exception
     */
    public static function fromArray(array $response): self
    {
        $model = new static();

        $model->fromArrayDefault($response);

        if (isset($response['card'])) {
            $model->setCard(CardModel::fromArray($response['card']));
        }

        if (isset($response['error'])) {
            $model->setError($response['error']);
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

        if (isset($response['ref_transaction'])) {
            $model->setRefTransaction($response['ref_transaction']);
        }

        if (isset($response['gw_id'])) {
            $model->setGwId($response['gw_id']);
        }

        if (isset($response['last_failed'])) {
            $model->setLastFailed(new DateTime($response['last_failed']));
        }

        if (isset($response['first_failed'])) {
            $model->setFirstFailed(new DateTime($response['first_failed']));
        }

        if (isset($response['error_state']) && in_array($response['error_state'], ErrorStateEnum::getAll(), true)) {
            $model->setErrorState($response['error_state']);
        }

        if (in_array($response['card_type'], CardTypeEnum::getAll(), true)) {
            $model->setCardType($response['card_type']);
        }

        if (in_array($response['transaction_card_type'], CardTypeEnum::getAll())) {
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
            && in_array($response['strong_authentication_status'], StrongAuthenticationStatusEnum::getAll())) {
            $model->setStrongAuthenticationStatus($response['strong_authentication_status']);
        }

        if (isset($response['three_d_secure_status'])
            && in_array($response['three_d_secure_status'], ThreeDSecureStatusEnum::getAll())) {
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
}
