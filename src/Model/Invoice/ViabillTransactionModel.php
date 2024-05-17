<?php

namespace Billwerk\Sdk\Model\Invoice;

class ViabillTransactionModel extends AbstractTransactionModel
{
    /**
     * ViaBill id
     *
     * @var string|null $viabillId
     */
    protected ?string $viabillId = null;

    /**
     * @return string|null
     */
    public function getViabillId(): ?string
    {
        return $this->viabillId;
    }

    /**
     * @param string|null $viabillId
     *
     * @return self
     */
    public function setViabillId(?string $viabillId): self
    {
        $this->viabillId = $viabillId;

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

        if (isset($response['viabill_id'])) {
            $model->setViabillId($response['viabill_id']);
        }

        return $model;
    }
}
