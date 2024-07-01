<?php

namespace Billwerk\Sdk\Model\Invoice;

use Billwerk\Sdk\Enum\InvoiceStateEnum;
use Billwerk\Sdk\Enum\InvoiceTypeEnum;
use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\AddressModel;
use Billwerk\Sdk\Model\CreditNoteModel;
use Billwerk\Sdk\Model\HasIdInterface;
use Billwerk\Sdk\Model\Transaction\TransactionModel;
use DateTime;
use Exception;

/**
 * Invoice
 *
 * @see https://optimize-docs.billwerk.com/reference/getinvoice
 *
 * @package Billwerk\Sdk\Model\Invoice
 */
class InvoiceModel extends AbstractModel implements HasIdInterface
{
    /**
     * Invoice id assigned by Reepay
     *
     * @var string $id
     */
    protected string $id;

    /**
     * Per account unique handle. Provided at on-demand invoice/charge creation or set to inv-<invoice_number>
     * for automatically created subscription invoices
     *
     * @var string $handle
     */
    protected string $handle;

    /**
     * Customer handle
     *
     * @var string $customer
     */
    protected string $customer;

    /**
     * Subscription handle, will be null for a one-time customer invoice
     *
     * @var string|null $subscription
     */
    protected ?string $subscription = null;

    /**
     * Subscription plan handle for the plan used to automatically create the invoice or the case that
     * an on-demand subscription invoice has been created that should include a plan order line
     *
     * @var string|null $plan
     */
    protected ?string $plan = null;

    /**
     * The invoice state one of the following: created, pending, dunning, settled, cancelled, authorized, failed
     *
     * @see InvoiceStateEnum
     * @var string $state
     */
    protected string $state;

    /**
     * For asynchronous payment methods, e.g. MobilePay subscriptions, this flag indicates that an invoice
     * transaction is in state processing and is awaiting result
     *
     * @var bool $processing
     */
    protected ?bool $processing = null;

    /**
     * The type of invoice: s - subscription recurring, so - subscription one-time, soi - subscription one-time instant,
     * co - customer one-time, ch - charge
     *
     * @see InvoiceTypeEnum
     * @var string $type
     */
    protected string $type;

    /**
     * The invoice amount including VAT
     *
     * @var int $amount
     */
    protected int $amount;

    /**
     * Sequential invoice number. Only present for subscription and customer invoices
     *
     * @var int|null $number
     */
    protected ?int $number = null;

    /**
     * Invoice currency in ISO 4217 three letter alpha code
     *
     * @var string $currency
     */
    protected string $currency;

    /**
     * When is the invoice due, in ISO-8601 extended offset date-time format
     *
     * @var DateTime $due
     */
    protected DateTime $due;

    /**
     * When the invoice failed, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $failed
     */
    protected ?DateTime $failed = null;

    /**
     * When the invoice settled, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $settled
     */
    protected ?DateTime $settled = null;

    /**
     * When the invoice was cancelled, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $cancelled
     */
    protected ?DateTime $cancelled = null;

    /**
     * When the invoice was authorized, if the invoice went through an authorize and
     * settle flow, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $authorized
     */
    protected ?DateTime $authorized = null;

    /**
     * Credits applied to invoice
     *
     * @var CreditModel[] $credits
     */
    protected array $credits;

    /**
     * When the invoice was created, in ISO-8601 extended offset date-time format
     *
     * @var DateTime
     */
    protected DateTime $created;

    /**
     * Subscription plan version
     *
     * @var int|null $planVersion
     */
    protected ?int $planVersion = null;

    /**
     * Dunning plan handle
     *
     * @var string|null $dunningPlan
     */
    protected ?string $dunningPlan = null;

    /**
     * The potential discount amount deducted from the invoice amount including VAT
     *
     * @var int $discountAmount
     */
    protected int $discountAmount;

    /**
     * The invoice original amount including VAT, may differ from amount if adjustments
     * have been applied for the invoice
     *
     * @var int $orgAmount
     */
    protected int $orgAmount;

    /**
     * The invoice vat amount calculated as rounded summed fractional vats for each orderline
     *
     * @var int $amountVat
     */
    protected int $amountVat;

    /**
     * The invoice amount without vat
     *
     * @var int $amountExVat
     */
    protected int $amountExVat;

    /**
     * Settled amount
     *
     * @var int $settledAmount
     */
    protected int $settledAmount;

