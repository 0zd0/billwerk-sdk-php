<?php

namespace Billwerk\Sdk\Model\Invoice;

class SwishTransactionModel extends AbstractTransactionModel
{
    /**
     * Swish id
     *
     * @var string|null $swishId
     */
    protected ?string $swishId = null;

    /**
     * @return string|null
     */
    public function getSwishId(): ?string
    {
        return $this->swishId;
    }

    /**
     * @param string|null $swishId
     *
     * @return self
     */
    public function setSwishId(?string $swishId): self
    {
        $this->swishId = $swishId;

        return $this;
    }

    /**
     * @param array $response
     *
     * @return self
     */
    public static function fromArray(array $response): self
    {
        $model = new static();

        $model->fromArrayDefault($response);

        if (isset($response['swish_id'])) {
            $model->setSwishId($response['swish_id']);
        }

        return $model;
    }
}
