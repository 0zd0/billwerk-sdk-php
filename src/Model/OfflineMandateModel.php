<?php

namespace Billwerk\Sdk\Model;

/**
 * Offline mandate in payment method
 *
 * @see https://optimize-docs.billwerk.com/reference/getpaymentmethodv2
 *
 * @package Billwerk\Sdk\Model
 */
class OfflineMandateModel extends AbstractModel
{
    /**
     * Offline agreement handle
     *
     * @var string $offlineAgreementHandle
     */
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
     *
     * @return OfflineMandateModel
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
