<?php

namespace Billwerk\Sdk\Model\Checkout\Session;

use Billwerk\Sdk\Enum\IntervalUnitEnum;
use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasRequestApiInterface;
use DateTime;

class SessionDataModel extends AbstractModel implements HasRequestApiInterface
{
    /**
     * Social security number, e.g. for Klarna Sweden
     *
     * @var string|null $ssn
     */
    protected ?string $ssn = null;

    /**
     * Account Holder name, e.g. for IDEAL
     *
     * @var string|null $accountHolderName
     */
    protected ?string $accountHolderName = null;

    /**
     * Optional value to define MobilePay Subscriptions fixed recurring amount in minor unit.
     * For subscription sessions this will default to plan amount
     *
     * @var int|null $mpsAmount
     */
    protected ?int $mpsAmount = null;

    /**
     * Optional MobilePay Subscriptions plan text shown when signing up. Maximum 64 characters.
     * For subscription sessions this will default to plan name. For other session types default will be shop name
     *
     * @var string|null $mpsPlan
     */
    protected ?string $mpsPlan = null;

    /**
     * Optional MobilePay Subscriptions additional description displayed to the customer. Maximum 60 characters.
     * For subscription sessions this will default to plan description
     *
     * @var string|null $mpsDescription
     */
    protected ?string $mpsDescription = null;

    /**
     * Optional MobilePay Subscriptions frequency. Allowed values flexible, yearly, biyearly, quarterly, monthly,
     * biweekly, weekly or daily. For subscription sessions this will default to plan frequency
     *
     * @see MpsFrequencyEnum
     * @var string|null $mpsFrequency
     */
    protected ?string $mpsFrequency = null;

    /**
     * Optional MobilePay Subscriptions id for subscription. Maximum 64 characters. For subscription sessions
     * this will default to subscription handle
     *
     * @var string|null $mpsExternalId
     */
    protected ?string $mpsExternalId = null;

    /**
     * Optional MobilePay Subscriptions description for payment created in conjunction with subscription signup.
     * Maximum 60 characters. Defaults to shop name
     *
     * @var string|null $mpsPaymentDescription
     */
    protected ?string $mpsPaymentDescription = null;

    /**
     * Optional MobilePay Subscriptions merchant cancel redirect URL. If present user will not be able to cancel
     * within app, but instead will be redirected to this url
     *
     * @var string|null $mpsCancelRedirectUrl
     */
    protected ?string $mpsCancelRedirectUrl = null;

    /**
     * Alternative return url for MobilePay Online and Vipss wallet payments. Using this parameter the customer
     * will be redirected from wallet payment directly to this URL, bypassing Reepay Checkout. Notice that the
     * result of the payment is not part of the return url from the wallet providers, so the result of the charge
     * must be fetched from Reepay API operation get charge. Using this option can give a smoother experience
     * for app integrations. Notice that the return url can be an app scheme url
     *
     * @var string|null $alternativeReturnUrl
     */
    protected ?string $alternativeReturnUrl = null;

    /**
     * Optional Apple Pay recurring payment start date in format yyyy-MM-dd to be displayed to the user
     *
     * @var string|null $applepayRecurringPaymentStartDate
     */
    protected ?string $applepayRecurringPaymentStartDate = null;

    /**
     * Optional Apple Pay recurring payment end date in format yyyy-MM-dd to be displayed to the user
     *
     * @var string|null $applepayRecurringPaymentEndDate
     */
    protected ?string $applepayRecurringPaymentEndDate = null;

    /**
     * Optional ApplePay recurring payment interval unit to be displayed to the user. One of the following
     * values: year, month, or day. If not set, the value defaults to month in ApplePay
     *
     * @see IntervalUnitEnum
     * @var string|null $applepayRecurringPaymentIntervalUnit
     */
    protected ?string $applepayRecurringPaymentIntervalUnit = null;

    /**
     * Optional Apple Pay recurring payment interval count to be displayed to the user
     *
     * @var int|null $applepayRecurringPaymentIntervalCount
     */
    protected ?int $applepayRecurringPaymentIntervalCount = null;

    /**
     * Optional Apple Pay label to be displayed to the customer. Maximum 64 characters
     *
     * @var string|null $applepayRecurringLabel
     */
    protected ?string $applepayRecurringLabel = null;

    /**
     * Optional value to define Apple Pay fixed recurring amount
     *
     * @var int|null $applepayRecurringAmount
     */
    protected ?int $applepayRecurringAmount = null;

    /**
     * Optional SEPA debtor name
     *
     * @var string|null $sepaDebtorName
     */
    protected ?string $sepaDebtorName = null;

    /**
     * Optional SEPA debtor address
     *
     * @var string|null $sepaDebtorAddress
     */
    protected ?string $sepaDebtorAddress = null;

    /**
     * Optional SEPA debtor postal code
     *
     * @var string|null $sepaDebtorPostalCode
     */
    protected ?string $sepaDebtorPostalCode = null;

    /**
     * Optional SEPA debtor city
     *
     * @var string|null $sepaDebtorCity
     */
    protected ?string $sepaDebtorCity = null;

    /**
     * Optional SEPA debtor country in ISO 3166-1 alpha-2
     *
     * @var string|null $sepaDebtorCountry
     */
    protected ?string $sepaDebtorCountry = null;

