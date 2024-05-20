<?php

namespace Billwerk\Sdk\Model\Transaction;

class IdealTransactionModel extends AbstractTransactionModel
{
    /**
     * Ideal id
     *
     * @var string|null $idealId
     */
    protected ?string $idealId = null;

    /**
     * @return string|null
     */
    public function getIdealId(): ?string
    {
        return $this->idealId;
    }

    /**
     * @param string|null $idealId
     *
     * @return self
     */
    public function setIdealId(?string $idealId): self
    {
        $this->idealId = $idealId;

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

        if (isset($response['ideal_id'])) {
            $model->setIdealId($response['ideal_id']);
        }

        return $model;
    }
}
