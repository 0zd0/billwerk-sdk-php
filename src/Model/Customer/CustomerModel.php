<?php

namespace Billwerk\Sdk\Model\Customer;

use Billwerk\Sdk\Model\AbstractModel;
use DateTime;
use Exception;

class CustomerModel extends AbstractModel
{
    /**
     * Customer email. Validated against RFC 822
     *
     * @var string|null $email
     */
    protected ?string $email = null;

    /**
     * Customer address
     *
     * @var string|null $address
     */
    protected ?string $address = null;

    /**
     * Customer address2
     *
     * @var string|null $address2
     */
    protected ?string $address2 = null;

    /**
     * Customer city
     *
     * @var string|null $city
     */
    protected ?string $city = null;

    /**
     * Customer country in ISO 3166-1 alpha-2. E.g. US
     *
     * @var string|null $country
     */
    protected ?string $country = null;

    /**
     * Customer phone number
     *
     * @var string|null $phone
     */
    protected ?string $phone = null;

    /**
     * Customer company
     *
     * @var string|null $company
     */
    protected ?string $company = null;

    /**
     * Customer vat number
     *
     * @var string|null $vat
     */
    protected ?string $vat = null;

    /**
     * Customer language
     *
     * @var string|null $language
     */
    protected ?string $language = null;

    /**
     * Per account unique handle for the customer. Max length 255 with allowable characters [a-zA-Z0-9_.-@].
     *
     * @var string $handle
     */
    protected string $handle;

    /**
     * Test flag
     *
     * @var bool|null $test
     */
    protected ?bool $test = null;

    /**
     * Number of active subscriptions for this customer (deprecated, will be removed in a later version,
     * use active_subscriptions)
     *
     * @var int $subscriptions
     */
    protected int $subscriptions;

    /**
     * Date when the customer was created. In ISO-8601 extended offset date-time format
     *
     * @var DateTime $created
     */
    protected DateTime $created;

    /**
     * Date when the customer was deleted. In ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $deleted
     */
    protected ?DateTime $deleted = null;

    /**
     * Customer first name
     *
     * @var string|null $firstName
     */
    protected ?string $firstName = null;

    /**
     * Customer last name
     *
     * @var string|null $lastName
     */
    protected ?string $lastName = null;

    /**
     * Customer postal code
     *
     * @var string|null $postalCode
     */
    protected ?string $postalCode = null;

    /**
     * Debtor identifier for this customer. If set this is unique and cannot be changed anymore
     *
     * @var int|null $debtorId
     */
    protected ?int $debtorId = null;

    /**
     * Number of active subscriptions for this customer
     *
     * @var int $activeSubscriptions
     */
    protected int $activeSubscriptions;

    /**
     * Number of active subscriptions in trial for this customer. Also counts subscription to enter
     * trial at a future start date
     *
     * @var int $trialActiveSubscriptions
     */
    protected int $trialActiveSubscriptions;

    /**
     * Number of cancelled subscriptions in trial for this customer
     *
     * @var int $trialCancelledSubscriptions
     */
    protected int $trialCancelledSubscriptions;

    /**
     * Number of expired subscription for this customer
     *
     * @var int $expiredSubscriptions
     */
    protected int $expiredSubscriptions;

    /**
     * Number of subscription on hold for this customer
     *
     * @var int $onHoldSubscriptions
     */
    protected int $onHoldSubscriptions;

    /**
     * Number of cancelled subscription for this customer
     *
     * @var int $cancelledSubscriptions
     */
    protected int $cancelledSubscriptions;

    /**
     * Number of non renewing (active subscriptions not renewing at billing period end) subscriptions for this customer
     *
     * @var int $nonRenewingSubscriptions
     */
    protected int $nonRenewingSubscriptions;

    /**
     * Number of failed subscription invoices for this customer
     *
     * @var int $failedInvoices
     */
    protected int $failedInvoices;

    /**
     * Summed amount for failed subscription invoices
     *
     * @var int $failedAmount
     */
    protected int $failedAmount;

    /**
     * Number of cancelled subscription invoices for this customer
     *
     * @var int $cancelledInvoices
     */
    protected int $cancelledInvoices;

