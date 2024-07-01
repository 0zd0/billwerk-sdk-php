<?php

namespace Billwerk\Sdk\Model\Checkout\Session;

use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\AccountFundingInformationModel;
use Billwerk\Sdk\Model\HasRequestApiInterface;

class SessionChargeModel extends AbstractModel implements HasRequestApiInterface
{
    /**
     * Optional handle for a checkout configuration defined in the admin app to be used for this session
     *
     * @var string|null $configuration
     */
    protected ?string $configuration = null;

    /**
     * Optional locale for session. E.g. en_GB, da_DK, es_ES. Defaults to configuration locale or account locale
     *
     * @var string|null $locale
     */
    protected ?string $locale = null;

    /**
     * Optional time-to-live duration. The session will expire after the duration from creation, meaning that
     * payment attempts cannot be initiated after this duration. Notice though, that payments initiated within
     * the time-to-live duration might finish after the TTL E.g. MobilePay Online flows. The duration must be
     * given in the following notation: PTxS - x seconds, PTxM - x minutes, PTxH - x hours or PxD - x days.
     * E.g. PT3H (three hours). The default time-to-live is three months
     *
     * @var string|null $ttl
     */
    protected ?string $ttl = null;

    /**
     * Phone number to use for payment methods able to use a prefilled phone number. E.g. MobilePay,
     * Vipps and Swish. If no explicit phone number is defined, the phone number for the customer entity
     * will be used
     *
     * @var string|null $phone
     */
    protected ?string $phone = null;

    /**
     * Handle for existing invoice to charge. Either this argument must be provided or order
     *
     * @var string|null $invoice
     */
    protected ?string $invoice = null;

    /**
     * Whether or not to immediately settle (capture). Default is false. If not settled immediately
     * an authorization will be performed which can be settled later. Normally this have to be done within
     * 7 days. Note that not all payment methods support immediate settle
     *
     * @var bool|null $settle
     */
    protected ?bool $settle = null;

    /**
     * Object defining order details such as amount, currency and order text
     *
     * @var OrderModel|null $order
     */
    protected ?OrderModel $order = null;

    /**
     * If set a recurring payment method is stored for the customer and a reference returned.
     * This parameter if set to true will limit payment methods to those that are reusable. Cannot be
     * used in conjunction with recurring_optional
     *
     * @var bool|null $recurring
     */
    protected ?bool $recurring = null;

    /**
     * If checkout is opened in separate window the customer will be directed to this page after success
     *
     * @var string|null $acceptUrl
     */
    protected ?string $acceptUrl = null;

    /**
     * If checkout is opened in separate window the customer will be directed to this page if the customer cancels
     *
     * @var string|null $cancelUrl
     */
    protected ?string $cancelUrl = null;

    /**
     * Optional list of payment methods to use for the checkout session. Format:
     * <payment_methods> = list of <payment_method>
     * <payment_method> = [sca-|nosca-]<payment_name>
     * <payment_name> = The id of payment method, e.g. dankort
     * See https://optimize-docs.billwerk.com/docs/checkout-payment-methods for full documentation
     *
     * @var string[]|null $paymentMethods
     */
    protected ?array $paymentMethods = null;

    /**
     * Reference to existing card payment method (ca_xxx) to use instead of having cardholder enter card data.
     * CVV may still be required from cardholder
     *
     * @var string|null $cardOnFile
     */
    protected ?string $cardOnFile = null;

    /**
     * Require cvv from cardholder for card-on-file
     *
     * @var bool|null $cardOnFileRequireCvv
     */
    protected ?bool $cardOnFileRequireCvv = null;

    /**
     * Require expiration date for card-on-file
     *
     * @var bool|null $cardOnFileRequireExpDate
     */
    protected ?bool $cardOnFileRequireExpDate = null;

    /**
     * Optional alternative button text. Maximum length 32 characters
     *
     * @var string|null $buttonText
     */
    protected ?string $buttonText = null;

