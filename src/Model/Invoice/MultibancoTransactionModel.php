<?php

namespace Billwerk\Sdk\Model\Invoice;

class MultibancoTransactionModel extends AbstractTransactionModel
{
    /**
     * Multibanco id
     *
     * @var string|null $multibancoId
     */
    protected ?string $multibancoId = null;

    /**
     * @return string|null
     */
    public function getMultibancoId(): ?string
    {
        return $this->multibancoId;
    }

    /**
     * @param string|null $multibancoId
     *
     * @return self
     */
    public function setMultibancoId(?string $multibancoId): self
    {
        $this->multibancoId = $multibancoId;

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

        if (isset($response['multibanco_id'])) {
            $model->setMultibancoId($response['multibanco_id']);
        }

        return $model;
    }
}
