<?php

namespace Billwerk\Sdk\Model\PaymentMethod;

use Billwerk\Sdk\Model\AbstractModel;

class PaymentMethodGetModel extends AbstractModel
{
    /**
     * Payment method id
     *
     * @var string $id
     */
    protected string $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;
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

        $model->setId($response['id']);

        return $model;
    }

    public function toArray(): array
    {
        return [];
    }
}