    /**
     * For cost based acquirer agreement selection this argument can be used to define the amount used
     * in calculating the least expensive agreement for future recurring payments. Can only be used
     * for sessions saving a payment method for later use. Must be given in minor unit for currency
     *
     * @var int|null $recurringAverageAmount
     */
    protected ?int $recurringAverageAmount = null;

    /**
     * Customer data used in strong customer authentication to reduce the need for a lengthy authentication
     * process and ensure less fraud. The data is not stored at Reepay and only used in the process of
     * strong customer authentication. The data is used by card issuer to determine if a frictionless
     * authentication flow can be used
     *
     * @var ScaDataModel|null $scaData
     */
    protected ?ScaDataModel $scaData = null;

    /**
     * Object to define payment type specific parameters
     *
     * @var SessionDataModel|null $sessionData
     */
    protected ?SessionDataModel $sessionData = null;

    /**
     * Optional reference given to the created payment method in case a recurring payment method is created
     * by the session. Session id will be used by default if not defined. Max length 64 with allowable characters
     * [a-zA-Z0-9_.-@]
     *
     * @var string|null $paymentMethodReference
     */
    protected ?string $paymentMethodReference = null;

    /**
     * Indicates that Account Funding Transaction (AFT) is requested.
     * It only can be used for instant settle (i.e. 'settle' = true)
     *
     * @var bool|null $accountFunding
     */
    protected ?bool $accountFunding = null;

    /**
     * Optional sender information required for Account Funding Transaction (AFT).
     * If not provided when requesting account funding transaction with account_funding=true,
     * information will be gathered from invoice billing address and customer
     *
     * @var AccountFundingInformationModel|null $accountFundingInformation
     */
    protected ?AccountFundingInformationModel $accountFundingInformation = null;

    /**
     * Optional list of agreement ids to filter which agreements will be used for card payments
     *
     * @var string[]|null $agreementFilter
     */
    protected ?array $agreementFilter = null;

    /**
     * Optional list of offline agreement handles to filter which options are shown to the consumer
     *
     * @var array|null $offlineAgreementFilter
     */
    protected ?array $offlineAgreementFilter = null;

    /**
     * Optional IP address to restrict the use of the session to
     *
     * @var string|null $allowedIp
     */
    protected ?string $allowedIp = null;

    /**
     * Optional argument to define the text on bank statement. Notice the following about this argument:
     * 1. It only works for some acquirers. 2. Acquirers may have rigid rules on the content of the text
     * on statement. Not complying to these rules will result in declined payments. 3) It is already
     * possible to define custom text on statement using templating in the Reepay Administration.
     * Contact support for help. We highly recommend to only supply this argument if absolutely necessary,
     * and the templated default text on statement is not sufficient. Maximum length is 128, but most
     * acquirers require a maximum length of 22 characters. Truncating will be applied if too long
     * for specific acquirer. Characters must match regex [\x20-\x7F]
     *
     * @var string|null $textOnStatement
     */
    protected ?string $textOnStatement = null;

    /**
     * Optional reference for the transaction at the acquirer. Notice the following about this argument:
     *
     * It only works for some acquirers.
     * Acquirers may have rigid rules on the content of the acquirer reference.
     * Not complying to these rules can result in declined payments.
     * It is already possible to define custom acquirer reference using templating in the Reepay Administration.
     * Contact support for help. We highly recommend to only supply this argument if absolutely necessary,
     * and the templated default acquirer reference is not sufficient. Maximum length is 128,
     * but most acquirers require a maximum length of 22 characters.
     * Truncating will be applied if too long for specific acquirer.
     * Characters must match regex [\x20-\x7F]
     *
     * @var string|null $acquirerReference
     */
    protected ?string $acquirerReference = null;

    /**
     * Option to show a checkbox for reusable payment methods to allow the customer to select to save
     * the payment method or not. If set to true the checkbox will be checked by default and vice versa.
     * If the customer chooses to save the payment method, the payment_method parameter will be returned.
     * Cannot be used in conjunction with recurring
     *
     * @var bool|null $recurringOptional
     */
    protected ?bool $recurringOptional = null;