    /**
     * Refunded amount
     *
     * @var int $refundedAmount
     */
    protected int $refundedAmount;

    /**
     * Authorized amount
     *
     * @var int|null $authorizedAmount
     */
    protected ?int $authorizedAmount = null;

    /**
     * Credited amount
     *
     * @var int|null $creditedAmount
     */
    protected ?int $creditedAmount = null;

    /**
     * The subscription period this invoice is for
     *
     * @var int|null $periodNumber
     */
    protected ?int $periodNumber = null;

    /**
     * Optional reference to recurring payment method created in conjunction with charging
     *
     * @var string|null $recurringPaymentMethod
     */
    protected ?string $recurringPaymentMethod = null;

    /**
     * Order lines for invoice sorted by descending timestamp
     *
     * @var OrderLineModel[]
     */
    protected array $orderLines;

    /**
     * Additional cost handles for any additional costs added to this invoice
     *
     * @var string[] $additionalCosts
     */
    protected array $additionalCosts;

    /**
     * Invoice transactions
     *
     * @var TransactionModel[] $transactions
     */
    protected array $transactions;

    /**
     * When dunning for the invoice was started, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $dunningStart
     */
    protected ?DateTime $dunningStart = null;

    /**
     * Number of dunning events for invoice (number of reminders sent)
     *
     * @var int|null $dunningCount
     */
    protected ?int $dunningCount = null;

    /**
     * When dunning for the invoice expired, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $dunningExpired
     */
    protected ?DateTime $dunningExpired = null;

    /**
     * The start of billing period if the invoice is for a specific billing period,
     * in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $periodFrom
     */
    protected ?DateTime $periodFrom = null;

    /**
     * The end of billing period if the invoice is for a specific billing period,
     * in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $periodTo
     */
    protected ?DateTime $periodTo = null;

    /**
     * Whether this is a customer one-time invoice that will be settled later
     *
     * @var bool|null $settleLater
     */
    protected ?bool $settleLater = null;

    /**
     * The payment method to use for a later settle of a one-time customer invoice
     *
     * @var string|null $settleLaterPaymentMethod
     */
    protected ?string $settleLaterPaymentMethod = null;

    /**
     * Optional billing address
     *
     * @var AddressModel|null $billingAddress
     */
    protected ?AddressModel $billingAddress = null;

    /**
     * Optional shipping address
     *
     * @var AddressModel|null $shippingAddress
     */
    protected ?AddressModel $shippingAddress = null;

    /**
     * Invoice accounting number
     *
     * @var string|null $accountingNumber
     */
    protected ?string $accountingNumber = null;

    /**
     * Customer debtor id
     *
     * @var int|null $debtorId
     */
    protected ?int $debtorId = null;

    /**
     * Url to invoice pdf
     *
     * @var string|null $downloadUrl
     */
    protected ?string $downloadUrl = null;

    /**
     * When the accounting invoice was created. An accounting invoice is created when
     * a non-charging invoice is created with the state pending or the invoice moved
     * from state created. Timestamp in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $accountingCreatedDate
     */
    protected ?DateTime $accountingCreatedDate = null;

    /**
     * Invoice credit notes
     *
     * @var array|null $creditNotes
     */
    protected ?array $creditNotes = null;

    /**
     * The end of billing period if the invoice is for a specific billing period,
     *  in ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getPeriodTo(): ?DateTime
    {
        return $this->periodTo;
    }

    /**
     * The start of billing period if the invoice is for a specific billing period,
     *  in ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getPeriodFrom(): ?DateTime
    {
        return $this->periodFrom;
    }

    /**
     * The invoice vat amount calculated as rounded summed fractional vats for each orderline
     *
     * @return int
     */
    public function getAmountVat(): int
    {
        return $this->amountVat;
    }

    /**
     * The invoice amount without vat
     *
     * @return int
     */
    public function getAmountExVat(): int
    {
        return $this->amountExVat;
    }

