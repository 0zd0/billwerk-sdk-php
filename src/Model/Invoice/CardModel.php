<?php

namespace Billwerk\Sdk\Model\Invoice;

use Billwerk\Sdk\Enum\CardStateEnum;
use Billwerk\Sdk\Enum\CardTypeEnum;
use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\StrongAuthenticationStatusEnum;
use Billwerk\Sdk\Enum\ThreeDSecureStatusEnum;
use Billwerk\Sdk\Model\AbstractModel;
use DateTime;
use Exception;

/**
 * Card object in card transaction
 *
 * @see https://optimize-docs.billwerk.com/reference/getinvoice
 *
 * @package Billwerk\Sdk\Model\Invoice
 */
class CardModel extends AbstractModel
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
     * @see CardStateEnum
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
     * Optional reference provided when creating the payment method. For payment methods
     * created with Reepay Checkout the reference will correspond to the session id for
     * the Checkout session that created the payment method
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
     * Uniquely identifies this particular card number
     *
     * @var string|null $fingerprint
     */
    protected ?string $fingerprint = null;

    /**
     * Date and time of reactivation if the card has been reactivated from failed state.
     * In ISO-8601 extended offset date-time format
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
     * @see CardTypeEnum
     * @var string $cardType
     */
    protected string $cardType;

    /**
     * Card type used in authentication and the card type used for subsequent MIT transactions. Will differ from
     * card_type if co-branded card. unknown, visa, mc, dankort, visa_dk, ffk, visa_elec, maestro, laser, amex, diners,
     * discover or jcb
     *
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
     * @see ErrorStateEnum
     * @var string|null $errorState
     */
    protected ?string $errorState = null;

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
     * Card issuing country in ISO 3166-1 alpha-2
     *
     * @var string|null $cardCountry
     */
    protected ?string $cardCountry = null;

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
    public function getLastFailed(): ?DateTime
    {
        return $this->lastFailed;
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
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return DateTime|null
     */
    public function getFailed(): ?DateTime
    {
        return $this->failed;
    }

    /**
     * @param string|null $fingerprint
     */
    public function setFingerprint(?string $fingerprint): void
    {
        $this->fingerprint = $fingerprint;
    }

    /**
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @return DateTime|null
     */
    public function getReactivated(): ?DateTime
    {
        return $this->reactivated;
    }

    /**
     * @return DateTime|null
     */
    public function getLastSuccess(): ?DateTime
    {
        return $this->lastSuccess;
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
    public function getFirstFail(): ?DateTime
    {
        return $this->firstFail;
    }

    /**
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
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
     * @param string|null $errorState
     *
     * @return self
     */
    public function setErrorState(?string $errorState): self
    {
        $this->errorState = $errorState;

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
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param DateTime $created
     *
     * @return self
     */
    public function setCreated(DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @param string $state
     *
     * @return self
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @param DateTime|null $failed
     *
     * @return self
     */
    public function setFailed(?DateTime $failed): self
    {
        $this->failed = $failed;

        return $this;
    }

    /**
     * @param string $customer
     *
     * @return self
     */
    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
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
     * @param DateTime|null $reactivated
     *
     * @return self
     */
    public function setReactivated(?DateTime $reactivated): self
    {
        $this->reactivated = $reactivated;

        return $this;
    }

    /**
     * @param DateTime|null $lastSuccess
     *
     * @return self
     */
    public function setLastSuccess(?DateTime $lastSuccess): self
    {
        $this->lastSuccess = $lastSuccess;

        return $this;
    }

    /**
     * @param string $gwRef
     *
     * @return self
     */
    public function setGwRef(string $gwRef): self
    {
        $this->gwRef = $gwRef;

        return $this;
    }

    /**
     * @param DateTime|null $firstFail
     *
     * @return self
     */
    public function setFirstFail(?DateTime $firstFail): self
    {
        $this->firstFail = $firstFail;

        return $this;
    }

    /**
     * @param string|null $errorCode
     *
     * @return self
     */
    public function setErrorCode(?string $errorCode): self
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * @throws Exception
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        $model->setId($response['id']);

        if (in_array($response['state'], CardStateEnum::getAll())) {
            $model->setState($response['state']);
        }

        $model->setCustomer($response['customer']);

        if (isset($response['reference'])) {
            $model->setReference($response['reference']);
        }

        if (isset($response['failed'])) {
            $model->setFailed(new DateTime($response['failed']));
        }

        $model->setCreated(new DateTime($response['created']));

        if (isset($response['fingerprint'])) {
            $model->setFingerprint($response['fingerprint']);
        }

        if (isset($response['reactivated'])) {
            $model->setReactivated(new DateTime($response['reactivated']));
        }

        $model->setGwRef($response['gw_ref']);

        if (in_array($response['card_type'], CardTypeEnum::getAll())) {
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

        if (isset($response['last_success'])) {
            $model->setLastSuccess(new DateTime($response['last_success']));
        }

        if (isset($response['last_failed'])) {
            $model->setLastFailed(new DateTime($response['last_failed']));
        }

        if (isset($response['first_fail'])) {
            $model->setFirstFail(new DateTime($response['first_fail']));
        }

        if (isset($response['error_code'])) {
            $model->setErrorCode($response['error_code']);
        }

        if (isset($response['error_state']) && in_array($response['error_state'], ErrorStateEnum::getAll())) {
            $model->setErrorState($response['error_state']);
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

        if (isset($response['card_country'])) {
            $model->setCardCountry($response['card_country']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->getId(),
            'state' => $this->getState(),
            'customer' => $this->getCustomer(),
            'reference' => $this->getReference(),
            'failed' => $this->getFailed() ? $this->getFailed()->format('Y-m-d\TH:i:s.v') : null,
            'created' => $this->getCreated() ? $this->getCreated()->format('Y-m-d\TH:i:s.v') : null,
            'fingerprint' => $this->getFingerprint(),
            'reactivated' => $this->getReactivated() ? $this->getReactivated()->format('Y-m-d\TH:i:s.v') : null,
            'gw_ref' => $this->getGwRef(),
            'card_type' => $this->getCardType(),
            'transaction_card_type' => $this->getTransactionCardType(),
            'exp_date' => $this->getExpDate(),
            'masked_card' => $this->getMaskedCard(),
            'last_success' => $this->getLastSuccess() ? $this->getLastSuccess()->format('Y-m-d\TH:i:s.v') : null,
            'last_failed' => $this->getLastFailed() ? $this->getLastFailed()->format('Y-m-d\TH:i:s.v') : null,
            'first_fail' => $this->getFirstFail() ? $this->getFirstFail()->format('Y-m-d\TH:i:s.v') : null,
            'error_code' => $this->getErrorCode(),
            'error_state' => $this->getErrorState(),
            'strong_authentication_status' => $this->getStrongAuthenticationStatus(),
            'three_d_secure_status' => $this->getThreeDSecureStatus(),
            'risk_rule' => $this->getRiskRule(),
            'card_country' => $this->getCardCountry(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