    /**
     * Optional SEPA debtor IBAN
     *
     * @var string|null $sepaDebtorIban
     */
    protected ?string $sepaDebtorIban = null;

    /**
     * Optional value to define SEPA fixed recurring amount
     *
     * @var int|null $sepaMandateAmount
     */
    protected ?int $sepaMandateAmount = null;

    /**
     * Optional value to define Vipps Recurring fixed recurring amount in minor unit.
     * For subscription sessions this will default to plan amount
     *
     * @var int|null $vippsRecurringAmount
     */
    protected ?int $vippsRecurringAmount = null;

    /**
     * Optional Vipps Recurring product name displayed to the customer. Maximum 45 characters.
     * For subscription sessions this will default to plan name
     *
     * @var string|null $vippsRecurringProductName
     */
    protected ?string $vippsRecurringProductName = null;

    /**
     * Optional Vipps Recurring subscription pricing type. One of the following values: legacy, variable.
     * Defaults to legacy
     *
     * @see VippsRecurringPricingTypeEnum
     * @var string|null $vippsRecurringPricingType
     */
    protected ?string $vippsRecurringPricingType = null;

    /**
     * Optional Vipps Recurring additional product description displayed to the customer.
     * Maximum 100 characters. For subscription sessions this will default to plan description
     *
     * @var string|null $vippsRecurringProductDescription
     */
    protected ?string $vippsRecurringProductDescription = null;

    /**
     * Optional Vipps Recurring payment interval count to be displayed to the customer.
     * For subscription sessions this will default to plan interval length
     *
     * @var int|null $vippsRecurringIntervalCount
     */
    protected ?int $vippsRecurringIntervalCount = null;

    /**
     * Optional Vipps Recurring payment interval unit to be displayed to the customer. One of
     * the following values: year, month, or day. For subscription sessions this will default
     * to plan schedule type
     *
     * @see IntervalUnitEnum
     * @var string|null $vippsRecurringIntervalUnit
     */
    protected ?string $vippsRecurringIntervalUnit = null;

    /**
     * Optional Vipps Recurring description for initial payment created in conjunction with subscription signup
     *
     * @var string|null $vippsRecurringInitialPaymentDescription
     */
    protected ?string $vippsRecurringInitialPaymentDescription = null;

    /**
     * Optional Vipps Recurring agreement cancel URL. If present this URL will override the URL set on the agreement
     *
     * @var string|null $vippsRecurringMerchantCancelUrl
     */
    protected ?string $vippsRecurringMerchantCancelUrl = null;

    /**
     * Optional amount for Vipps Recurring campaign in minor unit. For subscription sessions this will
     * default to discount amount
     *
     * @var int|null $vippsRecurringCampaignAmount
     */
    protected ?int $vippsRecurringCampaignAmount = null;

    /**
     * Conditional Vipps Recurring campaign interval count to be displayed to the customer
     *
     * @var int|null $vippsRecurringCampaignIntervalCount
     */
    protected ?int $vippsRecurringCampaignIntervalCount = null;

    /**
     * Conditional Vipps Recurring campaign interval unit to be displayed to the customer.
     * One of the following values: year, month, week or day
     *
     * @see IntervalUnitEnum
     * @var string|null $vippsRecurringCampaignIntervalUnit
     */
    protected ?string $vippsRecurringCampaignIntervalUnit = null;

    /**
     * Conditional Vipps Recurring campaign end date to be displayed to the user
     *
     * @var DateTime|null $vippsRecurringCampaignEndDate
     */
    protected ?DateTime $vippsRecurringCampaignEndDate = null;

    /**
     * Optional parameter for Anyday. Recommended to set if webshop has many domains
     *
     * @var string|null $anydayWebshopUrl
     */
    protected ?string $anydayWebshopUrl = null;

    /**
     * Require MobilePay user age to be this age or above
     *
     * @var int|null $mpoMinimumUserAge
     */
    protected ?int $mpoMinimumUserAge = null;

    /**
     * Account Holder name, e.g. for IDEAL
     *
     * @return string|null
     */
    public function getAccountHolderName(): ?string
    {
        return $this->accountHolderName;
    }

    /**
     * Alternative return url for MobilePay Online and Vipss wallet payments. Using this parameter the customer
     *  will be redirected from wallet payment directly to this URL, bypassing Reepay Checkout. Notice that the
     *  result of the payment is not part of the return url from the wallet providers, so the result of the charge
     *  must be fetched from Reepay API operation get charge. Using this option can give a smoother experience
     *  for app integrations. Notice that the return url can be an app scheme url
     *
     * @return string|null
     */
    public function getAlternativeReturnUrl(): ?string
    {
        return $this->alternativeReturnUrl;
    }

    /**
     * Optional parameter for Anyday. Recommended to set if webshop has many domains
     *
     * @return string|null
     */
    public function getAnydayWebshopUrl(): ?string
    {
        return $this->anydayWebshopUrl;
    }

    /**
     * Optional ApplePay recurring payment interval unit to be displayed to the user. One of the following
     *  values: year, month, or day. If not set, the value defaults to month in ApplePay
     *
     * @see IntervalUnitEnum
     * @return string|null
     */
    public function getApplepayRecurringPaymentIntervalUnit(): ?string
    {
        return $this->applepayRecurringPaymentIntervalUnit;
    }

    /**
     * Optional value to define Apple Pay fixed recurring amount
     *
     * @return int|null
     */
    public function getApplepayRecurringAmount(): ?int
    {
        return $this->applepayRecurringAmount;
    }

