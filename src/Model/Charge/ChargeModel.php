<?php

namespace Billwerk\Sdk\Model\Charge;

use Billwerk\Sdk\Enum\ChargeStateEnum;
use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\PaymentContextEnum;
use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\AddressModel;
use Billwerk\Sdk\Model\Invoice\OrderLineModel;
use DateTime;

class ChargeModel extends AbstractModel
{
    /**
     * Per account unique reference to charge/invoice. E.g. order id from own system.
     * Multiple payments can be attempted for the same handle but only one succeeded charge
     * can exist per handle. Max length 255 with allowable characters [a-zA-Z0-9_.-@].
     *
     * @var string $handle
     */
    protected string $handle;

    /**
     * The charge state one of the following: created, authorized, settled, failed, cancelled,
     * pending. A pending state after create charge indicates an async processing has been
     * started for an asynchronous payment method. E.g. MobilePay Subscriptions. See also
     * processing. The result of the charge will be delivered in webhook as either
     * invoice_authorized, invoice_settled or invoice_failed
     *
     * @see ChargeStateEnum
     * @var string $state
     */
    protected string $state;

    /**
     * Customer handle
     *
     * @var string $customer
     */
    protected string $customer;

    /**
     * The invoice amount including VAT. If partial settles are performed amount represents the total settled amount
     *
     * @var int $amount
     */
    protected int $amount;

    /**
     * Currency for the account in ISO 4217 three letter alpha code
     *
     * @var string $currency
     */
    protected string $currency;

    /**
     * When the charge was authorized, if the charge went through an authorize and settle flow,
     * in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $authorized
     */
    protected ?DateTime $authorized = null;

    /**
     * When the charge was settled, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $settled
     */
    protected ?DateTime $settled = null;

    /**
     * When the charge was cancelled, in ISO-8601 extended offset date-time format
     *
     * @var DateTime|null $cancelled
     */
    protected ?DateTime $cancelled = null;

    /**
     * When the invoice was created, in ISO-8601 extended offset date-time format
     *
     * @var DateTime $created
     */
    protected DateTime $created;

    /**
     * Transaction id assigned by Reepay. Assigned when transaction is performed
     *
     * @var string|null $transaction
     */
    protected ?string $transaction = null;

    /**
     * Reepay error code if failed. See transaction errors
     *
     * @var string|null $error
     */
    protected ?string $error = null;

    /**
     * For asynchronous payment methods this flag indicates that the charge is awaiting
     * result. The charge/invoice state will be pending
     *
     * @var bool|null $processing
     */
    protected ?bool $processing = null;

    /**
     * Object describing the source for the charge. E.g. credit card
     *
     * @var SourceModel $source
     */
    protected SourceModel $source;

    /**
     * Order lines for charge
     *
     * @var OrderLineModel[] $orderLines
     */
    protected array $orderLines;

    /**
     * Refunded amount
     *
     * @var int $refundedAmount
     */
    protected int $refundedAmount;

    /**
     * Authorized amount if authorization was performed. The maximum amount that can be settled
     *
     * @var int|null $authorizedAmount
     */
    protected ?int $authorizedAmount = null;

    /**
     * Reepay error state if failed: soft_declined, hard_declined or processing_error.
     * Soft and hard declines indicate a card decline. A soft decline is possibly recoverable
     * and a subsequent request with the same card may succeed. E.g. insufficient funds.
     * A processing error indicates an error processing the card either at Reepay, the acquirer,
     * or between Reepay and the acquirer
     *
     * @see ErrorStateEnum
     * @var string|null $errorState
     */
    protected ?string $errorState = null;

    /**
     * Optional reference to recurring payment method created in conjunction with charging
     *
     * @var string|null $recurringPaymentMethod
     */
    protected ?string $recurringPaymentMethod = null;

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
     * Payment context describing if the transaction is customer or merchant initiated,
     * one of the following values: cit, mit, cit_cof
     *
     * @see PaymentContextEnum
     * @var string|null $paymentContext
     */
    protected ?string $paymentContext = null;