    /**
     * Summed amount for cancelled subscription invoices
     *
     * @var int $cancelledAmount
     */
    protected int $cancelledAmount;

    /**
     * Number of pending subscription invoices for this customer
     *
     * @var int $pendingInvoices
     */
    protected int $pendingInvoices;

    /**
     * Summed amount for pending subscription invoices
     *
     * @var int $pendingAmount
     */
    protected int $pendingAmount;

    /**
     * Number of dunning subscription invoices for this customer
     *
     * @var int $dunningInvoices
     */
    protected int $dunningInvoices;

    /**
     * Summed amount for dunning subscription invoices
     *
     * @var int $dunningAmount
     */
    protected int $dunningAmount;

    /**
     * Number of settled subscription invoices for this customer
     *
     * @var int $settledInvoices
     */
    protected int $settledInvoices;

    /**
     * Summed settled subscription amount
     *
     * @var int $settledAmount
     */
    protected int $settledAmount;

    /**
     * Summed refunded subscription amount
     *
     * @var int $refundedAmount
     */
    protected int $refundedAmount;

    /**
     * Number of pending additional costs
     *
     * @var int $pendingAdditionalCosts
     */
    protected int $pendingAdditionalCosts;

    /**
     * Summed amount of pending additional costs incl vat
     *
     * @var int $pendingAdditionalCostAmount
     */
    protected int $pendingAdditionalCostAmount;

    /**
     * Number of additional costs that have been applied to invoices
     *
     * @var int $transferredAdditionalCosts
     */
    protected int $transferredAdditionalCosts;

    /**
     * Summed amount of additional costs that have been applied to invoices
     *
     * @var int $transferredAdditionalCostAmount
     */
    protected int $transferredAdditionalCostAmount;

    /**
     * Number of credits that have not fully been applied to invoices
     *
     * @var int $pendingCredits
     */
    protected int $pendingCredits;

    /**
     * Summed credit amount not yet applied to invoices
     *
     * @var int $pendingCreditAmount
     */
    protected int $pendingCreditAmount;

    /**
     * Number of credits that have fully been applied to invoices
     *
     * @var int $transferredCredits
     */
    protected int $transferredCredits;

    /**
     * Summed credit amount that have been applied to invoices
     *
     * @var int $transferredCreditAmount
     */
    protected int $transferredCreditAmount;

    /**
     * Per account unique handle for the customer. Max length 255 with allowable characters [a-zA-Z0-9_.-@].
     *
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * Customer vat number
     *
     * @return string|null
     */
    public function getVat(): ?string
    {
        return $this->vat;
    }

    /**
     * Date when the customer was created. In ISO-8601 extended offset date-time format
     *
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * Debtor identifier for this customer. If set this is unique and cannot be changed anymore
     *
     * @return int|null
     */
    public function getDebtorId(): ?int
    {
        return $this->debtorId;
    }

    /**
     * Customer last name
     *
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Customer first name
     *
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Customer company
     *
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * Customer city
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Customer address
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Customer address2
     *
     * @return string|null
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    /**
     * Customer country in ISO 3166-1 alpha-2. E.g. US
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Customer email. Validated against RFC 822
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Customer phone number
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * Customer postal code
     *
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * Summed settled subscription amount
     *
     * @return int
     */
    public function getSettledAmount(): int
    {
        return $this->settledAmount;
    }

    /**
     * Summed refunded subscription amount
     *
     * @return int
     */
    public function getRefundedAmount(): int
    {
        return $this->refundedAmount;
    }

    /**
     * Number of active subscriptions for this customer
     *
     * @return int
     */
    public function getActiveSubscriptions(): int
    {
        return $this->activeSubscriptions;
    }

    /**
     * Summed amount for cancelled subscription invoices
     *
     * @return int
     */
    public function getCancelledAmount(): int
    {
        return $this->cancelledAmount;
    }

    /**
     * Number of cancelled subscription invoices for this customer
     *
     * @return int
     */
    public function getCancelledInvoices(): int
    {
        return $this->cancelledInvoices;
    }

