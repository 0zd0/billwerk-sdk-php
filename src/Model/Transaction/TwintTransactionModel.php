<?php

namespace Billwerk\Sdk\Model\Transaction;

class TwintTransactionModel extends AbstractTransactionModel
{
    /**
     * Twint id
     *
     * @var string|null $twintId
     */
    protected ?string $twintId = null;

    /**
     * @return string|null
     */
    public function getTwintId(): ?string
    {
        return $this->twintId;
    }

    /**
     * @param string|null $twintId
     *
     * @return self
     */
    public function setTwintId(?string $twintId): self
    {
        $this->twintId = $twintId;

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

        if (isset($response['twint_id'])) {
            $model->setTwintId($response['twint_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'twint_id' => $this->getTwintId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
