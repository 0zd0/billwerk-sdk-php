<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Model\AbstractModel;

class ApplepayAgreementModel extends AbstractModel
{
    /**
     * @var string|null $displayName
     */
    protected ?string $displayName = null;

    /**
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    /**
     * @param string|null $displayName
     *
     * @return self
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->displayName = $displayName;

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

        if (isset($response['display_name'])) {
            $model->setDisplayName($response['display_name']);
        }

        return $model;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_filter([
            'display_name' => $this->getDisplayName(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
