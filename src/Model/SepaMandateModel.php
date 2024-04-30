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
    public function setIban(?string $iban): void
    {
        $this->iban = $iban;
    }
    
    public static function fromArray(array $response): self
    {
        $sepaMandate = new self();
        
        if (isset($response['iban'])) {
            $sepaMandate->setIban($response['iban']);
        }
        
        return $sepaMandate;
    }
}
