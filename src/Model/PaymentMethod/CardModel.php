<?php

namespace Billwerk\Sdk\Model\PaymentMethod;

use Billwerk\Sdk\Enum\CardTypeEnum;
use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\StrongAuthenticationStatusEnum;
use Billwerk\Sdk\Enum\ThreeDSecureStatusEnum;
use Billwerk\Sdk\Model\AbstractCard;
use DateTime;
use Exception;

/**
 * Card in payment method
 *
 * @see https://optimize-docs.billwerk.com/reference/getpaymentmethodv2
 *
 * @package Billwerk\Sdk\Model
 */
class CardModel extends AbstractCard
{
    /**
     * @throws Exception
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        $model
            ->setGateway($response['gateway'])
            ->setGwRef($response['gw_ref'])
            ->setCardAgreement($response['card_agreement']);

        if (isset($response['fingerprint'])) {
            $model->setFingerprint($response['fingerprint']);
        }

        if (isset($response['reactivated'])) {
            $model->setReactivated(new DateTime($response['reactivated']));
        }

        if (in_array($response['card_type'], CardTypeEnum::getAll(), true)) {
            $model->setCardType($response['card_type']);
        }

        if (in_array($response['transaction_card_type'], CardTypeEnum::getAll(), true)) {
            $model->setTransactionCardType($response['transaction_card_type']);
        }

        if (isset($response['exp_date'])) {
            $model->setExpDate($response['exp_date']);
        }

        if (isset($response['masked_card'])) {
            $model->setMaskedCard($response['masked_card']);
        }

        if (isset($response['last_success'])) {
            $model->setLastSuccess(new DateTime($response['last_success']));
        }

        if (isset($response['last_failed'])) {
            $model->setLastFailed(new DateTime($response['last_failed']));
        }

        if (isset($response['first_fail'])) {
            $model->setFirstFail(new DateTime($response['first_fail']));
        }

        if (isset($response['error_code'])) {
            $model->setErrorCode($response['error_code']);
        }

        if (isset($response['error_state'])) {
            if (in_array($response['error_state'], ErrorStateEnum::getAll(), true)) {
                $model->setErrorState($response['error_state']);
            }
        }

        if (isset($response['declined_count'])) {
            $model->setDeclinedCount($response['declined_count']);
        }

        if (isset($response['strong_authentication_status'])) {
            if (in_array($response['strong_authentication_status'], StrongAuthenticationStatusEnum::getAll(), true)) {
                $model->setStrongAuthenticationStatus($response['strong_authentication_status']);
            }
        }

        if (isset($response['three_d_secure_status'])) {
            if (in_array($response['three_d_secure_status'], ThreeDSecureStatusEnum::getAll(), true)) {
                $model->setThreeDSecureStatus($response['three_d_secure_status']);
            }
        }

        if (isset($response['risk_rule'])) {
            $model->setRiskRule($response['risk_rule']);
        }

        if (isset($response['card_country'])) {
            $model->setCardCountry($response['card_country']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'gateway' => $this->getGateway(),
            'gw_ref' => $this->getGwRef(),
            'card_agreement' => $this->getCardAgreement(),
            'fingerprint' => $this->getFingerprint(),
            'reactivated' => $this->getReactivated() ? $this->getReactivated()->format('Y-m-d\TH:i:s.v') : null,
            'card_type' => $this->getCardType(),
            'transaction_card_type' => $this->getTransactionCardType(),
            'exp_date' => $this->getExpDate(),
            'masked_card' => $this->getMaskedCard(),
            'last_success' => $this->getLastSuccess() ? $this->getLastSuccess()->format('Y-m-d\TH:i:s.v') : null,
            'last_failed' => $this->getLastFailed() ? $this->getLastFailed()->format('Y-m-d\TH:i:s.v') : null,
            'first_fail' => $this->getFirstFail() ? $this->getFirstFail()->format('Y-m-d\TH:i:s.v') : null,
            'error_code' => $this->getErrorCode(),
            'error_state' => $this->getErrorState(),
            'declined_count' => $this->getDeclinedCount(),
            'strong_authentication_status' => $this->getStrongAuthenticationStatus(),
            'three_d_secure_status' => $this->getThreeDSecureStatus(),
            'risk_rule' => $this->getRiskRule(),
            'card_country' => $this->getCardCountry(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
