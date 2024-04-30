<?php

namespace Billwerk\Sdk\Model;

use Billwerk\Sdk\Enum\CardTypeEnum;
use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\StrongAuthenticationStatusEnum;
use Billwerk\Sdk\Enum\ThreeDSecureStatusEnum;
use DateTime;

abstract class AbstractCard extends AbstractModel
{
    protected string    $gateway;
    protected ?string   $fingerprint = null;
    protected ?DateTime $reactivated = null;
    protected string    $gwRef;
    protected string    $cardType;
    protected ?string    $transactionCardType = null;
    protected string    $cardAgreement;
    protected ?string   $expDate = null;
    protected ?string   $maskedCard = null;
    protected ?DateTime $lastSuccess = null;
    protected ?DateTime $lastFailed = null;
    protected ?DateTime $firstFail = null;
    protected ?string   $errorCode = null;
    protected ?string   $errorState = null;
    protected ?int      $declinedCount = null;
    protected ?string   $strongAuthenticationStatus = null;
    protected ?string   $threeDSecureStatus = null;
    protected ?string   $riskRule = null;
    protected ?string   $cardCountry = null;
    
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
    public function setFingerprint(?string $fingerprint): void
    {
        $this->fingerprint = $fingerprint;
    }
    
    /**
     * @param string $cardAgreement
     */
    public function setCardAgreement(string $cardAgreement): void
    {
        $this->cardAgreement = $cardAgreement;
    }
    
    /**
     * @param string|null $cardCountry
     */
    public function setCardCountry(?string $cardCountry): void
    {
        $this->cardCountry = $cardCountry;
    }
    
    /**
     * @param string $cardType
     */
    public function setCardType(string $cardType): void
    {
        $this->cardType = $cardType;
    }
    
    /**
     * @param int|null $declinedCount
     */
    public function setDeclinedCount(?int $declinedCount): void
    {
        $this->declinedCount = $declinedCount;
    }
    
    /**
     * @param string|null $errorCode
     */
    public function setErrorCode(?string $errorCode): void
    {
        $this->errorCode = $errorCode;
    }
    
    /**
     * @param string|null $errorState
     */
    public function setErrorState(?string $errorState): void
    {
        $this->errorState = $errorState;
    }
    
    /**
     * @param string|null $expDate
     */
    public function setExpDate(?string $expDate): void
    {
        $this->expDate = $expDate;
    }
    
    /**
     * @param DateTime|null $firstFail
     */
    public function setFirstFail(?DateTime $firstFail): void
    {
        $this->firstFail = $firstFail;
    }
    
    /**
     * @param string $gateway
     */
    public function setGateway(string $gateway): void
    {
        $this->gateway = $gateway;
    }
    
    /**
     * @param string $gwRef
     */
    public function setGwRef(string $gwRef): void
    {
        $this->gwRef = $gwRef;
    }
    
    /**
     * @param DateTime|null $lastFailed
     */
    public function setLastFailed(?DateTime $lastFailed): void
    {
        $this->lastFailed = $lastFailed;
    }
    
    /**
     * @param DateTime|null $lastSuccess
     */
    public function setLastSuccess(?DateTime $lastSuccess): void
    {
        $this->lastSuccess = $lastSuccess;
    }
    
    /**
     * @param string|null $maskedCard
     */
    public function setMaskedCard(?string $maskedCard): void
    {
        $this->maskedCard = $maskedCard;
    }
    
    /**
     * @param DateTime|null $reactivated
     */
    public function setReactivated(?DateTime $reactivated): void
    {
        $this->reactivated = $reactivated;
    }
    
    /**
     * @param string|null $riskRule
     */
    public function setRiskRule(?string $riskRule): void
    {
        $this->riskRule = $riskRule;
    }
    
    /**
     * @param string|null $strongAuthenticationStatus
     */
    public function setStrongAuthenticationStatus(?string $strongAuthenticationStatus): void
    {
        $this->strongAuthenticationStatus = $strongAuthenticationStatus;
    }
    
    /**
     * @param string|null $threeDSecureStatus
     */
    public function setThreeDSecureStatus(?string $threeDSecureStatus): void
    {
        $this->threeDSecureStatus = $threeDSecureStatus;
    }
    
    /**
     * @param string $transactionCardType
     */
    public function setTransactionCardType(string $transactionCardType): void
    {
        $this->transactionCardType = $transactionCardType;
    }
}
