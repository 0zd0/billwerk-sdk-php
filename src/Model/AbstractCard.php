<?php

namespace Billwerk\Sdk\Model;

use DateTime;

/**
 * Card in payment method
 *
 * @see https://optimize-docs.billwerk.com/reference/getpaymentmethodv2
 *
 * @package Billwerk\Sdk\Model
 */
abstract class AbstractCard extends AbstractModel
{
    /**
     * Card gateway tied to card
     *
     * @var string $gateway
     */
    protected string $gateway;

    /**
     * Uniquely identifies this particular card number
     *
     * @var string|null $fingerprint
     */
    protected ?string $fingerprint = null;

    /**
     * Date and time of reactivation if the card has been reactivated from failed state. In ISO-8601 extended
     * offset date-time format
     *
     * @var DateTime|null $reactivated
     */
    protected ?DateTime $reactivated = null;

    /**
     * Card gateway reference id
     *
     * @var string $gwRef
     */
    protected string $gwRef;

    /**
     * Card type: unknown, visa, mc, dankort, visa_dk, ffk, visa_elec, maestro, laser, amex, diners, discover or jcb
     *
     * @var string $cardType
     */
    protected string $cardType;

    /**
     * Card type used in authentication and the card type used for subsequent MIT transactions. Will differ from
     * card_type if co-branded card. unknown, visa, mc, dankort, visa_dk, ffk, visa_elec, maestro, laser, amex,
     * diners, discover or jcb
     *
     * @var string|null $transactionCardType
     */
    protected ?string $transactionCardType = null;

    /**
     * Card agreement id
     *
     * @var string $cardAgreement
     */
    protected string $cardAgreement;

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
     * Date and time of last successful use of the card. In ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $lastSuccess
     */
    protected ?DateTime $lastSuccess = null;

    /**
     * Date and time of last failed use of the card. In ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $lastFailed
     */
    protected ?DateTime $lastFailed = null;

    /**
     * Date and time of first successful use of the card. In ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $firstFail
     */
    protected ?DateTime $firstFail = null;

    /**
     * An error code from the last failed use of the card. See transaction errors
     *
     * @var string|null $errorCode
     */
    protected ?string $errorCode = null;

    /**
     * Error state from last failed use of the card: pending, soft_declined, hard_declined or processing_error
     *
     * @var string|null $errorState
     */
    protected ?string $errorState = null;

    /**
     * Number of soft and hard declined attempts for the card since created or since last successful transaction
     *
     * @var int|null $declinedCount
     */
    protected ?int $declinedCount = null;

    /**
     * Status for strong customer authentication: threed_secure - 3D Secure authenticated,
     * threed_secure_not_enrolled - 3D Secure authentication not performed as card not enrolled,
     * secured_by_nets - Secure by Nets authenticated
     *
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
     * Card issuing country in ISO 3166-1 alpha-2
     *
     * @var string|null $cardCountry
     */
    protected ?string $cardCountry = null;

    /**
     * @return string
     */
    public function getCardAgreement(): string
    {
        return $this->cardAgreement;
    }

    /**
     * @return string|null
     */
    public function getCardCountry(): ?string
    {
        return $this->cardCountry;
    }

    /**
     * @return string
     */
    public function getCardType(): string
    {
        return $this->cardType;
    }

    /**
     * @return int|null
     */
    public function getDeclinedCount(): ?int
    {
        return $this->declinedCount;
    }