    /**
     * Optional alternative text to show if the recurring_optional option is used
     *
     * @var string|null $recurringOptionalText
     */
    protected ?string $recurringOptionalText = null;

    /**
     * Whether or not to immediately settle (capture). Default is false. If not settled immediately
     *  an authorization will be performed which can be settled later. Normally this have to be done within
     *  7 days. Note that not all payment methods support immediate settle
     *
     * @return bool|null
     */
    public function getSettle(): ?bool
    {
        return $this->settle;
    }

    /**
     * If set a recurring payment method is stored for the customer and a reference returned.
     *  This parameter if set to true will limit payment methods to those that are reusable. Cannot be
     *  used in conjunction with recurring_optional
     *
     * @return bool|null
     */
    public function getRecurring(): ?bool
    {
        return $this->recurring;
    }

    /**
     * Optional reference given to the created payment method in case a recurring payment method is created
     *  by the session. Session id will be used by default if not defined. Max length 64 with allowable characters
     *  [a-zA-Z0-9_.-@]
     *
     * @return string|null
     */
    public function getPaymentMethodReference(): ?string
    {
        return $this->paymentMethodReference;
    }

    /**
     * Optional sender information required for Account Funding Transaction (AFT).
     *  If not provided when requesting account funding transaction with account_funding=true,
     *  information will be gathered from invoice billing address and customer
     *
     * @return AccountFundingInformationModel|null
     */
    public function getAccountFundingInformation(): ?AccountFundingInformationModel
    {
        return $this->accountFundingInformation;
    }

    /**
     * Indicates that Account Funding Transaction (AFT) is requested.
     *  It only can be used for instant settle (i.e. 'settle' = true)
     *
     * @return bool|null
     */
    public function getAccountFunding(): ?bool
    {
        return $this->accountFunding;
    }

    /**
     * Optional argument to define the text on bank statement. Notice the following about this argument:
     *  1. It only works for some acquirers. 2. Acquirers may have rigid rules on the content of the text
     *  on statement. Not complying to these rules will result in declined payments. 3) It is already
     *  possible to define custom text on statement using templating in the Reepay Administration.
     *  Contact support for help. We highly recommend to only supply this argument if absolutely necessary,
     *  and the templated default text on statement is not sufficient. Maximum length is 128, but most
     *  acquirers require a maximum length of 22 characters. Truncating will be applied if too long
     *  for specific acquirer. Characters must match regex [\x20-\x7F]
     *
     * @return string|null
     */
    public function getTextOnStatement(): ?string
    {
        return $this->textOnStatement;
    }

    /**
     * Optional reference for the transaction at the acquirer. Notice the following about this argument:
     *
     *  It only works for some acquirers.
     *  Acquirers may have rigid rules on the content of the acquirer reference.
     *  Not complying to these rules can result in declined payments.
     *  It is already possible to define custom acquirer reference using templating in the Reepay Administration.
     *  Contact support for help. We highly recommend to only supply this argument if absolutely necessary,
     *  and the templated default acquirer reference is not sufficient. Maximum length is 128,
     *  but most acquirers require a maximum length of 22 characters.
     *  Truncating will be applied if too long for specific acquirer.
     *  Characters must match regex [\x20-\x7F]
     *
     * @return string|null
     */
    public function getAcquirerReference(): ?string
    {
        return $this->acquirerReference;
    }

    /**
     * Phone number to use for payment methods able to use a prefilled phone number. E.g. MobilePay,
     *  Vipps and Swish. If no explicit phone number is defined, the phone number for the customer entity
     *  will be used
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * Handle for existing invoice to charge. Either this argument must be provided or order
     *
     * @return string|null
     */
    public function getInvoice(): ?string
    {
        return $this->invoice;
    }

    /**
     * Optional locale for session. E.g. en_GB, da_DK, es_ES. Defaults to configuration locale or account locale
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * If checkout is opened in separate window the customer will be directed to this page after success
     *
     * @return string|null
     */
    public function getAcceptUrl(): ?string
    {
        return $this->acceptUrl;
    }

