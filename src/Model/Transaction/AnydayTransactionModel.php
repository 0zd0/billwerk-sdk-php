<?php

namespace Billwerk\Sdk\Model\Transaction;

class AnydayTransactionModel extends AbstractTransactionModel
{
    /**
     * Anyday id
     *
     * @var string|null $anydayId
     */
    protected ?string $anydayId = null;

    /**
     * Anyday id
     *
     * @return string|null
     */
    public function getAnydayId(): ?string
    {
        return $this->anydayId;
    }

    /**
     * Anyday id
     *
     * @param string|null $anydayId
     *
     * @return self
     */
    public function setAnydayId(?string $anydayId): self
    {
        $this->anydayId = $anydayId;

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

        if (isset($response['anyday_id'])) {
            $model->setAnydayId($response['anyday_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'anyday_id' => $this->getAnydayId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
