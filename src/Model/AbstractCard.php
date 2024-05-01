<?php

namespace Billwerk\Sdk\Model;

use DateTime;

abstract class AbstractCard extends AbstractModel
{
    protected string $gateway;
    protected ?string $fingerprint                = null;
    protected ?DateTime $reactivated                = null;
    protected string $gwRef;
    protected string $cardType;
    protected ?string $transactionCardType        = null;
    protected string $cardAgreement;
    protected ?string $expDate                    = null;
    protected ?string $maskedCard                 = null;
    protected ?DateTime $lastSuccess                = null;
    protected ?DateTime $lastFailed                 = null;
    protected ?DateTime $firstFail                  = null;
    protected ?string $errorCode                  = null;
    protected ?string $errorState                 = null;
    protected ?int $declinedCount              = null;
    protected ?string $strongAuthenticationStatus = null;
    protected ?string $threeDSecureStatus         = null;
    protected ?string $riskRule                   = null;
    protected ?string $cardCountry                = null;

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
     * @return string
     */
    public function getTransactionCardType(): string
    {
        return $this->transactionCardType;
    }

    /**
     * @param string|null $fingerprint
     */
    public function setFingerprint(?string $fingerprint): self
    {
        $this->fingerprint = $fingerprint;

        return $this;
    }

    /**
     * @param string $cardAgreement
     */
    public function setCardAgreement(string $cardAgreement): self
    {
        $this->cardAgreement = $cardAgreement;

        return $this;
    }

    /**
     * @param string|null $cardCountry
     */
    public function setCardCountry(?string $cardCountry): self
    {
        $this->cardCountry = $cardCountry;

        return $this;
    }

    /**
     * @param string $cardType
     */
    public function setCardType(string $cardType): self
    {
        $this->cardType = $cardType;

        return $this;
    }

    /**
     * @param int|null $declinedCount
     */
    public function setDeclinedCount(?int $declinedCount): self
    {
        $this->declinedCount = $declinedCount;

        return $this;
    }

    /**
     * @param string|null $errorCode
     */
    public function setErrorCode(?string $errorCode): self
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * @param string|null $errorState
     */
    public function setErrorState(?string $errorState): self
    {
        $this->errorState = $errorState;

        return $this;
    }

    /**
     * @param string|null $expDate
     */
    public function setExpDate(?string $expDate): self
    {
        $this->expDate = $expDate;

        return $this;
    }

    /**
     * @param DateTime|null $firstFail
     */
    public function setFirstFail(?DateTime $firstFail): self
    {
        $this->firstFail = $firstFail;

        return $this;
    }

    /**
     * @param string $gateway
     */
    public function setGateway(string $gateway): self
    {
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * @param string $gwRef
     */
    public function setGwRef(string $gwRef): self
    {
        $this->gwRef = $gwRef;

        return $this;
    }

    /**
     * @param DateTime|null $lastFailed
     */
    public function setLastFailed(?DateTime $lastFailed): self
    {
        $this->lastFailed = $lastFailed;

        return $this;
    }

    /**
     * @param DateTime|null $lastSuccess
     */
    public function setLastSuccess(?DateTime $lastSuccess): self
    {
        $this->lastSuccess = $lastSuccess;

        return $this;
    }

    /**
     * @param string|null $maskedCard
     */
    public function setMaskedCard(?string $maskedCard): self
    {
        $this->maskedCard = $maskedCard;

        return $this;
    }

    /**
     * @param DateTime|null $reactivated
     */
    public function setReactivated(?DateTime $reactivated): self
    {
        $this->reactivated = $reactivated;

        return $this;
    }

    /**
     * @param string|null $riskRule
     */
    public function setRiskRule(?string $riskRule): self
    {
        $this->riskRule = $riskRule;

        return $this;
    }

    /**
     * @param string|null $strongAuthenticationStatus
     */
    public function setStrongAuthenticationStatus(?string $strongAuthenticationStatus): self
    {
        $this->strongAuthenticationStatus = $strongAuthenticationStatus;

        return $this;
    }

    /**
     * @param string|null $threeDSecureStatus
     */
    public function setThreeDSecureStatus(?string $threeDSecureStatus): self
    {
        $this->threeDSecureStatus = $threeDSecureStatus;

        return $this;
    }

    /**
     * @param string $transactionCardType
     */
    public function setTransactionCardType(string $transactionCardType): self
    {
        $this->transactionCardType = $transactionCardType;

        return $this;
    }
}