    /**
     * Optional list of agreement ids to filter which agreements will be used for card payments
     *
     * @return array|null
     */
    public function getAgreementFilter(): ?array
    {
        return $this->agreementFilter;
    }

    /**
     * Optional IP address to restrict the use of the session to
     *
     * @return string|null
     */
    public function getAllowedIp(): ?string
    {
        return $this->allowedIp;
    }

    /**
     * Optional alternative button text. Maximum length 32 characters
     *
     * @return string|null
     */
    public function getButtonText(): ?string
    {
        return $this->buttonText;
    }

    /**
     * If checkout is opened in separate window the customer will be directed to this page if the customer cancels
     *
     * @return string|null
     */
    public function getCancelUrl(): ?string
    {
        return $this->cancelUrl;
    }

    /**
     * Reference to existing card payment method (ca_xxx) to use instead of having cardholder enter card data.
     *  CVV may still be required from cardholder
     *
     * @return string|null
     */
    public function getCardOnFile(): ?string
    {
        return $this->cardOnFile;
    }

    /**
     * Require cvv from cardholder for card-on-file
     *
     * @return bool|null
     */
    public function getCardOnFileRequireCvv(): ?bool
    {
        return $this->cardOnFileRequireCvv;
    }

    /**
     * Require expiration date for card-on-file
     *
     * @return bool|null
     */
    public function getCardOnFileRequireExpDate(): ?bool
    {
        return $this->cardOnFileRequireExpDate;
    }

    /**
     * Optional handle for a checkout configuration defined in the admin app to be used for this session
     *
     * @return string|null
     */
    public function getConfiguration(): ?string
    {
        return $this->configuration;
    }

    /**
     * Optional list of offline agreement handles to filter which options are shown to the consumer
     *
     * @return array|null
     */
    public function getOfflineAgreementFilter(): ?array
    {
        return $this->offlineAgreementFilter;
    }

    /**
     * Object defining order details such as amount, currency and order text
     *
     * @return OrderModel|null
     */
    public function getOrder(): ?OrderModel
    {
        return $this->order;
    }

    /**
     * Optional list of payment methods to use for the checkout session. Format:
     *  <payment_methods> = list of <payment_method>
     *  <payment_method> = [sca-|nosca-]<payment_name>
     *  <payment_name> = The id of payment method, e.g. dankort
     *  See https://optimize-docs.billwerk.com/docs/checkout-payment-methods for full documentation
     *
     * @return array|null
     */
    public function getPaymentMethods(): ?array
    {
        return $this->paymentMethods;
    }

    /**
     * For cost based acquirer agreement selection this argument can be used to define the amount used
     *  in calculating the least expensive agreement for future recurring payments. Can only be used
     *  for sessions saving a payment method for later use. Must be given in minor unit for currency
     *
     * @return int|null
     */
    public function getRecurringAverageAmount(): ?int
    {
        return $this->recurringAverageAmount;
    }

    /**
     * Option to show a checkbox for reusable payment methods to allow the customer to select to save
     *  the payment method or not. If set to true the checkbox will be checked by default and vice versa.
     *  If the customer chooses to save the payment method, the payment_method parameter will be returned.
     *  Cannot be used in conjunction with recurring
     *
     * @return bool|null
     */
    public function getRecurringOptional(): ?bool
    {
        return $this->recurringOptional;
    }

    /**
     * Optional alternative text to show if the recurring_optional option is used
     *
     * @return string|null
     */
    public function getRecurringOptionalText(): ?string
    {
        return $this->recurringOptionalText;
    }

    /**
     * Customer data used in strong customer authentication to reduce the need for a lengthy authentication
     *  process and ensure less fraud. The data is not stored at Reepay and only used in the process of
     *  strong customer authentication. The data is used by card issuer to determine if a frictionless
     *  authentication flow can be used
     *
     * @return ScaDataModel|null
     */
    public function getScaData(): ?ScaDataModel
    {
        return $this->scaData;
    }

    /**
     * Object to define payment type specific parameters
     *
     * @return SessionDataModel|null
     */
    public function getSessionData(): ?SessionDataModel
    {
        return $this->sessionData;
    }