    /**
     * Invoice id assigned by Reepay
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The invoice amount including VAT
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Optional reference to recurring payment method created in conjunction with charging
     *
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * Per account unique handle. Provided at on-demand invoice/charge creation or set to inv-<invoice_number>
     *  for automatically created subscription invoices
     *
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * Invoice currency in ISO 4217 three letter alpha code
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * The invoice state one of the following: created, pending, dunning, settled, cancelled, authorized, failed
     *
     * @see InvoiceStateEnum
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * When the invoice failed, in ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getFailed(): ?DateTime
    {
        return $this->failed;
    }

    /**
     * Customer handle
     *
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * When the accounting invoice was created. An accounting invoice is created when
     *  a non-charging invoice is created with the state pending or the invoice moved
     *  from state created. Timestamp in ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getAccountingCreatedDate(): ?DateTime
    {
        return $this->accountingCreatedDate;
    }

    /**
     * Invoice accounting number
     *
     * @return string|null
     */
    public function getAccountingNumber(): ?string
    {
        return $this->accountingNumber;
    }

    /**
     * Additional cost handles for any additional costs added to this invoice
     *
     * @return array
     */
    public function getAdditionalCosts(): array
    {
        return $this->additionalCosts;
    }

    /**
     * When the invoice was authorized, if the invoice went through an authorize and
     *  settle flow, in ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getAuthorized(): ?DateTime
    {
        return $this->authorized;
    }

    /**
     * Authorized amount
     *
     * @return int|null
     */
    public function getAuthorizedAmount(): ?int
    {
        return $this->authorizedAmount;
    }

    /**
     * Optional billing address
     *
     * @return AddressModel|null
     */
    public function getBillingAddress(): ?AddressModel
    {
        return $this->billingAddress;
    }

    /**
     * When the invoice was cancelled, in ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getCancelled(): ?DateTime
    {
        return $this->cancelled;
    }

    /**
     * Credited amount
     *
     * @return int|null
     */
    public function getCreditedAmount(): ?int
    {
        return $this->creditedAmount;
    }

    /**
     * Invoice credit notes
     *
     * @return CreditNoteModel[]|null
     */
    public function getCreditNotes(): ?array
    {
        return $this->creditNotes;
    }

    /**
     * Credits applied to invoice
     *
     * @return CreditModel[]
     */
    public function getCredits(): array
    {
        return $this->credits;
    }

    /**
     * Customer debtor id
     *
     * @return int|null
     */
    public function getDebtorId(): ?int
    {
        return $this->debtorId;
    }

    /**
     * The potential discount amount deducted from the invoice amount including VAT
     *
     * @return int
     */
    public function getDiscountAmount(): int
    {
        return $this->discountAmount;
    }

    /**
     * Url to invoice pdf
     *
     * @return string|null
     */
    public function getDownloadUrl(): ?string
    {
        return $this->downloadUrl;
    }

    /**
     * When is the invoice due, in ISO-8601 extended offset date-time format
     *
     * @return DateTime
     */
    public function getDue(): DateTime
    {
        return $this->due;
    }

    /**
     * Number of dunning events for invoice (number of reminders sent)
     *
     * @return int|null
     */
    public function getDunningCount(): ?int
    {
        return $this->dunningCount;
    }

    /**
     * When dunning for the invoice expired, in ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getDunningExpired(): ?DateTime
    {
        return $this->dunningExpired;
    }

    /**
     * Dunning plan handle
     *
     * @return string|null
     */
    public function getDunningPlan(): ?string
    {
        return $this->dunningPlan;
    }

    /**
     * When dunning for the invoice was started, in ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getDunningStart(): ?DateTime
    {
        return $this->dunningStart;
    }

    /**
     * Sequential invoice number. Only present for subscription and customer invoices
     *
     * @return int|null
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * Order lines for invoice sorted by descending timestamp
     *
     * @return array
     */
    public function getOrderLines(): array
    {
        return $this->orderLines;
    }

    /**
     * The invoice original amount including VAT, may differ from amount if adjustments
     *  have been applied for the invoice
     *
     * @return int
     */
    public function getOrgAmount(): int
    {
        return $this->orgAmount;
    }

    /**
     * The subscription period this invoice is for
     *
     * @return int|null
     */
    public function getPeriodNumber(): ?int
    {
        return $this->periodNumber;
    }

    /**
     * Subscription plan handle for the plan used to automatically create the invoice or the case that
     *  an on-demand subscription invoice has been created that should include a plan order line
     *
     * @return string|null
     */
    public function getPlan(): ?string
    {
        return $this->plan;
    }

    /**
     * Subscription plan version
     *
     * @return int|null
     */
    public function getPlanVersion(): ?int
    {
        return $this->planVersion;
    }

    /**
     * For asynchronous payment methods, e.g. MobilePay subscriptions, this flag indicates that an invoice
     *  transaction is in state processing and is awaiting result
     *
     * @return bool|null
     */
    public function getProcessing(): ?bool
    {
        return $this->processing;
    }