    /**
     * Number of cancelled subscription for this customer
     *
     * @return int
     */
    public function getCancelledSubscriptions(): int
    {
        return $this->cancelledSubscriptions;
    }

    /**
     * Date when the customer was deleted. In ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getDeleted(): ?DateTime
    {
        return $this->deleted;
    }

    /**
     * Summed amount for dunning subscription invoices
     *
     * @return int
     */
    public function getDunningAmount(): int
    {
        return $this->dunningAmount;
    }

    /**
     * Number of dunning subscription invoices for this customer
     *
     * @return int
     */
    public function getDunningInvoices(): int
    {
        return $this->dunningInvoices;
    }

    /**
     * Number of expired subscription for this customer
     *
     * @return int
     */
    public function getExpiredSubscriptions(): int
    {
        return $this->expiredSubscriptions;
    }

    /**
     * Summed amount for failed subscription invoices
     *
     * @return int
     */
    public function getFailedAmount(): int
    {
        return $this->failedAmount;
    }

    /**
     * Number of failed subscription invoices for this customer
     *
     * @return int
     */
    public function getFailedInvoices(): int
    {
        return $this->failedInvoices;
    }

    /**
     * Customer language
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * Number of non renewing (active subscriptions not renewing at billing period end) subscriptions for this customer
     *
     * @return int
     */
    public function getNonRenewingSubscriptions(): int
    {
        return $this->nonRenewingSubscriptions;
    }

    /**
     * Number of subscription on hold for this customer
     *
     * @return int
     */
    public function getOnHoldSubscriptions(): int
    {
        return $this->onHoldSubscriptions;
    }

    /**
     * Summed amount of pending additional costs incl vat
     *
     * @return int
     */
    public function getPendingAdditionalCostAmount(): int
    {
        return $this->pendingAdditionalCostAmount;
    }

    /**
     * Number of pending additional costs
     *
     * @return int
     */
    public function getPendingAdditionalCosts(): int
    {
        return $this->pendingAdditionalCosts;
    }

    /**
     * Summed amount for pending subscription invoices
     *
     * @return int
     */
    public function getPendingAmount(): int
    {
        return $this->pendingAmount;
    }

    /**
     * Summed credit amount not yet applied to invoices
     *
     * @return int
     */
    public function getPendingCreditAmount(): int
    {
        return $this->pendingCreditAmount;
    }

    /**
     * Number of credits that have not fully been applied to invoices
     *
     * @return int
     */
    public function getPendingCredits(): int
    {
        return $this->pendingCredits;
    }

    /**
     * Number of pending subscription invoices for this customer
     *
     * @return int
     */
    public function getPendingInvoices(): int
    {
        return $this->pendingInvoices;
    }

    /**
     * Number of settled subscription invoices for this customer
     *
     * @return int
     */
    public function getSettledInvoices(): int
    {
        return $this->settledInvoices;
    }

    /**
     * Number of active subscriptions for this customer (deprecated, will be removed in a later version,
     *  use active_subscriptions)
     *
     * @return int
     */
    public function getSubscriptions(): int
    {
        return $this->subscriptions;
    }

    /**
     * Test flag
     *
     * @return bool|null
     */
    public function getTest(): ?bool
    {
        return $this->test;
    }

    /**
     * Summed amount of additional costs that have been applied to invoices
     *
     * @return int
     */
    public function getTransferredAdditionalCostAmount(): int
    {
        return $this->transferredAdditionalCostAmount;
    }

    /**
     * Number of additional costs that have been applied to invoices
     *
     * @return int
     */
    public function getTransferredAdditionalCosts(): int
    {
        return $this->transferredAdditionalCosts;
    }

    /**
     * Summed credit amount that have been applied to invoices
     *
     * @return int
     */
    public function getTransferredCreditAmount(): int
    {
        return $this->transferredCreditAmount;
    }

    /**
     * Number of credits that have fully been applied to invoices
     *
     * @return int
     */
    public function getTransferredCredits(): int
    {
        return $this->transferredCredits;
    }