    /**
     * Optional Apple Pay label to be displayed to the customer. Maximum 64 characters
     *
     * @return string|null
     */
    public function getApplepayRecurringLabel(): ?string
    {
        return $this->applepayRecurringLabel;
    }

    /**
     * Optional Apple Pay recurring payment end date in format yyyy-MM-dd to be displayed to the user
     *
     * @return string|null
     */
    public function getApplepayRecurringPaymentEndDate(): ?string
    {
        return $this->applepayRecurringPaymentEndDate;
    }

    /**
     * Optional Apple Pay recurring payment interval count to be displayed to the user
     *
     * @return int|null
     */
    public function getApplepayRecurringPaymentIntervalCount(): ?int
    {
        return $this->applepayRecurringPaymentIntervalCount;
    }

    /**
     * Optional Apple Pay recurring payment start date in format yyyy-MM-dd to be displayed to the user
     *
     * @return string|null
     */
    public function getApplepayRecurringPaymentStartDate(): ?string
    {
        return $this->applepayRecurringPaymentStartDate;
    }

    /**
     * Require MobilePay user age to be this age or above
     *
     * @return int|null
     */
    public function getMpoMinimumUserAge(): ?int
    {
        return $this->mpoMinimumUserAge;
    }

    /**
     * Optional MobilePay Subscriptions additional description displayed to the customer. Maximum 60 characters.
     *  For subscription sessions this will default to plan description
     *
     * @return string|null
     */
    public function getMpsDescription(): ?string
    {
        return $this->mpsDescription;
    }

    /**
     * Optional value to define MobilePay Subscriptions fixed recurring amount in minor unit.
     *  For subscription sessions this will default to plan amount
     *
     * @return int|null
     */
    public function getMpsAmount(): ?int
    {
        return $this->mpsAmount;
    }

    /**
     * Optional MobilePay Subscriptions merchant cancel redirect URL. If present user will not be able to cancel
     *  within app, but instead will be redirected to this url
     *
     * @return string|null
     */
    public function getMpsCancelRedirectUrl(): ?string
    {
        return $this->mpsCancelRedirectUrl;
    }

    /**
     * Optional MobilePay Subscriptions id for subscription. Maximum 64 characters. For subscription sessions
     *  this will default to subscription handle
     *
     * @return string|null
     */
    public function getMpsExternalId(): ?string
    {
        return $this->mpsExternalId;
    }

    /**
     * Optional MobilePay Subscriptions frequency. Allowed values flexible, yearly, biyearly, quarterly, monthly,
     *  biweekly, weekly or daily. For subscription sessions this will default to plan frequency
     *
     * @see MpsFrequencyEnum
     * @return string|null
     */
    public function getMpsFrequency(): ?string
    {
        return $this->mpsFrequency;
    }

    /**
     * Optional MobilePay Subscriptions description for payment created in conjunction with subscription signup.
     *  Maximum 60 characters. Defaults to shop name
     *
     * @return string|null
     */
    public function getMpsPaymentDescription(): ?string
    {
        return $this->mpsPaymentDescription;
    }

    /**
     * Optional MobilePay Subscriptions plan text shown when signing up. Maximum 64 characters.
     *  For subscription sessions this will default to plan name. For other session types default will be shop name
     *
     * @return string|null
     */
    public function getMpsPlan(): ?string
    {
        return $this->mpsPlan;
    }

    /**
     * Optional SEPA debtor address
     *
     * @return string|null
     */
    public function getSepaDebtorAddress(): ?string
    {
        return $this->sepaDebtorAddress;
    }

    /**
     * Optional SEPA debtor city
     *
     * @return string|null
     */
    public function getSepaDebtorCity(): ?string
    {
        return $this->sepaDebtorCity;
    }

    /**
     * Optional SEPA debtor country in ISO 3166-1 alpha-2
     *
     * @return string|null
     */
    public function getSepaDebtorCountry(): ?string
    {
        return $this->sepaDebtorCountry;
    }

    /**
     * Optional SEPA debtor IBAN
     *
     * @return string|null
     */
    public function getSepaDebtorIban(): ?string
    {
        return $this->sepaDebtorIban;
    }

    /**
     * Optional SEPA debtor name
     *
     * @return string|null
     */
    public function getSepaDebtorName(): ?string
    {
        return $this->sepaDebtorName;
    }

    /**
     * Optional SEPA debtor postal code
     *
     * @return string|null
     */
    public function getSepaDebtorPostalCode(): ?string
    {
        return $this->sepaDebtorPostalCode;
    }

    /**
     * Optional value to define SEPA fixed recurring amount
     *
     * @return int|null
     */
    public function getSepaMandateAmount(): ?int
    {
        return $this->sepaMandateAmount;
    }

    /**
     * Social security number, e.g. for Klarna Sweden
     *
     * @return string|null
     */
    public function getSsn(): ?string
    {
        return $this->ssn;
    }

    /**
     * Optional value to define Vipps Recurring fixed recurring amount in minor unit.
     *  For subscription sessions this will default to plan amount
     *
     * @return int|null
     */
    public function getVippsRecurringAmount(): ?int
    {
        return $this->vippsRecurringAmount;
    }

