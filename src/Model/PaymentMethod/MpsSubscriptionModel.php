<?php

namespace Billwerk\Sdk\Model\PaymentMethod;

use Billwerk\Sdk\Model\AbstractModel;

/**
 * MPS subscription in payment method
 *
 * @see https://optimize-docs.billwerk.com/reference/getpaymentmethodv2
 *
 * @package Billwerk\Sdk\Model
 */
class MpsSubscriptionModel extends AbstractModel
{
    /**
     * Optional external id at MobilePay defined when creating the subscription
     *
     * @var string|null $externalId
     */
    protected ?string $externalId = null;

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
     * Optional external id at MobilePay defined when creating the subscription
     *
     * @param string|null $externalId
     *
     * @return MpsSubscriptionModel
     */
    public function setExternalId(?string $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }

    public static function fromArray(array $response): self
    {
        $model = new self();

        if (isset($response["external_id"])) {
            $model->setExternalId($response["external_id"]);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'external_id' => $this->getExternalId(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
