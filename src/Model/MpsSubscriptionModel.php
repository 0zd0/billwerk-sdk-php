<?php

namespace Billwerk\Sdk\Model;

class MpsSubscriptionModel extends AbstractModel
{
    protected ?string $externalId;
    
    /**
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }
    
    /**
     * @param string|null $externalId
     */
    public function setExternalId(?string $externalId): void
    {
        $this->externalId = $externalId;
    }
    
    public static function fromArray(array $response): self
    {
        $mpsSubscription = new self();
        
        if (isset($response["external_id"])) {
            $mpsSubscription->setExternalId($response["external_id"]);
        }
        
        return $mpsSubscription;
    }
}
