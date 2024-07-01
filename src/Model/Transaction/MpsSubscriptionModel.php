<?php

namespace Billwerk\Sdk\Model\Transaction;

use Billwerk\Sdk\Enum\CardStateEnum;
use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasIdInterface;
use DateTime;
use Exception;

class MpsSubscriptionModel extends AbstractModel implements HasIdInterface
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
     * @see MpsSubscriptionStateEnum
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
     * @var DateTime|null $created
     */
    protected ?DateTime $created = null;

    /**
     * Optional external id at MobilePay defined when creating the subscription
     *
     * @var string|null $externalId
     */
    protected ?string $externalId = null;

    /**
     * Optional reference provided when creating the payment method. For payment methods
     *  created with Reepay Checkout the reference will correspond to the session id for
     *  the Checkout session that created the payment method
     *
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * Customer by handle
     *
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * Date when the payment method failed. In ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getFailed(): ?DateTime
    {
        return $this->failed;
    }

    /**
     * State of the payment method: active, inactivated, failed, pending or deleted
     *
     * @see MpsSubscriptionStateEnum
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * Date when the payment method was created. In ISO-8601 extended offset date-time format
     *
     * @return DateTime|null
     */
    public function getCreated(): ?DateTime
    {
        return $this->created;
    }

    /**
     * Unique id for payment method
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Optional external id at MobilePay defined when creating the subscription
     *
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * Optional reference provided when creating the payment method. For payment methods
     *  created with Reepay Checkout the reference will correspond to the session id for
     *  the Checkout session that created the payment method
     *
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
     * Customer by handle
     *
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
     * Date when the payment method failed. In ISO-8601 extended offset date-time format
     *
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
     * State of the payment method: active, inactivated, failed, pending or deleted
     *
     * @see MpsSubscriptionStateEnum
     *
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
     * Date when the payment method was created. In ISO-8601 extended offset date-time format
     *
     * @param DateTime|null $created
     *
     * @return self
     */
    public function setCreated(?DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Unique id for payment method
     *
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
     * Optional external id at MobilePay defined when creating the subscription
     *
     * @param string|null $externalId
     *
     * @return self
     */
    public function setExternalId(?string $externalId): self
    {
        $this->externalId = $externalId;

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

        $model->setId($response['id']);

        if (in_array($response['state'], CardStateEnum::getAll(), true)) {
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

        if (isset($response['external_id'])) {
            $model->setExternalId($response['external_id']);
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
            'failed' => $this->getFailed() ? $this->getFailed()->format(DATE_ATOM) : null,
            'created' => $this->getCreated() ? $this->getCreated()->format(DATE_ATOM) : null,
            'external_id' => $this->getExternalId(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