    /**
     * Optional amount for Vipps Recurring campaign in minor unit. For subscription sessions this will
     *  default to discount amount
     *
     * @return int|null
     */
    public function getVippsRecurringCampaignAmount(): ?int
    {
        return $this->vippsRecurringCampaignAmount;
    }

    /**
     * Conditional Vipps Recurring campaign end date to be displayed to the user
     *
     * @return DateTime|null
     */
    public function getVippsRecurringCampaignEndDate(): ?DateTime
    {
        return $this->vippsRecurringCampaignEndDate;
    }

    /**
     * Conditional Vipps Recurring campaign interval count to be displayed to the customer
     *
     * @return int|null
     */
    public function getVippsRecurringCampaignIntervalCount(): ?int
    {
        return $this->vippsRecurringCampaignIntervalCount;
    }

    /**
     * Conditional Vipps Recurring campaign interval unit to be displayed to the customer.
     *  One of the following values: year, month, week or day
     *
     * @see IntervalUnitEnum
     * @return string|null
     */
    public function getVippsRecurringCampaignIntervalUnit(): ?string
    {
        return $this->vippsRecurringCampaignIntervalUnit;
    }

    /**
     * Optional Vipps Recurring description for initial payment created in conjunction with subscription signup
     *
     * @return string|null
     */
    public function getVippsRecurringInitialPaymentDescription(): ?string
    {
        return $this->vippsRecurringInitialPaymentDescription;
    }

    /**
     * Optional Vipps Recurring payment interval count to be displayed to the customer.
     *  For subscription sessions this will default to plan interval length
     *
     * @return int|null
     */
    public function getVippsRecurringIntervalCount(): ?int
    {
        return $this->vippsRecurringIntervalCount;
    }

    /**
     * Optional Vipps Recurring payment interval unit to be displayed to the customer. One of
     *  the following values: year, month, or day. For subscription sessions this will default
     *  to plan schedule type
     *
     * @see IntervalUnitEnum
     * @return string|null
     */
    public function getVippsRecurringIntervalUnit(): ?string
    {
        return $this->vippsRecurringIntervalUnit;
    }

    /**
     * Optional Vipps Recurring agreement cancel URL. If present this URL will override the URL set on the agreement
     *
     * @return string|null
     */
    public function getVippsRecurringMerchantCancelUrl(): ?string
    {
        return $this->vippsRecurringMerchantCancelUrl;
    }

    /**
     * Optional Vipps Recurring subscription pricing type. One of the following values: legacy, variable.
     *  Defaults to legacy
     *
     * @see VippsRecurringPricingTypeEnum
     * @return string|null
     */
    public function getVippsRecurringPricingType(): ?string
    {
        return $this->vippsRecurringPricingType;
    }

    /**
     * Optional Vipps Recurring additional product description displayed to the customer.
     *  Maximum 100 characters. For subscription sessions this will default to plan description
     *
     * @return string|null
     */
    public function getVippsRecurringProductDescription(): ?string
    {
        return $this->vippsRecurringProductDescription;
    }

    /**
     * Optional Vipps Recurring product name displayed to the customer. Maximum 45 characters.
     *  For subscription sessions this will default to plan name
     *
     * @return string|null
     */
    public function getVippsRecurringProductName(): ?string
    {
        return $this->vippsRecurringProductName;
    }

    /**
     * Account Holder name, e.g. for IDEAL
     *
     * @param string|null $accountHolderName
     *
     * @return self
     */
    public function setAccountHolderName(?string $accountHolderName): self
    {
        $this->accountHolderName = $accountHolderName;

        return $this;
    }

    /**
     * Alternative return url for MobilePay Online and Vipss wallet payments. Using this parameter the customer
     *  will be redirected from wallet payment directly to this URL, bypassing Reepay Checkout. Notice that the
     *  result of the payment is not part of the return url from the wallet providers, so the result of the charge
     *  must be fetched from Reepay API operation get charge. Using this option can give a smoother experience
     *  for app integrations. Notice that the return url can be an app scheme url
     *
     * @param string|null $alternativeReturnUrl
     *
     * @return self
     */
    public function setAlternativeReturnUrl(?string $alternativeReturnUrl): self
    {
        $this->alternativeReturnUrl = $alternativeReturnUrl;

        return $this;
    }

    /**
     * Optional parameter for Anyday. Recommended to set if webshop has many domains
     *
     * @param string|null $anydayWebshopUrl
     *
     * @return self
     */
    public function setAnydayWebshopUrl(?string $anydayWebshopUrl): self
    {
        $this->anydayWebshopUrl = $anydayWebshopUrl;

        return $this;
    }

    /**
     * Optional ApplePay recurring payment interval unit to be displayed to the user. One of the following
     *  values: year, month, or day. If not set, the value defaults to month in ApplePay
     *
     * @see IntervalUnitEnum
     *
     * @param string|null $applepayRecurringPaymentIntervalUnit
     *
     * @return self
     */
    public function setApplepayRecurringPaymentIntervalUnit(?string $applepayRecurringPaymentIntervalUnit): self
    {
        $this->applepayRecurringPaymentIntervalUnit = $applepayRecurringPaymentIntervalUnit;

        return $this;
    }

    /**
     * Optional value to define Apple Pay fixed recurring amount
     *
     * @param int|null $applepayRecurringAmount
     *
     * @return self
     */
    public function setApplepayRecurringAmount(?int $applepayRecurringAmount): self
    {
        $this->applepayRecurringAmount = $applepayRecurringAmount;

        return $this;
    }

