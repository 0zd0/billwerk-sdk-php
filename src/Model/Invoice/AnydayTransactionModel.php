<?php

namespace Billwerk\Sdk\Model\Invoice;

class AnydayTransactionModel extends AbstractTransactionModel
{
    /**
     * Anyday id
     *
     * @var string|null $anydayId
     */
    protected ?string $anydayId = null;

    /**
     * @return string|null
     */
    public function getAnydayId(): ?string
    {
        return $this->anydayId;
    }

    /**
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
}
