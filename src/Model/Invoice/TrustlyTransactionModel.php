<?php

namespace Billwerk\Sdk\Model\Invoice;

class TrustlyTransactionModel extends AbstractTransactionModel
{
    /**
     * Trustly id
     *
     * @var string|null $trustlyId
     */
    protected ?string $trustlyId = null;

    /**
     * @return string|null
     */
    public function getTrustlyId(): ?string
    {
        return $this->trustlyId;
    }

    /**
     * @param string|null $trustlyId
     *
     * @return self
     */
    public function setTrustlyId(?string $trustlyId): self
    {
        $this->trustlyId = $trustlyId;

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

        if (isset($response['trustly_id'])) {
            $model->setTrustlyId($response['trustly_id']);
        }

        return $model;
    }
}
