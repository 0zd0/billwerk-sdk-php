<?php

namespace Billwerk\Sdk\Model;

use Billwerk\Sdk\Enum\CardTypeEnum;
use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\StrongAuthenticationStatusEnum;
use Billwerk\Sdk\Enum\ThreeDSecureStatusEnum;
use DateTime;
use Exception;

class ApplePayModel extends AbstractCard
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
}