    /**
     * Optional Apple Pay label to be displayed to the customer. Maximum 64 characters
     *
     * @param string|null $applepayRecurringLabel
     *
     * @return self
     */
    public function setApplepayRecurringLabel(?string $applepayRecurringLabel): self
    {
        $this->applepayRecurringLabel = $applepayRecurringLabel;

        return $this;
    }

    /**
     * Optional Apple Pay recurring payment end date in format yyyy-MM-dd to be displayed to the user
     *
     * @param string|null $applepayRecurringPaymentEndDate
     *
     * @return self
     */
    public function setApplepayRecurringPaymentEndDate(?string $applepayRecurringPaymentEndDate): self
    {
        $this->applepayRecurringPaymentEndDate = $applepayRecurringPaymentEndDate;

        return $this;
    }

    /**
     * Optional Apple Pay recurring payment interval count to be displayed to the user
     *
     * @param int|null $applepayRecurringPaymentIntervalCount
     *
     * @return self
     */
    public function setApplepayRecurringPaymentIntervalCount(?int $applepayRecurringPaymentIntervalCount): self
    {
        $this->applepayRecurringPaymentIntervalCount = $applepayRecurringPaymentIntervalCount;

        return $this;
    }

    /**
     * Optional Apple Pay recurring payment start date in format yyyy-MM-dd to be displayed to the user
     *
     * @param string|null $applepayRecurringPaymentStartDate
     *
     * @return self
     */
    public function setApplepayRecurringPaymentStartDate(?string $applepayRecurringPaymentStartDate): self
    {
        $this->applepayRecurringPaymentStartDate = $applepayRecurringPaymentStartDate;

        return $this;
    }

    /**
     * Require MobilePay user age to be this age or above
     *
     * @param int|null $mpoMinimumUserAge
     *
     * @return self
     */
    public function setMpoMinimumUserAge(?int $mpoMinimumUserAge): self
    {
        $this->mpoMinimumUserAge = $mpoMinimumUserAge;

        return $this;
    }

    /**
     * Optional value to define MobilePay Subscriptions fixed recurring amount in minor unit.
     *  For subscription sessions this will default to plan amount
     *
     * @param int|null $mpsAmount
     *
     * @return self
     */
    public function setMpsAmount(?int $mpsAmount): self
    {
        $this->mpsAmount = $mpsAmount;

        return $this;
    }

    /**
     * Optional MobilePay Subscriptions merchant cancel redirect URL. If present user will not be able to cancel
     *  within app, but instead will be redirected to this url
     *
     * @param string|null $mpsCancelRedirectUrl
     *
     * @return self
     */
    public function setMpsCancelRedirectUrl(?string $mpsCancelRedirectUrl): self
    {
        $this->mpsCancelRedirectUrl = $mpsCancelRedirectUrl;

        return $this;
    }

    /**
     * Optional MobilePay Subscriptions additional description displayed to the customer. Maximum 60 characters.
     *  For subscription sessions this will default to plan description
     *
     * @param string|null $mpsDescription
     *
     * @return self
     */
    public function setMpsDescription(?string $mpsDescription): self
    {
        $this->mpsDescription = $mpsDescription;

        return $this;
    }

    /**
     * Optional MobilePay Subscriptions id for subscription. Maximum 64 characters. For subscription sessions
     *  this will default to subscription handle
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
     * Optional MobilePay Subscriptions frequency. Allowed values flexible, yearly, biyearly, quarterly, monthly,
     *  biweekly, weekly or daily. For subscription sessions this will default to plan frequency
     *
     * @see MpsFrequencyEnum
     *
     * @param string|null $mpsFrequency
     *
     * @return self
     */
    public function setMpsFrequency(?string $mpsFrequency): self
    {
        $this->mpsFrequency = $mpsFrequency;

        return $this;
    }

    /**
     * Optional MobilePay Subscriptions description for payment created in conjunction with subscription signup.
     *  Maximum 60 characters. Defaults to shop name
     *
     * @param string|null $mpsPaymentDescription
     *
     * @return self
     */
    public function setMpsPaymentDescription(?string $mpsPaymentDescription): self
    {
        $this->mpsPaymentDescription = $mpsPaymentDescription;

        return $this;
    }

    /**
     * Optional MobilePay Subscriptions plan text shown when signing up. Maximum 64 characters.
     *  For subscription sessions this will default to plan name. For other session types default will be shop name
     *
     * @param string|null $mpsPlan
     *
     * @return self
     */
    public function setMpsPlan(?string $mpsPlan): self
    {
        $this->mpsPlan = $mpsPlan;

        return $this;
    }

    /**
     * Optional SEPA debtor address
     *
     * @param string|null $sepaDebtorAddress
     *
     * @return self
     */
    public function setSepaDebtorAddress(?string $sepaDebtorAddress): self
    {
        $this->sepaDebtorAddress = $sepaDebtorAddress;

        return $this;
    }

    /**
     * Optional SEPA debtor city
     *
     * @param string|null $sepaDebtorCity
     *
     * @return self
     */
    public function setSepaDebtorCity(?string $sepaDebtorCity): self
    {
        $this->sepaDebtorCity = $sepaDebtorCity;

        return $this;
    }