    /**
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * @return int
     */
    public function getRefundedAmount(): int
    {
        return $this->refundedAmount;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @return string|null
     */
    public function getTransaction(): ?string
    {
        return $this->transaction;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
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
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * @return string|null
     */
    public function getPaymentContext(): ?string
    {
        return $this->paymentContext;
    }

    /**
     * @return DateTime|null
     */
    public function getAuthorized(): ?DateTime
    {
        return $this->authorized;
    }

    /**
     * @return DateTime|null
     */
    public function getSettled(): ?DateTime
    {
        return $this->settled;
    }

    /**
     * @return AddressModel|null
     */
    public function getShippingAddress(): ?AddressModel
    {
        return $this->shippingAddress;
    }

    /**
     * @return string|null
     */
    public function getRecurringPaymentMethod(): ?string
    {
        return $this->recurringPaymentMethod;
    }

    /**
     * @return bool|null
     */
    public function getProcessing(): ?bool
    {
        return $this->processing;
    }

    /**
     * @return array
     */
    public function getOrderLines(): array
    {
        return $this->orderLines;
    }

    /**
     * @return DateTime|null
     */
    public function getCancelled(): ?DateTime
    {
        return $this->cancelled;
    }

    /**
     * @return AddressModel|null
     */
    public function getBillingAddress(): ?AddressModel
    {
        return $this->billingAddress;
    }

    /**
     * @return int|null
     */
    public function getAuthorizedAmount(): ?int
    {
        return $this->authorizedAmount;
    }

    /**
     * @return SourceModel
     */
    public function getSource(): SourceModel
    {
        return $this->source;
    }

    /**
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
     * @param int $amount
     *
     * @return self
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

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
     * @param string|null $error
     *
     * @return self
     */
    public function setError(?string $error): self
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @param string|null $paymentContext
     *
     * @return self
     */
    public function setPaymentContext(?string $paymentContext): self
    {
        $this->paymentContext = $paymentContext;

        return $this;
    }

    /**
     * @param string $currency
     *
     * @return self
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param DateTime|null $authorized
     *
     * @return self
     */
    public function setAuthorized(?DateTime $authorized): self
    {
        $this->authorized = $authorized;

        return $this;
    }

    /**
     * @param DateTime|null $settled
     *
     * @return self
     */
    public function setSettled(?DateTime $settled): self
    {
        $this->settled = $settled;

        return $this;
    }

    /**
     * @param AddressModel|null $shippingAddress
     *
     * @return self
     */
    public function setShippingAddress(?AddressModel $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    /**
     * @param string|null $recurringPaymentMethod
     *
     * @return self
     */
    public function setRecurringPaymentMethod(?string $recurringPaymentMethod): self
    {
        $this->recurringPaymentMethod = $recurringPaymentMethod;

        return $this;
    }

    /**
     * @param bool|null $processing
     *
     * @return self
     */
    public function setProcessing(?bool $processing): self
    {
        $this->processing = $processing;

        return $this;
    }

    /**
     * @param array $orderLines
     *
     * @return self
     */
    public function setOrderLines(array $orderLines): self
    {
        $this->orderLines = $orderLines;

        return $this;
    }

    /**
     * @param DateTime|null $cancelled
     *
     * @return self
     */
    public function setCancelled(?DateTime $cancelled): self
    {
        $this->cancelled = $cancelled;

        return $this;
    }

    /**
     * @param AddressModel|null $billingAddress
     *
     * @return self
     */
    public function setBillingAddress(?AddressModel $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * @param int|null $authorizedAmount
     *
     * @return self
     */
    public function setAuthorizedAmount(?int $authorizedAmount): self
    {
        $this->authorizedAmount = $authorizedAmount;

        return $this;
    }

    /**
     * @param SourceModel $source
     *
     * @return self
     */
    public function setSource(SourceModel $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @param string|null $transaction
     *
     * @return self
     */
    public function setTransaction(?string $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    public static function fromArray(array $response): self
    {
        $model = new self();

        $model
            ->setHandle($response['handle']);

        if (in_array($response['state'], ChargeStateEnum::getAll(), true)) {
            $model->setState($response['state']);
        }

        $model->setCustomer($response['customer']);
        $model->setAmount($response['amount']);
        $model->setCurrency($response['currency']);

        if (isset($response['authorized'])) {
            $model->setAuthorized(new DateTime($response['authorized']));
        }

        if (isset($response['settled'])) {
            $model->setSettled(new DateTime($response['settled']));
        }

        if (isset($response['cancelled'])) {
            $model->setCancelled(new DateTime($response['cancelled']));
        }

        $model->setCreated(new DateTime($response['created']));

        if (isset($response['transaction'])) {
            $model->setTransaction($response['transaction']);
        }

        if (isset($response['error'])) {
            $model->setError($response['error']);
        }

        if (isset($response['processing'])) {
            $model->setProcessing($response['processing']);
        }

        $model->setSource(SourceModel::fromArray($response['source']));

        $orderLines = [];
        foreach ($response['order_lines'] as $line) {
            $orderLines[] = OrderLineModel::fromArray($line);
        }
        $model->setOrderLines($orderLines);

        $model->setRefundedAmount($response['refunded_amount']);

        if (isset($response['authorized_amount'])) {
            $model->setAuthorizedAmount($response['authorized_amount']);
        }

        if (isset($response['error_state']) && in_array($response['error_state'], ErrorStateEnum::getAll())) {
            $model->setErrorState($response['error_state']);
        }

        if (isset($response['recurring_payment_method'])) {
            $model->setRecurringPaymentMethod($response['recurring_payment_method']);
        }

        if (isset($response['billing_address'])) {
            $model->setBillingAddress(AddressModel::fromArray($response['billing_address']));
        }

        if (isset($response['shipping_address'])) {
            $model->setShippingAddress(AddressModel::fromArray($response['shipping_address']));
        }

        if (isset($response['payment_context'])
            && in_array($response['payment_context'], PaymentContextEnum::getAll(), true)) {
            $model->setPaymentContext($response['payment_context']);
        }

        return $model;
    }
}
