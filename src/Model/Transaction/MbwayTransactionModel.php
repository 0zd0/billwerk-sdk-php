<?php

namespace Billwerk\Sdk\Model\Transaction;

class MbwayTransactionModel extends AbstractTransactionModel
{
    /**
     * MB Way id
     *
     * @var string|null $mbWayId
     */
    protected ?string $mbWayId = null;

    /**
     * @return string|null
     */
    public function getMbWayId(): ?string
    {
        return $this->mbWayId;
    }

    /**
     * @param string|null $mbWayId
     *
     * @return self
     */
    public function setMbWayId(?string $mbWayId): self
    {
        $this->mbWayId = $mbWayId;

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

        if (isset($response['mb_way_id'])) {
            $model->setMbWayId($response['mb_way_id']);
        }

        return $model;
    }
}
