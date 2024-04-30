<?php

namespace Billwerk\Sdk\Model;

class OfflineMandateModel extends AbstractModel
{
    protected string $offlineAgreementHandle;
    
    /**
     * @return string
     */
    public function getOfflineAgreementHandle(): string
    {
        return $this->offlineAgreementHandle;
    }
    
    /**
     * @param string $offlineAgreementHandle
     */
    public function setOfflineAgreementHandle(string $offlineAgreementHandle): void
    {
        $this->offlineAgreementHandle = $offlineAgreementHandle;
    }
    
    public static function fromArray(array $response): self
    {
        $offlineMandate = new self();
        
        $offlineMandate->setOfflineAgreementHandle($response['offline_agreement_handle']);
        
        return $offlineMandate;
    }
}
