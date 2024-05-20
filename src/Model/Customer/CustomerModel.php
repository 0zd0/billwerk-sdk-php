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
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * @return string|null
     */
    public function getVat(): ?string
    {
        return $this->vat;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @return int|null
     */
    public function getDebtorId(): ?int
    {
        return $this->debtorId;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @return string|null
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @return int
     */
    public function getSettledAmount(): int
    {
        return $this->settledAmount;
    }

    /**
     * @return int
     */
    public function getRefundedAmount(): int
    {
        return $this->refundedAmount;
    }

    /**
     * @return int
     */
    public function getActiveSubscriptions(): int
    {
        return $this->activeSubscriptions;
    }

    /**
     * @return int
     */
    public function getCancelledAmount(): int
    {
        return $this->cancelledAmount;
    }

    /**
     * @return int
     */
    public function getCancelledInvoices(): int
    {
        return $this->cancelledInvoices;
    }

    /**
     * @return int
     */
    public function getCancelledSubscriptions(): int
    {
        return $this->cancelledSubscriptions;
    }

    /**
     * @return DateTime|null
     */
    public function getDeleted(): ?DateTime
    {
        return $this->deleted;
    }

    /**
     * @return int
     */
    public function getDunningAmount(): int
    {
        return $this->dunningAmount;
    }

    /**
     * @return int
     */
    public function getDunningInvoices(): int
    {
        return $this->dunningInvoices;
    }

    /**
     * @return int
     */
    public function getExpiredSubscriptions(): int
    {
        return $this->expiredSubscriptions;
    }

    /**
     * @return int
     */
    public function getFailedAmount(): int
    {
        return $this->failedAmount;
    }

    /**
     * @return int
     */
    public function getFailedInvoices(): int
    {
        return $this->failedInvoices;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @return int
     */
    public function getNonRenewingSubscriptions(): int
    {
        return $this->nonRenewingSubscriptions;
    }

    /**
     * @return int
     */
    public function getOnHoldSubscriptions(): int
    {
        return $this->onHoldSubscriptions;
    }

    /**
     * @return int
     */
    public function getPendingAdditionalCostAmount(): int
    {
        return $this->pendingAdditionalCostAmount;
    }

    /**
     * @return int
     */
    public function getPendingAdditionalCosts(): int
    {
        return $this->pendingAdditionalCosts;
    }

    /**
     * @return int
     */
    public function getPendingAmount(): int
    {
        return $this->pendingAmount;
    }

    /**
     * @return int
     */
    public function getPendingCreditAmount(): int
    {
        return $this->pendingCreditAmount;
    }

    /**
     * @return int
     */
    public function getPendingCredits(): int
    {
        return $this->pendingCredits;
    }

    /**
     * @return int
     */
    public function getPendingInvoices(): int
    {
        return $this->pendingInvoices;
    }

    /**
     * @return int
     */
    public function getSettledInvoices(): int
    {
        return $this->settledInvoices;
    }

    /**
     * @return int
     */
    public function getSubscriptions(): int
    {
        return $this->subscriptions;
    }

    /**
     * @return bool|null
     */
    public function getTest(): ?bool
    {
        return $this->test;
    }

    /**
     * @return int
     */
    public function getTransferredAdditionalCostAmount(): int
    {
        return $this->transferredAdditionalCostAmount;
    }

    /**
     * @return int
     */
    public function getTransferredAdditionalCosts(): int
    {
        return $this->transferredAdditionalCosts;
    }

    /**
     * @return int
     */
    public function getTransferredCreditAmount(): int
    {
        return $this->transferredCreditAmount;
    }

    /**
     * @return int
     */
    public function getTransferredCredits(): int
    {
        return $this->transferredCredits;
    }

    /**
     * @return int
     */
    public function getTrialActiveSubscriptions(): int
    {
        return $this->trialActiveSubscriptions;
    }

    /**
     * @return int
     */
    public function getTrialCancelledSubscriptions(): int
    {
        return $this->trialCancelledSubscriptions;
    }

    /**
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
}