    /**
     * Optional reference to recurring payment method created in conjunction with charging
     *
     * @return string|null
     */
    public function getRecurringPaymentMethod(): ?string
    {
        return $this->recurringPaymentMethod;
    }

    /**
     * Refunded amount
     *
     * @return int
     */
    public function getRefundedAmount(): int
    {
        return $this->refundedAmount;
    }

    /**
     * When the invoice settled, in ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getSettled(): ?DateTime
    {
        return $this->settled;
    }

    /**
     * Settled amount
     *
     * @return int
     */
    public function getSettledAmount(): int
    {
        return $this->settledAmount;
    }

    /**
     * Whether this is a customer one-time invoice that will be settled later
     *
     * @return bool|null
     */
    public function getSettleLater(): ?bool
    {
        return $this->settleLater;
    }

    /**
     * The payment method to use for a later settle of a one-time customer invoice
     *
     * @return string|null
     */
    public function getSettleLaterPaymentMethod(): ?string
    {
        return $this->settleLaterPaymentMethod;
    }

    /**
     * Optional shipping address
     *
     * @return AddressModel|null
     */
    public function getShippingAddress(): ?AddressModel
    {
        return $this->shippingAddress;
    }

    /**
     * Subscription handle, will be null for a one-time customer invoice
     *
     * @return string|null
     */
    public function getSubscription(): ?string
    {
        return $this->subscription;
    }

    /**
     * Invoice transactions
     *
     * @return array
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * The type of invoice: s - subscription recurring, so - subscription one-time, soi - subscription one-time instant,
     *  co - customer one-time, ch - charge
     *
     * @see InvoiceTypeEnum
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The end of billing period if the invoice is for a specific billing period,
     *  in ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $periodTo
     *
     * @return InvoiceModel
     */
    public function setPeriodTo(?DateTime $periodTo): self
    {
        $this->periodTo = $periodTo;

        return $this;
    }

    /**
     * The start of billing period if the invoice is for a specific billing period,
     *  in ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $periodFrom
     *
     * @return InvoiceModel
     */
    public function setPeriodFrom(?DateTime $periodFrom): self
    {
        $this->periodFrom = $periodFrom;

        return $this;
    }

    /**
     * The invoice vat amount calculated as rounded summed fractional vats for each orderline
     *
     * @param int $amountVat
     *
     * @return InvoiceModel
     */
    public function setAmountVat(int $amountVat): self
    {
        $this->amountVat = $amountVat;

        return $this;
    }

    /**
     * The invoice amount without vat
     *
     * @param int $amountExVat
     *
     * @return InvoiceModel
     */
    public function setAmountExVat(int $amountExVat): self
    {
        $this->amountExVat = $amountExVat;

        return $this;
    }

