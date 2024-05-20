<?php

namespace Billwerk\Sdk\Model\Transaction;

class ResursTransactionModel extends AbstractTransactionModel
{
    /**
     * Resurs id
     *
     * @var string|null $resursId
     */
    protected ?string $resursId = null;

    /**
     * @return string|null
     */
    public function getResursId(): ?string
    {
        return $this->resursId;
    }

    /**
     * @param string|null $resursId
     *
     * @return self
     */
    public function setResursId(?string $resursId): self
    {
        $this->resursId = $resursId;

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

        if (isset($response['resurs_id'])) {
            $model->setResursId($response['resurs_id']);
        }

        return $model;
    }
}
