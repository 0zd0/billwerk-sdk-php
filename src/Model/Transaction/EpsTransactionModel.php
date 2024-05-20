<?php

namespace Billwerk\Sdk\Model\Transaction;

class EpsTransactionModel extends AbstractTransactionModel
{
    /**
     * Eps id
     *
     * @var string|null $epsId
     */
    protected ?string $epsId = null;

    /**
     * @return string|null
     */
    public function getEpsId(): ?string
    {
        return $this->epsId;
    }

    /**
     * @param string|null $epsId
     *
     * @return self
     */
    public function setEpsId(?string $epsId): self
    {
        $this->epsId = $epsId;

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

        if (isset($response['eps_id'])) {
            $model->setEpsId($response['eps_id']);
        }

        return $model;
    }
}
