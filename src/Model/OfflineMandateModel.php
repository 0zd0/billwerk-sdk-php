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
    public function setOfflineAgreementHandle(string $offlineAgreementHandle): self
    {
        $this->offlineAgreementHandle = $offlineAgreementHandle;
        
        return $this;
    }
    
    public static function fromArray(array $response): self
    {
        $model = new self();
        
        $model->setOfflineAgreementHandle($response['offline_agreement_handle']);
        
        return $model;
    }
}
