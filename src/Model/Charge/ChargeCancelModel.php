<?php

namespace Billwerk\Sdk\Model\Charge;

use Billwerk\Sdk\Model\AbstractModel;

class ChargeCancelModel extends AbstractModel
{
    /**
     * Charge handle
     *
     * @var string $handle
     */
    protected string $handle;

    /**
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * @param string $handle
     *
     * @return self
     */
    public function setHandle(string $handle): self
    {
        $this->handle = $handle;

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

        $model->setHandle($response['handle']);

        return $model;
    }
}