    /**
     * Optional SEPA debtor country in ISO 3166-1 alpha-2
     *
     * @param string|null $sepaDebtorCountry
     *
     * @return self
     */
    public function setSepaDebtorCountry(?string $sepaDebtorCountry): self
    {
        $this->sepaDebtorCountry = $sepaDebtorCountry;

        return $this;
    }

    /**
     * Optional SEPA debtor IBAN
     *
     * @param string|null $sepaDebtorIban
     *
     * @return self
     */
    public function setSepaDebtorIban(?string $sepaDebtorIban): self
    {
        $this->sepaDebtorIban = $sepaDebtorIban;

        return $this;
    }

    /**
     * Optional SEPA debtor name
     *
     * @param string|null $sepaDebtorName
     *
     * @return self
     */
    public function setSepaDebtorName(?string $sepaDebtorName): self
    {
        $this->sepaDebtorName = $sepaDebtorName;

        return $this;
    }

    /**
     * Optional SEPA debtor postal code
     *
     * @param string|null $sepaDebtorPostalCode
     *
     * @return self
     */
    public function setSepaDebtorPostalCode(?string $sepaDebtorPostalCode): self
    {
        $this->sepaDebtorPostalCode = $sepaDebtorPostalCode;

        return $this;
    }

    /**
     * Optional value to define SEPA fixed recurring amount
     *
     * @param int|null $sepaMandateAmount
     *
     * @return self
     */
    public function setSepaMandateAmount(?int $sepaMandateAmount): self
    {
        $this->sepaMandateAmount = $sepaMandateAmount;

        return $this;
    }

    /**
     * Social security number, e.g. for Klarna Sweden
     *
     * @param string|null $ssn
     *
     * @return self
     */
    public function setSsn(?string $ssn): self
    {
        $this->ssn = $ssn;

        return $this;
    }

    /**
     * Optional value to define Vipps Recurring fixed recurring amount in minor unit.
     *  For subscription sessions this will default to plan amount
     *
     * @param int|null $vippsRecurringAmount
     *
     * @return self
     */
    public function setVippsRecurringAmount(?int $vippsRecurringAmount): self
    {
        $this->vippsRecurringAmount = $vippsRecurringAmount;

        return $this;
    }

    /**
     * Optional amount for Vipps Recurring campaign in minor unit. For subscription sessions this will
     *  default to discount amount
     *
     * @param int|null $vippsRecurringCampaignAmount
     *
     * @return self
     */
    public function setVippsRecurringCampaignAmount(?int $vippsRecurringCampaignAmount): self
    {
        $this->vippsRecurringCampaignAmount = $vippsRecurringCampaignAmount;

        return $this;
    }

    /**
     * Conditional Vipps Recurring campaign end date to be displayed to the user
     *
     * @param DateTime|null $vippsRecurringCampaignEndDate
     *
     * @return self
     */
    public function setVippsRecurringCampaignEndDate(?DateTime $vippsRecurringCampaignEndDate): self
    {
        $this->vippsRecurringCampaignEndDate = $vippsRecurringCampaignEndDate;

        return $this;
    }

    /**
     * Conditional Vipps Recurring campaign interval count to be displayed to the customer
     *
     * @param int|null $vippsRecurringCampaignIntervalCount
     *
     * @return self
     */
    public function setVippsRecurringCampaignIntervalCount(?int $vippsRecurringCampaignIntervalCount): self
    {
        $this->vippsRecurringCampaignIntervalCount = $vippsRecurringCampaignIntervalCount;

        return $this;
    }

    /**
     * Conditional Vipps Recurring campaign interval unit to be displayed to the customer.
     *  One of the following values: year, month, week or day
     *
     * @see IntervalUnitEnum
     *
     * @param string|null $vippsRecurringCampaignIntervalUnit
     *
     * @return self
     */
    public function setVippsRecurringCampaignIntervalUnit(?string $vippsRecurringCampaignIntervalUnit): self
    {
        $this->vippsRecurringCampaignIntervalUnit = $vippsRecurringCampaignIntervalUnit;

        return $this;
    }

    /**
     * Optional Vipps Recurring description for initial payment created in conjunction with subscription signup
     *
     * @param string|null $vippsRecurringInitialPaymentDescription
     *
     * @return self
     */
    public function setVippsRecurringInitialPaymentDescription(?string $vippsRecurringInitialPaymentDescription): self
    {
        $this->vippsRecurringInitialPaymentDescription = $vippsRecurringInitialPaymentDescription;

        return $this;
    }

    /**
     * Optional Vipps Recurring payment interval count to be displayed to the customer.
     *  For subscription sessions this will default to plan interval length
     *
     * @param int|null $vippsRecurringIntervalCount
     *
     * @return self
     */
    public function setVippsRecurringIntervalCount(?int $vippsRecurringIntervalCount): self
    {
        $this->vippsRecurringIntervalCount = $vippsRecurringIntervalCount;

        return $this;
    }

    /**
     * Optional Vipps Recurring payment interval unit to be displayed to the customer. One of
     *  the following values: year, month, or day. For subscription sessions this will default
     *  to plan schedule type
     *
     * @see IntervalUnitEnum
     *
     * @param string|null $vippsRecurringIntervalUnit
     *
     * @return self
     */
    public function setVippsRecurringIntervalUnit(?string $vippsRecurringIntervalUnit): self
    {
        $this->vippsRecurringIntervalUnit = $vippsRecurringIntervalUnit;

        return $this;
    }

