<?php

namespace Billwerk\Sdk\Model;

/**
 * Offline mandate
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
     * Optional offline agreement name
     *
     * @var string|null $offlineAgreementName
     */
    protected ?string $offlineAgreementName = null;

    /**
     * @return string
     */
    public function getOfflineAgreementHandle(): string
    {
        return $this->offlineAgreementHandle;
    }

    /**
     * @return string|null
     */
    public function getOfflineAgreementName(): ?string
    {
        return $this->offlineAgreementName;
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

    /**
     * @param string|null $offlineAgreementName
     *
     * @return self
     */
    public function setOfflineAgreementName(?string $offlineAgreementName): self
    {
        $this->offlineAgreementName = $offlineAgreementName;

        return $this;
    }

    public static function fromArray(array $response): self
    {
        $model = new self();

        $model->setOfflineAgreementHandle($response['offline_agreement_handle']);

        if (isset($response['offline_agreement_name'])) {
            $model->setOfflineAgreementName($response['offline_agreement_name']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'offline_agreement_handle' => $this->getOfflineAgreementHandle(),
            'offline_agreement_name' => $this->getOfflineAgreementName(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
