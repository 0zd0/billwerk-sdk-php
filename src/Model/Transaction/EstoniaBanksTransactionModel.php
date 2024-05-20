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
     * @return string|null
     */
    public function getEstoniaBanksId(): ?string
    {
        return $this->estoniaBanksId;
    }

    /**
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
}