    /**
     * Optional Vipps Recurring agreement cancel URL. If present this URL will override the URL set on the agreement
     *
     * @param string|null $vippsRecurringMerchantCancelUrl
     *
     * @return self
     */
    public function setVippsRecurringMerchantCancelUrl(?string $vippsRecurringMerchantCancelUrl): self
    {
        $this->vippsRecurringMerchantCancelUrl = $vippsRecurringMerchantCancelUrl;

        return $this;
    }

    /**
     * Optional Vipps Recurring subscription pricing type. One of the following values: legacy, variable.
     *  Defaults to legacy
     *
     * @see VippsRecurringPricingTypeEnum
     *
     * @param string|null $vippsRecurringPricingType
     *
     * @return self
     */
    public function setVippsRecurringPricingType(?string $vippsRecurringPricingType): self
    {
        $this->vippsRecurringPricingType = $vippsRecurringPricingType;

        return $this;
    }

    /**
     * Optional Vipps Recurring additional product description displayed to the customer.
     *  Maximum 100 characters. For subscription sessions this will default to plan description
     *
     * @param string|null $vippsRecurringProductDescription
     *
     * @return self
     */
    public function setVippsRecurringProductDescription(?string $vippsRecurringProductDescription): self
    {
        $this->vippsRecurringProductDescription = $vippsRecurringProductDescription;

        return $this;
    }