    /**
     * Number of active subscriptions in trial for this customer. Also counts subscription to enter
     *  trial at a future start date
     *
     * @return int
     */
    public function getTrialActiveSubscriptions(): int
    {
        return $this->trialActiveSubscriptions;
    }

    /**
     * Number of cancelled subscriptions in trial for this customer
     *
     * @return int
     */
    public function getTrialCancelledSubscriptions(): int
    {
        return $this->trialCancelledSubscriptions;
    }

    /**
     * Customer vat number
     *
     * @param string|null $vat
     *
     * @return self
     */
    public function setVat(?string $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * Date when the customer was created. In ISO-8601 extended offset date-time format
     *
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
     * Debtor identifier for this customer. If set this is unique and cannot be changed anymore
     *
     * @param int|null $debtorId
     *
     * @return self
     */
    public function setDebtorId(?int $debtorId): self
    {
        $this->debtorId = $debtorId;

        return $this;
    }

    /**
     * Customer last name
     *
     * @param string|null $lastName
     *
     * @return self
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Customer first name
     *
     * @param string|null $firstName
     *
     * @return self
     */
    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Customer company
     *
     * @param string|null $company
     *
     * @return self
     */
    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Customer address
     *
     * @param string|null $address
     *
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Customer address2
     *
     * @param string|null $address2
     *
     * @return self
     */
    public function setAddress2(?string $address2): self
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Customer city
     *
     * @param string|null $city
     *
     * @return self
     */
    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Customer country in ISO 3166-1 alpha-2. E.g. US
     *
     * @param string|null $country
     *
     * @return self
     */
    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Customer email. Validated against RFC 822
     *
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Customer phone number
     *
     * @param string|null $phone
     *
     * @return self
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Customer postal code
     *
     * @param string|null $postalCode
     *
     * @return self
     */
    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Summed settled subscription amount
     *
     * @param int $settledAmount
     *
     * @return self
     */
    public function setSettledAmount(int $settledAmount): self
    {
        $this->settledAmount = $settledAmount;

        return $this;
    }

    /**
     * Summed refunded subscription amount
     *
     * @param int $refundedAmount
     *
     * @return self
     */
    public function setRefundedAmount(int $refundedAmount): self
    {
        $this->refundedAmount = $refundedAmount;

        return $this;
    }

    /**
     * Per account unique handle for the customer. Max length 255 with allowable characters [a-zA-Z0-9_.-@].
     *
     * @param string $handle
     *
     * @return self
     */
    public function setHandle(string $handle): self
    {
        $this->handle = $handle;

        return $this;
    }

    /**
     * Number of active subscriptions for this customer
     *
     * @param int $activeSubscriptions
     *
     * @return self
     */
    public function setActiveSubscriptions(int $activeSubscriptions): self
    {
        $this->activeSubscriptions = $activeSubscriptions;

        return $this;
    }

    /**
     * Summed amount for cancelled subscription invoices
     *
     * @param int $cancelledAmount
     *
     * @return self
     */
    public function setCancelledAmount(int $cancelledAmount): self
    {
        $this->cancelledAmount = $cancelledAmount;

        return $this;
    }

    /**
     * Number of cancelled subscription invoices for this customer
     *
     * @param int $cancelledInvoices
     *
     * @return self
     */
    public function setCancelledInvoices(int $cancelledInvoices): self
    {
        $this->cancelledInvoices = $cancelledInvoices;

        return $this;
    }

    /**
     * Number of cancelled subscription for this customer
     *
     * @param int $cancelledSubscriptions
     *
     * @return self
     */
    public function setCancelledSubscriptions(int $cancelledSubscriptions): self
    {
        $this->cancelledSubscriptions = $cancelledSubscriptions;

        return $this;
    }

    /**
     * Date when the customer was deleted. In ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $deleted
     *
     * @return self
     */
    public function setDeleted(?DateTime $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Summed amount for dunning subscription invoices
     *
     * @param int $dunningAmount
     *
     * @return self
     */
    public function setDunningAmount(int $dunningAmount): self
    {
        $this->dunningAmount = $dunningAmount;

        return $this;
    }

    /**
     * Number of dunning subscription invoices for this customer
     *
     * @param int $dunningInvoices
     *
     * @return self
     */
    public function setDunningInvoices(int $dunningInvoices): self
    {
        $this->dunningInvoices = $dunningInvoices;

        return $this;
    }

    /**
     * Number of expired subscription for this customer
     *
     * @param int $expiredSubscriptions
     *
     * @return self
     */
    public function setExpiredSubscriptions(int $expiredSubscriptions): self
    {
        $this->expiredSubscriptions = $expiredSubscriptions;

        return $this;
    }

    /**
     * Summed amount for failed subscription invoices
     *
     * @param int $failedAmount
     *
     * @return self
     */
    public function setFailedAmount(int $failedAmount): self
    {
        $this->failedAmount = $failedAmount;

        return $this;
    }

    /**
     * Number of failed subscription invoices for this customer
     *
     * @param int $failedInvoices
     *
     * @return self
     */
    public function setFailedInvoices(int $failedInvoices): self
    {
        $this->failedInvoices = $failedInvoices;

        return $this;
    }

    /**
     * Customer language
     *
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Number of non renewing (active subscriptions not renewing at billing period end) subscriptions for this customer
     *
     * @param int $nonRenewingSubscriptions
     *
     * @return self
     */
    public function setNonRenewingSubscriptions(int $nonRenewingSubscriptions): self
    {
        $this->nonRenewingSubscriptions = $nonRenewingSubscriptions;

        return $this;
    }

    /**
     * Number of subscription on hold for this customer
     *
     * @param int $onHoldSubscriptions
     *
     * @return self
     */
    public function setOnHoldSubscriptions(int $onHoldSubscriptions): self
    {
        $this->onHoldSubscriptions = $onHoldSubscriptions;

        return $this;
    }

    /**
     * Summed amount of pending additional costs incl vat
     *
     * @param int $pendingAdditionalCostAmount
     *
     * @return self
     */
    public function setPendingAdditionalCostAmount(int $pendingAdditionalCostAmount): self
    {
        $this->pendingAdditionalCostAmount = $pendingAdditionalCostAmount;

        return $this;
    }

    /**
     * Number of pending additional costs
     *
     * @param int $pendingAdditionalCosts
     *
     * @return self
     */
    public function setPendingAdditionalCosts(int $pendingAdditionalCosts): self
    {
        $this->pendingAdditionalCosts = $pendingAdditionalCosts;

        return $this;
    }

    /**
     * Summed amount for pending subscription invoices
     *
     * @param int $pendingAmount
     *
     * @return self
     */
    public function setPendingAmount(int $pendingAmount): self
    {
        $this->pendingAmount = $pendingAmount;

        return $this;
    }

    /**
     * Summed credit amount not yet applied to invoices
     *
     * @param int $pendingCreditAmount
     *
     * @return self
     */
    public function setPendingCreditAmount(int $pendingCreditAmount): self
    {
        $this->pendingCreditAmount = $pendingCreditAmount;

        return $this;
    }

    /**
     * Number of credits that have not fully been applied to invoices
     *
     * @param int $pendingCredits
     *
     * @return self
     */
    public function setPendingCredits(int $pendingCredits): self
    {
        $this->pendingCredits = $pendingCredits;

        return $this;
    }

    /**
     * Number of pending subscription invoices for this customer
     *
     * @param int $pendingInvoices
     *
     * @return self
     */
    public function setPendingInvoices(int $pendingInvoices): self
    {
        $this->pendingInvoices = $pendingInvoices;

        return $this;
    }

    /**
     * Number of settled subscription invoices for this customer
     *
     * @param int $settledInvoices
     *
     * @return self
     */
    public function setSettledInvoices(int $settledInvoices): self
    {
        $this->settledInvoices = $settledInvoices;

        return $this;
    }

    /**
     * Number of active subscriptions for this customer (deprecated, will be removed in a later version,
     *  use active_subscriptions)
     *
     * @param int $subscriptions
     *
     * @return self
     */
    public function setSubscriptions(int $subscriptions): self
    {
        $this->subscriptions = $subscriptions;

        return $this;
    }

    /**
     * Test flag
     *
     * @param bool|null $test
     *
     * @return self
     */
    public function setTest(?bool $test): self
    {
        $this->test = $test;

        return $this;
    }

    /**
     * Summed amount of additional costs that have been applied to invoices
     *
     * @param int $transferredAdditionalCostAmount
     *
     * @return self
     */
    public function setTransferredAdditionalCostAmount(int $transferredAdditionalCostAmount): self
    {
        $this->transferredAdditionalCostAmount = $transferredAdditionalCostAmount;

        return $this;
    }

    /**
     * Number of additional costs that have been applied to invoices
     *
     * @param int $transferredAdditionalCosts
     *
     * @return self
     */
    public function setTransferredAdditionalCosts(int $transferredAdditionalCosts): self
    {
        $this->transferredAdditionalCosts = $transferredAdditionalCosts;

        return $this;
    }

    /**
     * Summed credit amount that have been applied to invoices
     *
     * @param int $transferredCreditAmount
     *
     * @return self
     */
    public function setTransferredCreditAmount(int $transferredCreditAmount): self
    {
        $this->transferredCreditAmount = $transferredCreditAmount;

        return $this;
    }

    /**
     * Number of credits that have fully been applied to invoices
     *
     * @param int $transferredCredits
     *
     * @return self
     */
    public function setTransferredCredits(int $transferredCredits): self
    {
        $this->transferredCredits = $transferredCredits;

        return $this;
    }

    /**
     * Number of active subscriptions in trial for this customer. Also counts subscription to enter
     *  trial at a future start date
     *
     * @param int $trialActiveSubscriptions
     *
     * @return self
     */
    public function setTrialActiveSubscriptions(int $trialActiveSubscriptions): self
    {
        $this->trialActiveSubscriptions = $trialActiveSubscriptions;

        return $this;
    }

    /**
     * Number of cancelled subscriptions in trial for this customer
     *
     * @param int $trialCancelledSubscriptions
     *
     * @return self
     */
    public function setTrialCancelledSubscriptions(int $trialCancelledSubscriptions): self
    {
        $this->trialCancelledSubscriptions = $trialCancelledSubscriptions;

        return $this;
    }

    /**
     * @param array $response
     *
     * @return self
     * @throws Exception
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        if (isset($response['email'])) {
            $model->setEmail($response['email']);
        }

        if (isset($response['address'])) {
            $model->setAddress($response['address']);
        }

        if (isset($response['address2'])) {
            $model->setAddress2($response['address2']);
        }

        if (isset($response['city'])) {
            $model->setCity($response['city']);
        }

        if (isset($response['country'])) {
            $model->setCountry($response['country']);
        }

        if (isset($response['phone'])) {
            $model->setPhone($response['phone']);
        }

        if (isset($response['company'])) {
            $model->setCompany($response['company']);
        }

        if (isset($response['vat'])) {
            $model->setVat($response['vat']);
        }

        if (isset($response['language'])) {
            $model->setLanguage($response['language']);
        }

        $model->setHandle($response['handle']);

        if (isset($response['test'])) {
            $model->setTest($response['test']);
        }

        $model->setSubscriptions($response['subscriptions']);
        $model->setCreated(new DateTime($response['created']));

        if (isset($response['deleted'])) {
            $model->setDeleted(new DateTime($response['deleted']));
        }

        if (isset($response['first_name'])) {
            $model->setFirstName($response['first_name']);
        }

        if (isset($response['last_name'])) {
            $model->setLastName($response['last_name']);
        }

        if (isset($response['postal_code'])) {
            $model->setPostalCode($response['postal_code']);
        }

        if (isset($response['debtor_id'])) {
            $model->setDebtorId($response['debtor_id']);
        }

        $model->setActiveSubscriptions($response['active_subscriptions']);
        $model->setTrialActiveSubscriptions($response['trial_active_subscriptions']);
        $model->setTrialCancelledSubscriptions($response['trial_cancelled_subscriptions']);
        $model->setExpiredSubscriptions($response['expired_subscriptions']);
        $model->setOnHoldSubscriptions($response['on_hold_subscriptions']);
        $model->setCancelledSubscriptions($response['cancelled_subscriptions']);
        $model->setNonRenewingSubscriptions($response['non_renewing_subscriptions']);
        $model->setFailedInvoices($response['failed_invoices']);
        $model->setFailedAmount($response['failed_amount']);
        $model->setCancelledInvoices($response['cancelled_invoices']);
        $model->setCancelledAmount($response['cancelled_amount']);
        $model->setPendingInvoices($response['pending_invoices']);
        $model->setPendingAmount($response['pending_amount']);
        $model->setDunningInvoices($response['dunning_invoices']);
        $model->setDunningAmount($response['dunning_amount']);
        $model->setSettledInvoices($response['settled_invoices']);
        $model->setSettledAmount($response['settled_amount']);
        $model->setRefundedAmount($response['refunded_amount']);
        $model->setPendingAdditionalCosts($response['pending_additional_costs']);
        $model->setPendingAdditionalCostAmount($response['pending_additional_cost_amount']);
        $model->setTransferredAdditionalCosts($response['transferred_additional_costs']);
        $model->setTransferredAdditionalCostAmount($response['transferred_additional_cost_amount']);
        $model->setPendingCredits($response['pending_credits']);
        $model->setPendingCreditAmount($response['pending_credit_amount']);
        $model->setTransferredCredits($response['transferred_credits']);
        $model->setTransferredCreditAmount($response['transferred_credit_amount']);

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'email' => $this->getEmail(),
            'address' => $this->getAddress(),
            'address2' => $this->getAddress2(),
            'city' => $this->getCity(),
            'country' => $this->getCountry(),
            'phone' => $this->getPhone(),
            'company' => $this->getCompany(),
            'vat' => $this->getVat(),
            'language' => $this->getLanguage(),
            'handle' => $this->getHandle(),
            'test' => $this->getTest(),
            'subscriptions' => $this->getSubscriptions(),
            'created' => $this->getCreated() ? $this->getCreated()->format('Y-m-d\TH:i:s.v') : null,
            'deleted' => $this->getDeleted() ? $this->getDeleted()->format('Y-m-d\TH:i:s.v') : null,
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'postal_code' => $this->getPostalCode(),
            'debtor_id' => $this->getDebtorId(),
            'active_subscriptions' => $this->getActiveSubscriptions(),
            'trial_active_subscriptions' => $this->getTrialActiveSubscriptions(),
            'trial_cancelled_subscriptions' => $this->getTrialCancelledSubscriptions(),
            'expired_subscriptions' => $this->getExpiredSubscriptions(),
            'on_hold_subscriptions' => $this->getOnHoldSubscriptions(),
            'cancelled_subscriptions' => $this->getCancelledSubscriptions(),
            'non_renewing_subscriptions' => $this->getNonRenewingSubscriptions(),
            'failed_invoices' => $this->getFailedInvoices(),
            'failed_amount' => $this->getFailedAmount(),
            'cancelled_invoices' => $this->getCancelledInvoices(),
            'cancelled_amount' => $this->getCancelledAmount(),
            'pending_invoices' => $this->getPendingInvoices(),
            'pending_amount' => $this->getPendingAmount(),
            'dunning_invoices' => $this->getDunningInvoices(),
            'dunning_amount' => $this->getDunningAmount(),
            'settled_invoices' => $this->getSettledInvoices(),
            'settled_amount' => $this->getSettledAmount(),
            'refunded_amount' => $this->getRefundedAmount(),
            'pending_additional_costs' => $this->getPendingAdditionalCosts(),
            'pending_additional_cost_amount' => $this->getPendingAdditionalCostAmount(),
            'transferred_additional_costs' => $this->getTransferredAdditionalCosts(),
            'transferred_additional_cost_amount' => $this->getTransferredAdditionalCostAmount(),
            'pending_credits' => $this->getPendingCredits(),
            'pending_credit_amount' => $this->getPendingCreditAmount(),
            'transferred_credits' => $this->getTransferredCredits(),
            'transferred_credit_amount' => $this->getTransferredCreditAmount(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
