<?php

namespace Billwerk\Sdk\Model\Invoice;

class LatviaBanksTransactionModel extends AbstractTransactionModel
{
    /**
     * Latvia Banks id
     *
     * @var string|null $latviaBanksId
     */
    protected ?string $latviaBanksId = null;

    /**
     * @return string|null
     */
    public function getLatviaBanksId(): ?string
    {
        return $this->latviaBanksId;
    }

    /**
     * @param string|null $latviaBanksId
     *
     * @return self
     */
    public function setLatviaBanksId(?string $latviaBanksId): self
    {
        $this->latviaBanksId = $latviaBanksId;

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

        if (isset($response['latvia_banks_id'])) {
            $model->setLatviaBanksId($response['latvia_banks_id']);
        }

        return $model;
    }
}
