<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Model\AbstractModel;

class AgreementGetAllModel extends AbstractModel
{
    /**
     * Get only active
     * Default value : false
     *
     * @var bool|null $onlyActive
     */
    protected ?bool $onlyActive = null;

    /**
     * Get only non-deleted
     * Default value : false
     *
     * @var bool|null $nonDeleted
     */
    protected ?bool $nonDeleted = null;

    /**
     * Get only non-deleted
     * Default value : false
     *
     * @return bool|null
     */
    public function getNonDeleted(): ?bool
    {
        return $this->nonDeleted;
    }

    /**
     * Get only active
     * Default value : false
     *
     * @return bool|null
     */
    public function getOnlyActive(): ?bool
    {
        return $this->onlyActive;
    }

    /**
     * Get only non-deleted
     * Default value : false
     *
     * @param bool|null $nonDeleted
     *
     * @return self
     */
    public function setNonDeleted(?bool $nonDeleted): self
    {
        $this->nonDeleted = $nonDeleted;

        return $this;
    }

    /**
     * Get only active
     * Default value : false
     *
     * @param bool|null $onlyActive
     *
     * @return self
     */
    public function setOnlyActive(?bool $onlyActive): self
    {
        $this->onlyActive = $onlyActive;

        return $this;
    }

    /**
     * @param array $response
     *
     * @return self
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        if (isset($response['only_active'])) {
            $model->setOnlyActive($response['only_active']);
        }

        if (isset($response['non_deleted'])) {
            $model->setNonDeleted($response['non_deleted']);
        }

        return $model;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_filter([
            'only_active' => $this->getOnlyActive(),
            'non_deleted' => $this->getNonDeleted(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
