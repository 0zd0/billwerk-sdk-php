<?php

namespace Billwerk\Sdk\Model\Transaction;

class PostfinanceTransactionModel extends AbstractTransactionModel
{
    /**
     * PostFinance id
     *
     * @var string|null $postfinanceId
     */
    protected ?string $postfinanceId = null;

    /**
     * @return string|null
     */
    public function getPostfinanceId(): ?string
    {
        return $this->postfinanceId;
    }

    /**
     * @param string|null $postfinanceId
     *
     * @return self
     */
    public function setPostfinanceId(?string $postfinanceId): self
    {
        $this->postfinanceId = $postfinanceId;

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

        if (isset($response['postfinance_id'])) {
            $model->setPostfinanceId($response['postfinance_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'postfinance_id' => $this->getPostfinanceId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