    /**
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    /**
     * @return string|null
     */
    public function getErrorState(): ?string
    {
        return $this->errorState;
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
    public function getFingerprint(): ?string
    {
        return $this->fingerprint;
    }

    /**
     * @return DateTime|null
     */
    public function getFirstFail(): ?DateTime
    {
        return $this->firstFail;
    }

    /**
     * @return string
     */
    public function getGateway(): string
    {
        return $this->gateway;
    }

    /**
     * @return string
     */
    public function getGwRef(): string
    {
        return $this->gwRef;
    }

    /**
     * @return DateTime|null
     */
    public function getLastFailed(): ?DateTime
    {
        return $this->lastFailed;
    }

    /**
     * @return DateTime|null
     */
    public function getLastSuccess(): ?DateTime
    {
        return $this->lastSuccess;
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
    public function getReactivated(): ?DateTime
    {
        return $this->reactivated;
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
    public function getStrongAuthenticationStatus(): ?string
    {
        return $this->strongAuthenticationStatus;
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
    public function getTransactionCardType(): ?string
    {
        return $this->transactionCardType;
    }

    /**
     * @param string|null $fingerprint
     *
     * @return AbstractCard
     */
    public function setFingerprint(?string $fingerprint): self
    {
        $this->fingerprint = $fingerprint;

        return $this;
    }

    /**
     * @param string $cardAgreement
     *
     * @return AbstractCard
     */
    public function setCardAgreement(string $cardAgreement): self
    {
        $this->cardAgreement = $cardAgreement;

        return $this;
    }

    /**
     * @param string|null $cardCountry
     *
     * @return AbstractCard
     */
    public function setCardCountry(?string $cardCountry): self
    {
        $this->cardCountry = $cardCountry;

        return $this;
    }

    /**
     * @param string $cardType
     *
     * @return AbstractCard
     */
    public function setCardType(string $cardType): self
    {
        $this->cardType = $cardType;

        return $this;
    }

    /**
     * @param int|null $declinedCount
     *
     * @return AbstractCard
     */
    public function setDeclinedCount(?int $declinedCount): self
    {
        $this->declinedCount = $declinedCount;

        return $this;
    }

    /**
     * @param string|null $errorCode
     *
     * @return AbstractCard
     */
    public function setErrorCode(?string $errorCode): self
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * @param string|null $errorState
     *
     * @return AbstractCard
     */
    public function setErrorState(?string $errorState): self
    {
        $this->errorState = $errorState;

        return $this;
    }

    /**
     * @param string|null $expDate
     *
     * @return AbstractCard
     */
    public function setExpDate(?string $expDate): self
    {
        $this->expDate = $expDate;

        return $this;
    }

    /**
     * @param DateTime|null $firstFail
     *
     * @return AbstractCard
     */
    public function setFirstFail(?DateTime $firstFail): self
    {
        $this->firstFail = $firstFail;

        return $this;
    }

    /**
     * @param string $gateway
     *
     * @return AbstractCard
     */
    public function setGateway(string $gateway): self
    {
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * @param string $gwRef
     *
     * @return AbstractCard
     */
    public function setGwRef(string $gwRef): self
    {
        $this->gwRef = $gwRef;

        return $this;
    }

    /**
     * @param DateTime|null $lastFailed
     *
     * @return AbstractCard
     */
    public function setLastFailed(?DateTime $lastFailed): self
    {
        $this->lastFailed = $lastFailed;

        return $this;
    }

    /**
     * @param DateTime|null $lastSuccess
     *
     * @return AbstractCard
     */
    public function setLastSuccess(?DateTime $lastSuccess): self
    {
        $this->lastSuccess = $lastSuccess;

        return $this;
    }

    /**
     * @param string|null $maskedCard
     *
     * @return AbstractCard
     */
    public function setMaskedCard(?string $maskedCard): self
    {
        $this->maskedCard = $maskedCard;

        return $this;
    }

    /**
     * @param DateTime|null $reactivated
     *
     * @return AbstractCard
     */
    public function setReactivated(?DateTime $reactivated): self
    {
        $this->reactivated = $reactivated;

        return $this;
    }

    /**
     * @param string|null $riskRule
     *
     * @return AbstractCard
     */
    public function setRiskRule(?string $riskRule): self
    {
        $this->riskRule = $riskRule;

        return $this;
    }

    /**
     * @param string|null $strongAuthenticationStatus
     *
     * @return AbstractCard
     */
    public function setStrongAuthenticationStatus(?string $strongAuthenticationStatus): self
    {
        $this->strongAuthenticationStatus = $strongAuthenticationStatus;

        return $this;
    }

    /**
     * @param string|null $threeDSecureStatus
     *
     * @return AbstractCard
     */
    public function setThreeDSecureStatus(?string $threeDSecureStatus): self
    {
        $this->threeDSecureStatus = $threeDSecureStatus;

        return $this;
    }

    /**
     * @param string $transactionCardType
     *
     * @return AbstractCard
     */
    public function setTransactionCardType(string $transactionCardType): self
    {
        $this->transactionCardType = $transactionCardType;

        return $this;
    }
}
