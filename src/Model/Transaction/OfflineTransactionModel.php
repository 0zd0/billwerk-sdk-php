<?php

namespace Billwerk\Sdk\Model\Transaction;

use Billwerk\Sdk\Model\OfflineMandateModel;
use Exception;

class OfflineTransactionModel extends AbstractTransactionModel
{
    /**
     * Offline agreement handle
     *
     * @var OfflineMandateModel|null $offlineMandate
     */
    protected ?OfflineMandateModel $offlineMandate = null;

    /**
     * Offline agreement handle used to initiate transaction. Only set when offline_mandate is not set
     *
     * @var string|null $offlineAgreementHandle
     */
    protected ?string $offlineAgreementHandle = null;

    /**
     * Offline payment instructions, either default from agreement or overriding from charge parameters
     *
     * @var string $offlinePaymentInstructions
     */
    protected string $offlinePaymentInstructions;

    /**
     * @return OfflineMandateModel|null
     */
    public function getOfflineMandate(): ?OfflineMandateModel
    {
        return $this->offlineMandate;
    }

    /**
     * @return string|null
     */
    public function getOfflineAgreementHandle(): ?string
    {
        return $this->offlineAgreementHandle;
    }

    /**
     * @return string
     */
    public function getOfflinePaymentInstructions(): string
    {
        return $this->offlinePaymentInstructions;
    }

    /**
     * @param OfflineMandateModel|null $offlineMandate
     *
     * @return self
     */
    public function setOfflineMandate(?OfflineMandateModel $offlineMandate): self
    {
        $this->offlineMandate = $offlineMandate;

        return $this;
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
     * @param string $offlinePaymentInstructions
     *
     * @return self
     */
    public function setOfflinePaymentInstructions(string $offlinePaymentInstructions): self
    {
        $this->offlinePaymentInstructions = $offlinePaymentInstructions;

        return $this;
    }

    /**
     * @param array $response
     *
     * @return self
     * @throws Exception
     */
    public static function fromArray(array $response): self
    {
        $model = new static();

        $model->fromArrayDefault($response);

        $model->setOfflinePaymentInstructions($response['offline_payment_instructions']);

        if (isset($response['offline_agreement_handle'])) {
            $model->setOfflineAgreementHandle($response['offline_agreement_handle']);
        }

        if (isset($response['offline_mandate'])) {
            $model->setOfflineMandate(OfflineMandateModel::fromArray($response['offline_mandate']));
        }

        return $model;
    }
}