    /**
     * Optional time-to-live duration. The session will expire after the duration from creation, meaning that
     *  payment attempts cannot be initiated after this duration. Notice though, that payments initiated within
     *  the time-to-live duration might finish after the TTL E.g. MobilePay Online flows. The duration must be
     *  given in the following notation: PTxS - x seconds, PTxM - x minutes, PTxH - x hours or PxD - x days.
     *  E.g. PT3H (three hours). The default time-to-live is three months
     *
     * @return string|null
     */
    public function getTtl(): ?string
    {
        return $this->ttl;
    }

    /**
     * If set a recurring payment method is stored for the customer and a reference returned.
     *  This parameter if set to true will limit payment methods to those that are reusable. Cannot be
     *  used in conjunction with recurring_optional
     *
     * @param bool|null $recurring
     *
     * @return self
     */
    public function setRecurring(?bool $recurring): self
    {
        $this->recurring = $recurring;

        return $this;
    }

    /**
     * Optional reference given to the created payment method in case a recurring payment method is created
     *  by the session. Session id will be used by default if not defined. Max length 64 with allowable characters
     *  [a-zA-Z0-9_.-@]
     *
     * @param string|null $paymentMethodReference
     *
     * @return self
     */
    public function setPaymentMethodReference(?string $paymentMethodReference): self
    {
        $this->paymentMethodReference = $paymentMethodReference;

        return $this;
    }

    /**
     * Optional sender information required for Account Funding Transaction (AFT).
     *  If not provided when requesting account funding transaction with account_funding=true,
     *  information will be gathered from invoice billing address and customer
     *
     * @param AccountFundingInformationModel|null $accountFundingInformation
     *
     * @return self
     */
    public function setAccountFundingInformation(?AccountFundingInformationModel $accountFundingInformation): self
    {
        $this->accountFundingInformation = $accountFundingInformation;

        return $this;
    }

    /**
     * Indicates that Account Funding Transaction (AFT) is requested.
     *  It only can be used for instant settle (i.e. 'settle' = true)
     *
     * @param bool|null $accountFunding
     *
     * @return self
     */
    public function setAccountFunding(?bool $accountFunding): self
    {
        $this->accountFunding = $accountFunding;

        return $this;
    }

    /**
     * Optional argument to define the text on bank statement. Notice the following about this argument:
     *  1. It only works for some acquirers. 2. Acquirers may have rigid rules on the content of the text
     *  on statement. Not complying to these rules will result in declined payments. 3) It is already
     *  possible to define custom text on statement using templating in the Reepay Administration.
     *  Contact support for help. We highly recommend to only supply this argument if absolutely necessary,
     *  and the templated default text on statement is not sufficient. Maximum length is 128, but most
     *  acquirers require a maximum length of 22 characters. Truncating will be applied if too long
     *  for specific acquirer. Characters must match regex [\x20-\x7F]
     *
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
     * Whether or not to immediately settle (capture). Default is false. If not settled immediately
     *  an authorization will be performed which can be settled later. Normally this have to be done within
     *  7 days. Note that not all payment methods support immediate settle
     *
     * @param bool|null $settle
     *
     * @return self
     */
    public function setSettle(?bool $settle): self
    {
        $this->settle = $settle;

        return $this;
    }

