<?php

namespace Billwerk\Sdk\Model\Checkout\Session;

use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\AddressModel;
use Billwerk\Sdk\Model\HasRequestApiInterface;
use Billwerk\Sdk\Model\MetaDataModel;

class OrderModel extends AbstractModel implements HasRequestApiInterface
{
    /**
     * Per account unique reference to charge/invoice. E.g. order id from own system. Multiple
     * payments can be attempted for the same handle but only one authorized or settled charge
     * can exist per handle. Max length 255 with allowable characters [a-zA-Z0-9_.-@]. It is
     * recommended to use a maximum of 20 characters as this will allow for the use of handle
     * as reference on bank statements without truncation
     *
     * @var string $handle
     */
    protected string $handle;

    /**
     * Optional idempotency key. Only one authorization or settle can be performed for the same
     * handle. If two create attempts are attempted and the first succeeds the second will fail
     * because charge is already settled or authorized. An idempotency key identifies uniquely
     * the request and multiple requests with the same key and handle will yield the same result.
     * In case of networking errors the same request with same key can safely be retried
     *
     * @var string|null $key
     */
    protected ?string $key = null;

    /**
     * Amount in the smallest unit. Either amount or order_lines must be provided if charge/invoice
     * does not already exists
     *
     * @var int|null $amount
     */
    protected ?int $amount = null;

    /**
     * Optional currency in ISO 4217 three letter alpha code. If not provided the account default
     * currency will be used. The currency of an existing charge or invoice cannot be changed
     *
     * @var string|null $currency
     */
    protected ?string $currency = null;

    /**
     * Create customer and subscription in an atomic operation
     *
     * @var CustomerModel|null $customer
     */
    protected ?CustomerModel $customer = null;

    /**
     * @var MetaDataModel[]|null $metadata
     */
    protected ?array $metadata = null;

    /**
     * Optional order text. Used in conjunction with amount. Ignored if order_lines is provided
     *
     * @var string|null $ordertext
     */
    protected ?string $ordertext = null;

    /**
     * Order lines for the charge. The order lines controls the amount. Only required if charge/invoice
     * does not already exist. If given for existing charge the order lines and amount are adjusted.
     * A maximum of 100 order lines is allowed
     *
     * @var OrderLineModel[]|null $orderLines
     */
    protected ?array $orderLines = null;

    /**
     * Customer reference. If charge does not already exist either this reference must be provided,
     * a create customer object must be provided or the source must be a payment method reference
     * (e.g. ca_..) identifying customer. Notice that customer cannot be changed for existing charge/invoice
     * so if handle is provided it must match the customer handle for existing customer
     *
     * @var string|null $customerHandle
     */
    protected ?string $customerHandle = null;

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
     * @return string|null
     */
    public function getCustomerHandle(): ?string
    {
        return $this->customerHandle;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @return CustomerModel|null
     */
    public function getCustomer(): ?CustomerModel
    {
        return $this->customer;
    }

    /**
     * @return AddressModel|null
     */
    public function getShippingAddress(): ?AddressModel
    {
        return $this->shippingAddress;
    }

    /**
     * @return array|null
     */
    public function getOrderLines(): ?array
    {
        return $this->orderLines;
    }

    /**
     * @return AddressModel|null
     */
    public function getBillingAddress(): ?AddressModel
    {
        return $this->billingAddress;
    }

    /**
     * @return string|null
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * @return array|null
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @return int|null
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @return string|null
     */
    public function getOrdertext(): ?string
    {
        return $this->ordertext;
    }

    /**
     * @param string|null $customerHandle
     *
     * @return self
     */
    public function setCustomerHandle(?string $customerHandle): self
    {
        $this->customerHandle = $customerHandle;

        return $this;
    }

    /**
     * @param CustomerModel|null $customer
     *
     * @return self
     */
    public function setCustomer(?CustomerModel $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @param string|null $currency
     *
     * @return self
     */
    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

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
     * @param array|null $orderLines
     *
     * @return self
     */
    public function setOrderLines(?array $orderLines): self
    {
        $this->orderLines = $orderLines;

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
     * @param string|null $key
     *
     * @return self
     */
    public function setKey(?string $key): self
    {
        $this->key = $key;

        return $this;
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
     * @param array|null $metadata
     *
     * @return self
     */
    public function setMetadata(?array $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @param int|null $amount
     *
     * @return self
     */
    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string|null $ordertext
     *
     * @return self
     */
    public function setOrdertext(?string $ordertext): self
    {
        $this->ordertext = $ordertext;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        $model->setHandle($response['handle']);

        if (isset($response['key'])) {
            $model->setKey($response['key']);
        }

        if (isset($response['amount'])) {
            $model->setAmount($response['amount']);
        }

        if (isset($response['currency'])) {
            $model->setCurrency($response['currency']);
        }

        if (isset($response['customer'])) {
            $model->setCustomer(CustomerModel::fromArray($response['customer']));
        }

        if (isset($response['metadata'])) {
            $metadata = [];
            foreach ($response['metadata'] as $key => $object) {
                $metadata[] = MetaDataModel::fromObject($key, $object);
            }
            $model->setMetadata($metadata);
        }

        if (isset($response['ordertext'])) {
            $model->setOrdertext($response['ordertext']);
        }

        if (isset($response['order_lines'])) {
            $orderLines = [];
            foreach ($response['order_lines'] as $orderLine) {
                $orderLines[] = OrderLineModel::fromArray($orderLine);
            }
            $model->setOrderLines($orderLines);
        }

        if (isset($response['customer_handle'])) {
            $model->setCustomerHandle($response['customer_handle']);
        }

        if (isset($response['billing_address'])) {
            $model->setBillingAddress(AddressModel::fromArray($response['billing_address']));
        }

        if (isset($response['shipping_address'])) {
            $model->setShippingAddress(AddressModel::fromArray($response['shipping_address']));
        }

        return $model;
    }

    public function toApi(): array
    {
        $result = [
            'handle' => $this->getHandle(),
        ];

        if ( ! is_null($this->getKey())) {
            $result['key'] = $this->getKey();
        }

        if ( ! is_null($this->getAmount())) {
            $result['amount'] = $this->getAmount();
        }

        if ( ! is_null($this->getCurrency())) {
            $result['currency'] = $this->getCurrency();
        }

        if ( ! is_null($this->getCustomer())) {
            $result['customer'] = $this->getCustomer()->toApi();
        }

        if ( ! is_null($this->getMetadata())) {
            $result['metadata'] = MetaDataModel::fromObjects($this->getMetadata());
        }

        if ( ! is_null($this->getOrdertext())) {
            $result['ordertext'] = $this->getOrdertext();
        }

        if ( ! is_null($this->getOrderLines())) {
            foreach ($this->getOrderLines() as $orderLine) {
                $result['order_lines'][] = $orderLine->toApi();
            }
        }

        if ( ! is_null($this->getCustomerHandle())) {
            $result['customer_handle'] = $this->getCustomerHandle();
        }

        if ( ! is_null($this->getBillingAddress())) {
            $result['billing_address'] = $this->getBillingAddress()->toApi();
        }

        if ( ! is_null($this->getShippingAddress())) {
            $result['shipping_address'] = $this->getShippingAddress()->toApi();
        }

        return $result;
    }
}