    /**
     * Optional Vipps Recurring product name displayed to the customer. Maximum 45 characters.
     *  For subscription sessions this will default to plan name
     *
     * @param string|null $vippsRecurringProductName
     *
     * @return self
     */
    public function setVippsRecurringProductName(?string $vippsRecurringProductName): self
    {
        $this->vippsRecurringProductName = $vippsRecurringProductName;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        if (isset($response['ssn'])) {
            $model->setSsn($response['ssn']);
        }

        if (isset($response['account_holder_name'])) {
            $model->setAccountHolderName($response['account_holder_name']);
        }

        if (isset($response['mps_amount'])) {
            $model->setMpsAmount($response['mps_amount']);
        }

        if (isset($response['mps_plan'])) {
            $model->setMpsPlan($response['mps_plan']);
        }

        if (isset($response['mps_description'])) {
            $model->setMpsDescription($response['mps_description']);
        }

        if (isset($response['mps_frequency'])) {
            $model->setMpsFrequency($response['mps_frequency']);
        }

        if (isset($response['mps_external_id'])) {
            $model->setMpsExternalId($response['mps_external_id']);
        }

        if (isset($response['mps_payment_description'])) {
            $model->setMpsPaymentDescription($response['mps_payment_description']);
        }

        if (isset($response['mps_cancel_redirect_url'])) {
            $model->setMpsCancelRedirectUrl($response['mps_cancel_redirect_url']);
        }

        if (isset($response['alternative_return_url'])) {
            $model->setAlternativeReturnUrl($response['alternative_return_url']);
        }

        if (isset($response['applepay_recurring_payment_start_date'])) {
            $model->setApplepayRecurringPaymentStartDate($response['applepay_recurring_payment_start_date']);
        }

        if (isset($response['applepay_recurring_payment_end_date'])) {
            $model->setApplepayRecurringPaymentEndDate($response['applepay_recurring_payment_end_date']);
        }

        if (isset($response['applepay_recurring_payment_interval_unit'])
            && in_array($response['applepay_recurring_payment_interval_unit'], IntervalUnitEnum::getAll(), true)) {
            $model->setApplepayRecurringPaymentIntervalUnit($response['applepay_recurring_payment_interval_unit']);
        }

        if (isset($response['applepay_recurring_payment_interval_count'])) {
            $model->setApplepayRecurringPaymentIntervalCount($response['applepay_recurring_payment_interval_count']);
        }

        if (isset($response['applepay_recurring_label'])) {
            $model->setApplepayRecurringLabel($response['applepay_recurring_label']);
        }

        if (isset($response['applepay_recurring_amount'])) {
            $model->setApplepayRecurringAmount($response['applepay_recurring_amount']);
        }

        if (isset($response['sepa_debtor_name'])) {
            $model->setSepaDebtorName($response['sepa_debtor_name']);
        }

        if (isset($response['sepa_debtor_address'])) {
            $model->setSepaDebtorAddress($response['sepa_debtor_address']);
        }

        if (isset($response['sepa_debtor_postal_code'])) {
            $model->setSepaDebtorPostalCode($response['sepa_debtor_postal_code']);
        }

        if (isset($response['sepa_debtor_city'])) {
            $model->setSepaDebtorCity($response['sepa_debtor_city']);
        }

        if (isset($response['sepa_debtor_country'])) {
            $model->setSepaDebtorCountry($response['sepa_debtor_country']);
        }

        if (isset($response['sepa_debtor_iban'])) {
            $model->setSepaDebtorIban($response['sepa_debtor_iban']);
        }

        if (isset($response['sepa_mandate_amount'])) {
            $model->setSepaMandateAmount($response['sepa_mandate_amount']);
        }

        if (isset($response['vipps_recurring_amount'])) {
            $model->setVippsRecurringAmount($response['vipps_recurring_amount']);
        }

        if (isset($response['vipps_recurring_product_name'])) {
            $model->setVippsRecurringProductName($response['vipps_recurring_product_name']);
        }

        if (isset($response['vipps_recurring_pricing_type'])) {
            $model->setVippsRecurringPricingType($response['vipps_recurring_pricing_type']);
        }

        if (isset($response['vipps_recurring_product_description'])) {
            $model->setVippsRecurringProductDescription($response['vipps_recurring_product_description']);
        }

        if (isset($response['vipps_recurring_interval_count'])) {
            $model->setVippsRecurringIntervalCount($response['vipps_recurring_interval_count']);
        }

        if (isset($response['vipps_recurring_interval_unit'])) {
            $model->setVippsRecurringIntervalUnit($response['vipps_recurring_interval_unit']);
        }

        if (isset($response['vipps_recurring_initial_payment_description'])) {
            $model->setVippsRecurringInitialPaymentDescription(
                $response['vipps_recurring_initial_payment_description']
            );
        }

        if (isset($response['vipps_recurring_merchant_cancel_url'])) {
            $model->setVippsRecurringMerchantCancelUrl($response['vipps_recurring_merchant_cancel_url']);
        }

        if (isset($response['vipps_recurring_campaign_amount'])) {
            $model->setVippsRecurringCampaignAmount($response['vipps_recurring_campaign_amount']);
        }

        if (isset($response['vipps_recurring_campaign_interval_count'])) {
            $model->setVippsRecurringCampaignIntervalCount($response['vipps_recurring_campaign_interval_count']);
        }

        if (isset($response['vipps_recurring_campaign_interval_unit'])) {
            $model->setVippsRecurringCampaignIntervalUnit($response['vipps_recurring_campaign_interval_unit']);
        }

        if (isset($response['vipps_recurring_campaign_end_date'])) {
            $model->setVippsRecurringCampaignEndDate(new DateTime($response['vipps_recurring_campaign_end_date']));
        }

        if (isset($response['anyday_webshop_url'])) {
            $model->setAnydayWebshopUrl($response['anyday_webshop_url']);
        }

        if (isset($response['mpo_minimum_user_age'])) {
            $model->setMpoMinimumUserAge($response['mpo_minimum_user_age']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'ssn' => $this->getSsn(),
            'account_holder_name' => $this->getAccountHolderName(),
            'mps_amount' => $this->getMpsAmount(),
            'mps_plan' => $this->getMpsPlan(),
            'mps_description' => $this->getMpsDescription(),
            'mps_frequency' => $this->getMpsFrequency(),
            'mps_external_id' => $this->getMpsExternalId(),
            'mps_payment_description' => $this->getMpsPaymentDescription(),
            'mps_cancel_redirect_url' => $this->getMpsCancelRedirectUrl(),
            'alternative_return_url' => $this->getAlternativeReturnUrl(),
            'applepay_recurring_payment_start_date' => $this->getApplepayRecurringPaymentStartDate(),
            'applepay_recurring_payment_end_date' => $this->getApplepayRecurringPaymentEndDate(),
            'applepay_recurring_payment_interval_unit' => $this->getApplepayRecurringPaymentIntervalUnit(),
            'applepay_recurring_payment_interval_count' => $this->getApplepayRecurringPaymentIntervalCount(),
            'applepay_recurring_label' => $this->getApplepayRecurringLabel(),
            'applepay_recurring_amount' => $this->getApplepayRecurringAmount(),
            'sepa_debtor_name' => $this->getSepaDebtorName(),
            'sepa_debtor_address' => $this->getSepaDebtorAddress(),
            'sepa_debtor_postal_code' => $this->getSepaDebtorPostalCode(),
            'sepa_debtor_city' => $this->getSepaDebtorCity(),
            'sepa_debtor_country' => $this->getSepaDebtorCountry(),
            'sepa_debtor_iban' => $this->getSepaDebtorIban(),
            'sepa_mandate_amount' => $this->getSepaMandateAmount(),
            'vipps_recurring_amount' => $this->getVippsRecurringAmount(),
            'vipps_recurring_product_name' => $this->getVippsRecurringProductName(),
            'vipps_recurring_pricing_type' => $this->getVippsRecurringPricingType(),
            'vipps_recurring_product_description' => $this->getVippsRecurringProductDescription(),
            'vipps_recurring_interval_count' => $this->getVippsRecurringIntervalCount(),
            'vipps_recurring_interval_unit' => $this->getVippsRecurringIntervalUnit(),
            'vipps_recurring_initial_payment_description' => $this->getVippsRecurringInitialPaymentDescription(),
            'vipps_recurring_merchant_cancel_url' => $this->getVippsRecurringMerchantCancelUrl(),
            'vipps_recurring_campaign_amount' => $this->getVippsRecurringCampaignAmount(),
            'vipps_recurring_campaign_interval_count' => $this->getVippsRecurringCampaignIntervalCount(),
            'vipps_recurring_campaign_interval_unit' => $this->getVippsRecurringCampaignIntervalUnit(),
            'vipps_recurring_campaign_end_date' =>
                $this->getVippsRecurringCampaignEndDate()
                    ? $this->getVippsRecurringCampaignEndDate()->format('Y-m-d\TH:i:s.v') : null,
            'anyday_webshop_url' => $this->getAnydayWebshopUrl(),
            'mpo_minimum_user_age' => $this->getMpoMinimumUserAge(),
        ], function ($value) {
            return $value !== null;
        });
    }

    public function toApi(): array
    {
        return $this->toArray();
    }
}
