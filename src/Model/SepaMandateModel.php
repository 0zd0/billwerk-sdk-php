<?php

namespace Billwerk\Sdk\Model;

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
