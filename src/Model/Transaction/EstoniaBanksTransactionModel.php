<?php

namespace Billwerk\Sdk\Model\Transaction;

class EstoniaBanksTransactionModel extends AbstractTransactionModel
{
    /**
     * Estonia Banks id
     *
     * @var string|null $estoniaBanksId
     */
    protected ?string $estoniaBanksId = null;

    /**
     * Estonia Banks id
     *
     * @return string|null
     */
    public function getEstoniaBanksId(): ?string
    {
        return $this->estoniaBanksId;
    }

    /**
     * Estonia Banks id
     *
     * @param string|null $estoniaBanksId
     *
     * @return self
     */
    public function setEstoniaBanksId(?string $estoniaBanksId): self
    {
        $this->estoniaBanksId = $estoniaBanksId;

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

        if (isset($response['estonia_banks_id'])) {
            $model->setEstoniaBanksId($response['estonia_banks_id']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'estonia_banks_id' => $this->getEstoniaBanksId(),
        ]), function ($value) {
            return $value !== null;
        });
    }
}
