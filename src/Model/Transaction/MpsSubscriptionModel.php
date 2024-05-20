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
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }

    /**
     * @return DateTime|null
     */
    public function getFailed(): ?DateTime
    {
        return $this->failed;
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
    public function getCreated(): ?DateTime
    {
        return $this->created;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
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
}
