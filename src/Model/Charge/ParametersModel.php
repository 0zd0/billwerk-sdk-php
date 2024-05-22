<?php

namespace Billwerk\Sdk\Model\Charge;

use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasRequestApiInterface;

class ParametersModel extends AbstractModel implements HasRequestApiInterface
{
    /**
     * Optional override of default MPS payment expiration. The period is defined as
     * an ISO-8601 duration. See https://en.wikipedia.org/wiki/ISO_8601#Durations
     *
     * @var string|null $mpsTtl
     */
    protected ?string $mpsTtl = null;

    /**
     * Required offline agreement handle, if source = 'offline'.
     *
     * @var string|null $offlineAgreementHandle
     */
    protected ?string $offlineAgreementHandle = null;

    /**
     * Optional override of payment instructions of the default instructions from the agreement
     * @var string|null $offlinePaymentInstructions
     */
    protected ?string $offlinePaymentInstructions = null;

    /**
     * @return string|null
     */
    public function getOfflineAgreementHandle(): ?string
    {
        return $this->offlineAgreementHandle;
    }

    /**
     * @return string|null
     */
    public function getOfflinePaymentInstructions(): ?string
    {
        return $this->offlinePaymentInstructions;
    }

    /**
     * @return string|null
     */
    public function getMpsTtl(): ?string
    {
        return $this->mpsTtl;
    }

    /**
     * @param string|null $offlineAgreementHandle
     *
     * @return self
     */
    public function setOfflineAgreementHandle(?string $offlineAgreementHandle): self
    {
        $this->offlineAgreementHandle = $offlineAgreementHandle;

        return $this;
    }

    /**
     * @param string|null $mpsTtl
     *
     * @return self
     */
    public function setMpsTtl(?string $mpsTtl): self
    {
        $this->mpsTtl = $mpsTtl;

        return $this;
    }

    /**
     * @param string|null $offlinePaymentInstructions
     *
     * @return self
     */
    public function setOfflinePaymentInstructions(?string $offlinePaymentInstructions): self
    {
        $this->offlinePaymentInstructions = $offlinePaymentInstructions;

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

        if (isset($response['mps_ttl'])) {
            $model->setMpsTtl($response['mps_ttl']);
        }

        if (isset($response['offline_agreement_handle'])) {
            $model->setOfflineAgreementHandle($response['offline_agreement_handle']);
        }

        if (isset($response['offline_payment_instructions'])) {
            $model->setOfflinePaymentInstructions($response['offline_payment_instructions']);
        }

        return $model;
    }

    public function toApi(): array
    {
        $result = [];

        if ( ! is_null($this->getMpsTtl())) {
            $result['mps_ttl'] = $this->getMpsTtl();
        }

        if ( ! is_null($this->getOfflineAgreementHandle())) {
            $result['offline_agreement_handle'] = $this->getOfflineAgreementHandle();
        }

        if ( ! is_null($this->getOfflinePaymentInstructions())) {
            $result['offline_payment_instructions'] = $this->getOfflinePaymentInstructions();
        }

        return $result;
    }
}
