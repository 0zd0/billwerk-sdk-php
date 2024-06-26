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
     * Resurs id
     *
     * @return string|null
     */
    public function getResursId(): ?string
    {
        return $this->resursId;
    }

    /**
     * Resurs id
     *
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

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'resurs_id' => $this->getResursId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