    /**
     * Invoice id assigned by Reepay
     *
     * @param string $id
     *
     * @return InvoiceModel
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * The invoice amount including VAT
     *
     * @param int $amount
     *
     * @return InvoiceModel
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Optional reference to recurring payment method created in conjunction with charging
     *
     * @param DateTime $created
     *
     * @return InvoiceModel
     */
    public function setCreated(DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Per account unique handle. Provided at on-demand invoice/charge creation or set to inv-<invoice_number>
     *  for automatically created subscription invoices
     *
     * @param string $handle
     *
     * @return InvoiceModel
     */
    public function setHandle(string $handle): self
    {
        $this->handle = $handle;

        return $this;
    }

    /**
     * Invoice currency in ISO 4217 three letter alpha code
     *
     * @param string $currency
     *
     * @return InvoiceModel
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * The invoice state one of the following: created, pending, dunning, settled, cancelled, authorized, failed
     *
     * @see InvoiceStateEnum
     *
     * @param string $state
     *
     * @return InvoiceModel
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * When the invoice failed, in ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $failed
     *
     * @return InvoiceModel
     */
    public function setFailed(?DateTime $failed): self
    {
        $this->failed = $failed;

        return $this;
    }

    /**
     * Customer handle
     *
     * @param string $customer
     *
     * @return InvoiceModel
     */
    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * When the accounting invoice was created. An accounting invoice is created when
     *  a non-charging invoice is created with the state pending or the invoice moved
     *  from state created. Timestamp in ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $accountingCreatedDate
     *
     * @return InvoiceModel
     */
    public function setAccountingCreatedDate(?DateTime $accountingCreatedDate): self
    {
        $this->accountingCreatedDate = $accountingCreatedDate;

        return $this;
    }

    /**
     * Invoice accounting number
     *
     * @param string|null $accountingNumber
     *
     * @return InvoiceModel
     */
    public function setAccountingNumber(?string $accountingNumber): self
    {
        $this->accountingNumber = $accountingNumber;

        return $this;
    }

    /**
     * Additional cost handles for any additional costs added to this invoice
     *
     * @param array $additionalCosts
     *
     * @return InvoiceModel
     */
    public function setAdditionalCosts(array $additionalCosts): self
    {
        $this->additionalCosts = $additionalCosts;

        return $this;
    }

    /**
     * When the invoice was authorized, if the invoice went through an authorize and
     *  settle flow, in ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $authorized
     *
     * @return InvoiceModel
     */
    public function setAuthorized(?DateTime $authorized): self
    {
        $this->authorized = $authorized;

        return $this;
    }

    /**
     * Authorized amount
     *
     * @param int|null $authorizedAmount
     *
     * @return InvoiceModel
     */
    public function setAuthorizedAmount(?int $authorizedAmount): self
    {
        $this->authorizedAmount = $authorizedAmount;

        return $this;
    }

    /**
     * Optional billing address
     *
     * @param AddressModel|null $billingAddress
     *
     * @return InvoiceModel
     */
    public function setBillingAddress(?AddressModel $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * When the invoice was cancelled, in ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $cancelled
     *
     * @return InvoiceModel
     */
    public function setCancelled(?DateTime $cancelled): self
    {
        $this->cancelled = $cancelled;

        return $this;
    }

    /**
     * Credited amount
     *
     * @param int|null $creditedAmount
     *
     * @return InvoiceModel
     */
    public function setCreditedAmount(?int $creditedAmount): self
    {
        $this->creditedAmount = $creditedAmount;

        return $this;
    }

    /**
     * Invoice credit notes
     *
     * @param CreditNoteModel[]|null $creditNotes
     *
     * @return InvoiceModel
     */
    public function setCreditNotes(?array $creditNotes): self
    {
        $this->creditNotes = $creditNotes;

        return $this;
    }

    /**
     * Credits applied to invoice
     *
     * @param CreditModel[] $credits
     *
     * @return InvoiceModel
     */
    public function setCredits(array $credits): self
    {
        $this->credits = $credits;

        return $this;
    }

    /**
     * Customer debtor id
     *
     * @param int|null $debtorId
     *
     * @return InvoiceModel
     */
    public function setDebtorId(?int $debtorId): self
    {
        $this->debtorId = $debtorId;

        return $this;
    }

    /**
     * The potential discount amount deducted from the invoice amount including VAT
     *
     * @param int $discountAmount
     *
     * @return InvoiceModel
     */
    public function setDiscountAmount(int $discountAmount): self
    {
        $this->discountAmount = $discountAmount;

        return $this;
    }

    /**
     * Url to invoice pdf
     *
     * @param string|null $downloadUrl
     *
     * @return InvoiceModel
     */
    public function setDownloadUrl(?string $downloadUrl): self
    {
        $this->downloadUrl = $downloadUrl;

        return $this;
    }

    /**
     * When is the invoice due, in ISO-8601 extended offset date-time format
     *
     * @param DateTime $due
     *
     * @return InvoiceModel
     */
    public function setDue(DateTime $due): self
    {
        $this->due = $due;

        return $this;
    }

    /**
     * Number of dunning events for invoice (number of reminders sent)
     *
     * @param int|null $dunningCount
     *
     * @return InvoiceModel
     */
    public function setDunningCount(?int $dunningCount): self
    {
        $this->dunningCount = $dunningCount;

        return $this;
    }

    /**
     * When dunning for the invoice expired, in ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $dunningExpired
     *
     * @return InvoiceModel
     */
    public function setDunningExpired(?DateTime $dunningExpired): self
    {
        $this->dunningExpired = $dunningExpired;

        return $this;
    }

    /**
     * Dunning plan handle
     *
     * @param string|null $dunningPlan
     *
     * @return InvoiceModel
     */
    public function setDunningPlan(?string $dunningPlan): self
    {
        $this->dunningPlan = $dunningPlan;

        return $this;
    }

    /**
     * When dunning for the invoice was started, in ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $dunningStart
     *
     * @return InvoiceModel
     */
    public function setDunningStart(?DateTime $dunningStart): self
    {
        $this->dunningStart = $dunningStart;

        return $this;
    }

    /**
     * Sequential invoice number. Only present for subscription and customer invoices
     *
     * @param int|null $number
     *
     * @return InvoiceModel
     */
    public function setNumber(?int $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Order lines for invoice sorted by descending timestamp
     *
     * @param array $orderLines
     *
     * @return InvoiceModel
     */
    public function setOrderLines(array $orderLines): self
    {
        $this->orderLines = $orderLines;

        return $this;
    }

    /**
     * Invoice transactions
     *
     * @param array $transactions
     *
     * @return InvoiceModel
     */
    public function setTransactions(array $transactions): self
    {
        $this->transactions = $transactions;

        return $this;
    }

    /**
     * The invoice original amount including VAT, may differ from amount if adjustments
     *  have been applied for the invoice
     *
     * @param int $orgAmount
     *
     * @return InvoiceModel
     */
    public function setOrgAmount(int $orgAmount): self
    {
        $this->orgAmount = $orgAmount;

        return $this;
    }

    /**
     * The subscription period this invoice is for
     *
     * @param int|null $periodNumber
     *
     * @return self
     */
    public function setPeriodNumber(?int $periodNumber): self
    {
        $this->periodNumber = $periodNumber;

        return $this;
    }

    /**
     * Subscription plan handle for the plan used to automatically create the invoice or the case that
     *  an on-demand subscription invoice has been created that should include a plan order line
     *
     * @param string|null $plan
     *
     * @return InvoiceModel
     */
    public function setPlan(?string $plan): self
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Subscription plan version
     *
     * @param int|null $planVersion
     *
     * @return InvoiceModel
     */
    public function setPlanVersion(?int $planVersion): self
    {
        $this->planVersion = $planVersion;

        return $this;
    }

    /**
     * For asynchronous payment methods, e.g. MobilePay subscriptions, this flag indicates that an invoice
     *  transaction is in state processing and is awaiting result
     *
     * @param bool|null $processing
     *
     * @return InvoiceModel
     */
    public function setProcessing(?bool $processing): self
    {
        $this->processing = $processing;

        return $this;
    }

    /**
     * Optional reference to recurring payment method created in conjunction with charging
     *
     * @param string|null $recurringPaymentMethod
     *
     * @return InvoiceModel
     */
    public function setRecurringPaymentMethod(?string $recurringPaymentMethod): self
    {
        $this->recurringPaymentMethod = $recurringPaymentMethod;

        return $this;
    }

    /**
     * Refunded amount
     *
     * @param int $refundedAmount
     *
     * @return InvoiceModel
     */
    public function setRefundedAmount(int $refundedAmount): self
    {
        $this->refundedAmount = $refundedAmount;

        return $this;
    }

    /**
     * When the invoice settled, in ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $settled
     *
     * @return InvoiceModel
     */
    public function setSettled(?DateTime $settled): self
    {
        $this->settled = $settled;

        return $this;
    }

    /**
     * Settled amount
     *
     * @param int $settledAmount
     *
     * @return InvoiceModel
     */
    public function setSettledAmount(int $settledAmount): self
    {
        $this->settledAmount = $settledAmount;

        return $this;
    }

    /**
     * Whether this is a customer one-time invoice that will be settled later
     *
     * @param bool|null $settleLater
     *
     * @return InvoiceModel
     */
    public function setSettleLater(?bool $settleLater): self
    {
        $this->settleLater = $settleLater;

        return $this;
    }

    /**
     * The payment method to use for a later settle of a one-time customer invoice
     *
     * @param string|null $settleLaterPaymentMethod
     *
     * @return InvoiceModel
     */
    public function setSettleLaterPaymentMethod(?string $settleLaterPaymentMethod): self
    {
        $this->settleLaterPaymentMethod = $settleLaterPaymentMethod;

        return $this;
    }

    /**
     * Optional shipping address
     *
     * @param AddressModel|null $shippingAddress
     *
     * @return InvoiceModel
     */
    public function setShippingAddress(?AddressModel $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    /**
     * Subscription handle, will be null for a one-time customer invoice
     *
     * @param string|null $subscription
     *
     * @return InvoiceModel
     */
    public function setSubscription(?string $subscription): self
    {
        $this->subscription = $subscription;

        return $this;
    }

    /**
     * The type of invoice: s - subscription recurring, so - subscription one-time, soi - subscription one-time instant,
     *  co - customer one-time, ch - charge
     *
     * @see InvoiceTypeEnum
     *
     * @param string $type
     *
     * @return InvoiceModel
     */
    public function setType(string $type): self
    {
        $this->type = $type;

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
        $model->setId($response['id'])
              ->setHandle($response['handle'])
              ->setCustomer($response['customer'])
              ->setState($response['state']);

        if (isset($response['subscription'])) {
            $model->setSubscription($response['subscription']);
        }

        if (isset($response['plan'])) {
            $model->setPlan($response['plan']);
        }

        if (in_array($response['state'], InvoiceStateEnum::getAll())) {
            $model->setState($response['state']);
        }

        if (isset($response['processing'])) {
            $model->setProcessing($response['processing']);
        }

        if (in_array($response['type'], InvoiceTypeEnum::getAll())) {
            $model->setType($response['type']);
        }

        $model->setAmount($response['amount']);

        if (isset($response['number'])) {
            $model->setNumber($response['number']);
        }

        $model->setCurrency($response['currency']);
        $model->setDue(new DateTime($response['due']));

        if (isset($response['failed'])) {
            $model->setFailed(new DateTime($response['failed']));
        }

        if (isset($response['settled'])) {
            $model->setSettled(new DateTime($response['settled']));
        }

        if (isset($response['cancelled'])) {
            $model->setCancelled(new DateTime($response['cancelled']));
        }

        if (isset($response['authorized'])) {
            $model->setAuthorized(new DateTime($response['authorized']));
        }

        $credits = [];
        foreach ($response['credits'] as $credit) {
            $credits[] = CreditModel::fromArray($credit);
        }
        $model->setCredits($credits);

        $model->setCreated(new DateTime($response['created']));

        if (isset($response['plan_version'])) {
            $model->setPlanVersion($response['plan_version']);
        }

        if (isset($response['dunning_plan'])) {
            $model->setDunningPlan($response['dunning_plan']);
        }

        $model->setDiscountAmount($response['discount_amount']);
        $model->setOrgAmount($response['org_amount']);
        $model->setAmountVat($response['amount_vat']);
        $model->setAmountExVat($response['amount_ex_vat']);
        $model->setSettledAmount($response['settled_amount']);
        $model->setRefundedAmount($response['refunded_amount']);

        if (isset($response['authorized_amount'])) {
            $model->setAuthorizedAmount($response['authorized_amount']);
        }

        if (isset($response['credited_amount'])) {
            $model->setCreditedAmount($response['credited_amount']);
        }

        if (isset($response['period_number'])) {
            $model->setPeriodNumber($response['period_number']);
        }

        if (isset($response['recurring_payment_method'])) {
            $model->setRecurringPaymentMethod($response['recurring_payment_method']);
        }

        $orderLines = [];
        foreach ($response['order_lines'] as $line) {
            $orderLines[] = OrderLineModel::fromArray($line);
        }
        $model->setOrderLines($orderLines);

        $model->setAdditionalCosts($response['additional_costs']);

        $transactions = [];
        foreach ($response['transactions'] as $transaction) {
            $transactions[] = TransactionModel::fromArray($transaction);
        }
        $model->setTransactions($transactions);

        if (isset($response['dunning_start'])) {
            $model->setDunningStart(new DateTime($response['dunning_start']));
        }

        if (isset($response['dunning_count'])) {
            $model->setDunningCount($response['dunning_count']);
        }

        if (isset($response['dunning_expired'])) {
            $model->setDunningExpired(new DateTime($response['dunning_expired']));
        }

        if (isset($response['period_from'])) {
            $model->setPeriodFrom(new DateTime($response['period_from']));
        }

        if (isset($response['period_to'])) {
            $model->setPeriodTo(new DateTime($response['period_to']));
        }

        if (isset($response['settle_later'])) {
            $model->setSettleLater($response['settle_later']);
        }

        if (isset($response['settle_later_payment_method'])) {
            $model->setSettleLaterPaymentMethod($response['settle_later_payment_method']);
        }

        if (isset($response['billing_address'])) {
            $model->setBillingAddress(AddressModel::fromArray($response['billing_address']));
        }

        if (isset($response['shipping_address'])) {
            $model->setShippingAddress(AddressModel::fromArray($response['shipping_address']));
        }

        if (isset($response['accounting_number'])) {
            $model->setAccountingNumber($response['accounting_number']);
        }

        if (isset($response['debtor_id'])) {
            $model->setDebtorId($response['debtor_id']);
        }

        if (isset($response['download_url'])) {
            $model->setDownloadUrl($response['download_url']);
        }

        if (isset($response['accounting_created_date'])) {
            $model->setAccountingCreatedDate(new DateTime($response['accounting_created_date']));
        }

        if (isset($response['credit_notes'])) {
            $creditNotes = [];
            foreach ($response['credit_notes'] as $creditNote) {
                $creditNotes[] = CreditNoteModel::fromArray($creditNote);
            }
            $model->setCreditNotes($creditNotes);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'id' => $this->getId(),
            'handle' => $this->getHandle(),
            'customer' => $this->getCustomer(),
            'state' => $this->getState(),
            'subscription' => $this->getSubscription(),
            'plan' => $this->getPlan(),
            'processing' => $this->getProcessing(),
            'type' => $this->getType(),
            'amount' => $this->getAmount(),
            'number' => $this->getNumber(),
            'currency' => $this->getCurrency(),
            'due' => $this->getDue() ? $this->getDue()->format('Y-m-d\TH:i:s.v') : null,
            'failed' => $this->getFailed() ? $this->getFailed()->format('Y-m-d\TH:i:s.v') : null,
            'settled' => $this->getSettled() ? $this->getSettled()->format('Y-m-d\TH:i:s.v') : null,
            'cancelled' => $this->getCancelled() ? $this->getCancelled()->format('Y-m-d\TH:i:s.v') : null,
            'authorized' => $this->getAuthorized() ? $this->getAuthorized()->format('Y-m-d\TH:i:s.v') : null,
            'credits' => array_map(function ($credit) {
                return $credit->toArray();
            }, $this->getCredits()),
            'created' => $this->getCreated() ? $this->getCreated()->format('Y-m-d\TH:i:s.v') : null,
            'plan_version' => $this->getPlanVersion(),
            'dunning_plan' => $this->getDunningPlan(),
            'discount_amount' => $this->getDiscountAmount(),
            'org_amount' => $this->getOrgAmount(),
            'amount_vat' => $this->getAmountVat(),
            'amount_ex_vat' => $this->getAmountExVat(),
            'settled_amount' => $this->getSettledAmount(),
            'refunded_amount' => $this->getRefundedAmount(),
            'authorized_amount' => $this->getAuthorizedAmount(),
            'credited_amount' => $this->getCreditedAmount(),
            'period_number' => $this->getPeriodNumber(),
            'recurring_payment_method' => $this->getRecurringPaymentMethod(),
            'order_lines' => array_map(function ($line) {
                return $line->toArray();
            }, $this->getOrderLines()),
            'additional_costs' => $this->getAdditionalCosts(),
            'transactions' => array_map(function ($transaction) {
                return $transaction->toArray();
            }, $this->getTransactions()),
            'dunning_start' => $this->getDunningStart() ? $this->getDunningStart()->format('Y-m-d\TH:i:s.v') : null,
            'dunning_count' => $this->getDunningCount(),
            'dunning_expired' =>
                $this->getDunningExpired() ? $this->getDunningExpired()->format('Y-m-d\TH:i:s.v') : null,
            'period_from' => $this->getPeriodFrom() ? $this->getPeriodFrom()->format('Y-m-d\TH:i:s.v') : null,
            'period_to' => $this->getPeriodTo() ? $this->getPeriodTo()->format('Y-m-d\TH:i:s.v') : null,
            'settle_later' => $this->getSettleLater(),
            'settle_later_payment_method' => $this->getSettleLaterPaymentMethod(),
            'billing_address' => $this->getBillingAddress() ? $this->getBillingAddress()->toArray() : null,
            'shipping_address' => $this->getShippingAddress() ? $this->getShippingAddress()->toArray() : null,
            'accounting_number' => $this->getAccountingNumber(),
            'debtor_id' => $this->getDebtorId(),
            'download_url' => $this->getDownloadUrl(),
            'accounting_created_date' =>
                $this->getAccountingCreatedDate() ? $this->getAccountingCreatedDate()->format('Y-m-d\TH:i:s.v') : null,
            'credit_notes' => array_map(function ($creditNote) {
                return $creditNote->toArray();
            }, $this->getCreditNotes()),
        ], function ($value) {
            return $value !== null;
        });
    }
}
