<?php

namespace Billwerk\Sdk\Model\Invoice;

class BancontactTransactionModel extends AbstractTransactionModel
{
    /**
     * Bancontact id
     *
     * @var string|null $bancontactId
     */
    protected ?string $bancontactId = null;

    /**
     * @return string|null
     */
    public function getBancontactId(): ?string
    {
        return $this->bancontactId;
    }

    /**
     * @param string|null $bancontactId
     *
     * @return self
     */
    public function setBancontactId(?string $bancontactId): self
    {
        $this->bancontactId = $bancontactId;

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

        if (isset($response['bancontact_id'])) {
            $model->setBancontactId($response['bancontact_id']);
        }

        return $model;
    }
}
