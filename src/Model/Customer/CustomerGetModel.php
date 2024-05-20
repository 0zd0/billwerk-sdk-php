<?php

namespace Billwerk\Sdk\Model\Customer;

use Billwerk\Sdk\Model\AbstractModel;

class CustomerGetModel extends AbstractModel
{
    /**
     * Customer handle
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

        $model
            ->setHandle($response['handle']);

        return $model;
    }
}
