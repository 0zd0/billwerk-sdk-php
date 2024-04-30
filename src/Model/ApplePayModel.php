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
        $card = new self();
        
        $card->setGateway($response['gateway']);
        
        if (isset($response['fingerprint'])) {
            $card->setFingerprint($response['fingerprint']);
        }
        
        if (isset($response['reactivated'])) {
            $card->setReactivated(new DateTime($response['reactivated']));
        }
        
        $card->setGwRef($response['gw_ref']);
        
        if (in_array($response['card_type'], CardTypeEnum::getAll(), true)) {
            $card->setCardType($response['card_type']);
        }
        
        if (in_array($response['transaction_card_type'], CardTypeEnum::getAll(), true)) {
            $card->setTransactionCardType($response['transaction_card_type']);
        }
        
        $card->setCardAgreement($response['card_agreement']);
        
        if (isset($response['exp_date'])) {
            $card->setExpDate($response['exp_date']);
        }
        
        if (isset($response['masked_card'])) {
            $card->setMaskedCard($response['masked_card']);
        }
        
        if (isset($response['last_success'])) {
            $card->setLastSuccess(new DateTime($response['last_success']));
        }
        
        if (isset($response['last_failed'])) {
            $card->setLastFailed(new DateTime($response['last_failed']));
        }
        
        if (isset($response['first_fail'])) {
            $card->setFirstFail(new DateTime($response['first_fail']));
        }
        
        if (isset($response['error_code'])) {
            $card->setErrorCode($response['error_code']);
        }
        
        if (isset($response['error_state'])) {
            if (in_array($response['error_state'], ErrorStateEnum::getAll(), true)) {
                $card->setErrorState($response['error_state']);
            }
        }
        
        if (isset($response['declined_count'])) {
            $card->setDeclinedCount($response['declined_count']);
        }
        
        if (isset($response['strong_authentication_status'])) {
            if (in_array($response['strong_authentication_status'], StrongAuthenticationStatusEnum::getAll(), true)) {
                $card->setStrongAuthenticationStatus($response['strong_authentication_status']);
            }
        }
        
        if (isset($response['three_d_secure_status'])) {
            if (in_array($response['three_d_secure_status'], ThreeDSecureStatusEnum::getAll(), true)) {
                $card->setThreeDSecureStatus($response['three_d_secure_status']);
            }
        }
        
        if (isset($response['risk_rule'])) {
            $card->setRiskRule($response['risk_rule']);
        }
        
        if (isset($response['card_country'])) {
            $card->setCardCountry($response['card_country']);
        }
        
        return $card;
    }
}
