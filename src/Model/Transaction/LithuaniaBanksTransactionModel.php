<?php

namespace Billwerk\Sdk\Model\Transaction;

class LithuaniaBanksTransactionModel extends AbstractTransactionModel
{
    /**
     * Lithuania Banks id
     *
     * @var string|null $lithuaniaBanksId
     */
    protected ?string $lithuaniaBanksId = null;

    /**
     * Lithuania Banks id
     *
     * @return string|null
     */
    public function getLithuaniaBanksId(): ?string
    {
        return $this->lithuaniaBanksId;
    }

    /**
     * Lithuania Banks id
     *
     * @param string|null $lithuaniaBanksId
     *
     * @return self
     */
    public function setLithuaniaBanksId(?string $lithuaniaBanksId): self
    {
        $this->lithuaniaBanksId = $lithuaniaBanksId;

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

        if (isset($response['lithuania_banks_id'])) {
            $model->setLithuaniaBanksId($response['lithuania_banks_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'lithuania_banks_id' => $this->getLithuaniaBanksId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
