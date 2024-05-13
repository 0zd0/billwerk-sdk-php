<?php

namespace Billwerk\Sdk\Model\PaymentMethod;

use Billwerk\Sdk\Model\AbstractModel;

/**
 * Sepa mandate in payment method
 *
 * @see https://optimize-docs.billwerk.com/reference/getpaymentmethodv2
 *
 * @package Billwerk\Sdk\Model
 */
class SepaMandateModel extends AbstractModel
{
    protected ?string $iban = null;

    /**
     * @return string|null
     */
    public function getIban(): ?string
    {
        return $this->iban;
    }

    /**
     * @param string|null $iban
     *
     * @return SepaMandateModel
     */
    public function setIban(?string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public static function fromArray(array $response): self
    {
        $model = new self();

        if (isset($response['iban'])) {
            $model->setIban($response['iban']);
        }

        return $model;
    }
}