    /**
     * Optional reference for the transaction at the acquirer. Notice the following about this argument:
     *
     *  It only works for some acquirers.
     *  Acquirers may have rigid rules on the content of the acquirer reference.
     *  Not complying to these rules can result in declined payments.
     *  It is already possible to define custom acquirer reference using templating in the Reepay Administration.
     *  Contact support for help. We highly recommend to only supply this argument if absolutely necessary,
     *  and the templated default acquirer reference is not sufficient. Maximum length is 128,
     *  but most acquirers require a maximum length of 22 characters.
     *  Truncating will be applied if too long for specific acquirer.
     *  Characters must match regex [\x20-\x7F]
     *
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
     * Phone number to use for payment methods able to use a prefilled phone number. E.g. MobilePay,
     *  Vipps and Swish. If no explicit phone number is defined, the phone number for the customer entity
     *  will be used
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
     * Handle for existing invoice to charge. Either this argument must be provided or order
     *
     * @param string|null $invoice
     *
     * @return self
     */
    public function setInvoice(?string $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Optional locale for session. E.g. en_GB, da_DK, es_ES. Defaults to configuration locale or account locale
     *
     * @param string|null $locale
     *
     * @return self
     */
    public function setLocale(?string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * If checkout is opened in separate window the customer will be directed to this page after success
     *
     * @param string|null $acceptUrl
     *
     * @return self
     */
    public function setAcceptUrl(?string $acceptUrl): self
    {
        $this->acceptUrl = $acceptUrl;

        return $this;
    }

    /**
     * Optional list of agreement ids to filter which agreements will be used for card payments
     *
     * @param array|null $agreementFilter
     *
     * @return self
     */
    public function setAgreementFilter(?array $agreementFilter): self
    {
        $this->agreementFilter = $agreementFilter;

        return $this;
    }

    /**
     * Optional IP address to restrict the use of the session to
     *
     * @param string|null $allowedIp
     *
     * @return self
     */
    public function setAllowedIp(?string $allowedIp): self
    {
        $this->allowedIp = $allowedIp;

        return $this;
    }

    /**
     * Optional alternative button text. Maximum length 32 characters
     *
     * @param string|null $buttonText
     *
     * @return self
     */
    public function setButtonText(?string $buttonText): self
    {
        $this->buttonText = $buttonText;

        return $this;
    }

    /**
     * If checkout is opened in separate window the customer will be directed to this page if the customer cancels
     *
     * @param string|null $cancelUrl
     *
     * @return self
     */
    public function setCancelUrl(?string $cancelUrl): self
    {
        $this->cancelUrl = $cancelUrl;

        return $this;
    }

    /**
     * Reference to existing card payment method (ca_xxx) to use instead of having cardholder enter card data.
     *  CVV may still be required from cardholder
     *
     * @param string|null $cardOnFile
     *
     * @return self
     */
    public function setCardOnFile(?string $cardOnFile): self
    {
        $this->cardOnFile = $cardOnFile;

        return $this;
    }

    /**
     * Require cvv from cardholder for card-on-file
     *
     * @param bool|null $cardOnFileRequireCvv
     *
     * @return self
     */
    public function setCardOnFileRequireCvv(?bool $cardOnFileRequireCvv): self
    {
        $this->cardOnFileRequireCvv = $cardOnFileRequireCvv;

        return $this;
    }

    /**
     * Require expiration date for card-on-file
     *
     * @param bool|null $cardOnFileRequireExpDate
     *
     * @return self
     */
    public function setCardOnFileRequireExpDate(?bool $cardOnFileRequireExpDate): self
    {
        $this->cardOnFileRequireExpDate = $cardOnFileRequireExpDate;

        return $this;
    }

    /**
     * Optional handle for a checkout configuration defined in the admin app to be used for this session
     *
     * @param string|null $configuration
     *
     * @return self
     */
    public function setConfiguration(?string $configuration): self
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * Optional list of offline agreement handles to filter which options are shown to the consumer
     *
     * @param array|null $offlineAgreementFilter
     *
     * @return self
     */
    public function setOfflineAgreementFilter(?array $offlineAgreementFilter): self
    {
        $this->offlineAgreementFilter = $offlineAgreementFilter;

        return $this;
    }

    /**
     * Object defining order details such as amount, currency and order text
     *
     * @param OrderModel|null $order
     *
     * @return self
     */
    public function setOrder(?OrderModel $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Optional list of payment methods to use for the checkout session. Format:
     *  <payment_methods> = list of <payment_method>
     *  <payment_method> = [sca-|nosca-]<payment_name>
     *  <payment_name> = The id of payment method, e.g. dankort
     *  See https://optimize-docs.billwerk.com/docs/checkout-payment-methods for full documentation
     *
     * @param array|null $paymentMethods
     *
     * @return self
     */
    public function setPaymentMethods(?array $paymentMethods): self
    {
        $this->paymentMethods = $paymentMethods;

        return $this;
    }

    /**
     * For cost based acquirer agreement selection this argument can be used to define the amount used
     *  in calculating the least expensive agreement for future recurring payments. Can only be used
     *  for sessions saving a payment method for later use. Must be given in minor unit for currency
     *
     * @param int|null $recurringAverageAmount
     *
     * @return self
     */
    public function setRecurringAverageAmount(?int $recurringAverageAmount): self
    {
        $this->recurringAverageAmount = $recurringAverageAmount;

        return $this;
    }

    /**
     * Option to show a checkbox for reusable payment methods to allow the customer to select to save
     *  the payment method or not. If set to true the checkbox will be checked by default and vice versa.
     *  If the customer chooses to save the payment method, the payment_method parameter will be returned.
     *  Cannot be used in conjunction with recurring
     *
     * @param bool|null $recurringOptional
     *
     * @return self
     */
    public function setRecurringOptional(?bool $recurringOptional): self
    {
        $this->recurringOptional = $recurringOptional;

        return $this;
    }

    /**
     * Optional alternative text to show if the recurring_optional option is used
     *
     * @param string|null $recurringOptionalText
     *
     * @return self
     */
    public function setRecurringOptionalText(?string $recurringOptionalText): self
    {
        $this->recurringOptionalText = $recurringOptionalText;

        return $this;
    }

    /**
     * Customer data used in strong customer authentication to reduce the need for a lengthy authentication
     *  process and ensure less fraud. The data is not stored at Reepay and only used in the process of
     *  strong customer authentication. The data is used by card issuer to determine if a frictionless
     *  authentication flow can be used
     *
     * @param ScaDataModel|null $scaData
     *
     * @return self
     */
    public function setScaData(?ScaDataModel $scaData): self
    {
        $this->scaData = $scaData;

        return $this;
    }

    /**
     * Object to define payment type specific parameters
     *
     * @param SessionDataModel|null $sessionData
     *
     * @return self
     */
    public function setSessionData(?SessionDataModel $sessionData): self
    {
        $this->sessionData = $sessionData;

        return $this;
    }

    /**
     * Optional time-to-live duration. The session will expire after the duration from creation, meaning that
     *  payment attempts cannot be initiated after this duration. Notice though, that payments initiated within
     *  the time-to-live duration might finish after the TTL E.g. MobilePay Online flows. The duration must be
     *  given in the following notation: PTxS - x seconds, PTxM - x minutes, PTxH - x hours or PxD - x days.
     *  E.g. PT3H (three hours). The default time-to-live is three months
     *
     * @param string|null $ttl
     *
     * @return self
     */
    public function setTtl(?string $ttl): self
    {
        $this->ttl = $ttl;

        return $this;
    }

    /**
     * @param array $response
     *
     * @return self
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        if (isset($response['configuration'])) {
            $model->setConfiguration($response['configuration']);
        }

        if (isset($response['locale'])) {
            $model->setLocale($response['locale']);
        }

        if (isset($response['ttl'])) {
            $model->setTtl($response['ttl']);
        }

        if (isset($response['phone'])) {
            $model->setPhone($response['phone']);
        }

        if (isset($response['invoice'])) {
            $model->setInvoice($response['invoice']);
        }

        if (isset($response['settle'])) {
            $model->setSettle($response['settle']);
        }

        if (isset($response['order'])) {
            $model->setOrder(OrderModel::fromArray($response['order']));
        }

        if (isset($response['recurring'])) {
            $model->setRecurring($response['recurring']);
        }

        if (isset($response['accept_url'])) {
            $model->setAcceptUrl($response['accept_url']);
        }

        if (isset($response['cancel_url'])) {
            $model->setCancelUrl($response['cancel_url']);
        }

        if (isset($response['payment_methods'])) {
            $model->setPaymentMethods($response['payment_methods']);
        }

        if (isset($response['card_on_file'])) {
            $model->setCardOnFile($response['card_on_file']);
        }

        if (isset($response['card_on_file_require_cvv'])) {
            $model->setCardOnFileRequireCvv($response['card_on_file_require_cvv']);
        }

        if (isset($response['card_on_file_require_exp_date'])) {
            $model->setCardOnFileRequireExpDate($response['card_on_file_require_exp_date']);
        }

        if (isset($response['button_text'])) {
            $model->setButtonText($response['button_text']);
        }

        if (isset($response['recurring_average_amount'])) {
            $model->setRecurringAverageAmount($response['recurring_average_amount']);
        }

        if (isset($response['sca_data'])) {
            $model->setScaData(ScaDataModel::fromArray($response['sca_data']));
        }

        if (isset($response['session_data'])) {
            $model->setSessionData(SessionDataModel::fromArray($response['session_data']));
        }

        if (isset($response['payment_method_reference'])) {
            $model->setPaymentMethodReference($response['payment_method_reference']);
        }

        if (isset($response['account_funding'])) {
            $model->setAccountFunding($response['account_funding']);
        }

        if (isset($response['account_funding_information'])) {
            $model->setAccountFundingInformation(
                AccountFundingInformationModel::fromArray($response['account_funding_information'])
            );
        }

        if (isset($response['agreement_filter'])) {
            $model->setAgreementFilter($response['agreement_filter']);
        }

        if (isset($response['offline_agreement_filter'])) {
            $model->setOfflineAgreementFilter($response['offline_agreement_filter']);
        }

        if (isset($response['allowed_ip'])) {
            $model->setAllowedIp($response['allowed_ip']);
        }

        if (isset($response['text_on_statement'])) {
            $model->setTextOnStatement($response['text_on_statement']);
        }

        if (isset($response['acquirer_reference'])) {
            $model->setAcquirerReference($response['acquirer_reference']);
        }

        if (isset($response['recurring_optional'])) {
            $model->setRecurringOptional($response['recurring_optional']);
        }

        if (isset($response['recurring_optional_text'])) {
            $model->setRecurringOptionalText($response['recurring_optional_text']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'configuration' => $this->getConfiguration(),
            'locale' => $this->getLocale(),
            'ttl' => $this->getTtl(),
            'phone' => $this->getPhone(),
            'invoice' => $this->getInvoice(),
            'settle' => $this->getSettle(),
            'order' => $this->getOrder() ? $this->getOrder()->toArray() : null,
            'recurring' => $this->getRecurring(),
            'accept_url' => $this->getAcceptUrl(),
            'cancel_url' => $this->getCancelUrl(),
            'payment_methods' => $this->getPaymentMethods(),
            'card_on_file' => $this->getCardOnFile(),
            'card_on_file_require_cvv' => $this->getCardOnFileRequireCvv(),
            'card_on_file_require_exp_date' => $this->getCardOnFileRequireExpDate(),
            'button_text' => $this->getButtonText(),
            'recurring_average_amount' => $this->getRecurringAverageAmount(),
            'sca_data' => $this->getScaData() ? $this->getScaData()->toArray() : null,
            'session_data' => $this->getSessionData() ? $this->getSessionData()->toArray() : null,
            'payment_method_reference' => $this->getPaymentMethodReference(),
            'account_funding' => $this->getAccountFunding(),
            'account_funding_information' =>
                $this->getAccountFundingInformation() ? $this->getAccountFundingInformation()->toArray() : null,
            'agreement_filter' => $this->getAgreementFilter(),
            'offline_agreement_filter' => $this->getOfflineAgreementFilter(),
            'allowed_ip' => $this->getAllowedIp(),
            'text_on_statement' => $this->getTextOnStatement(),
            'acquirer_reference' => $this->getAcquirerReference(),
            'recurring_optional' => $this->getRecurringOptional(),
            'recurring_optional_text' => $this->getRecurringOptionalText(),
        ], function ($value) {
            return $value !== null;
        });
    }


    public function toApi(): array
    {
        return $this->toArray();
    }
}
