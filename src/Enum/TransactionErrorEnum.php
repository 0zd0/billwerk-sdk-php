<?php

namespace Billwerk\Sdk\Enum;

class TransactionErrorEnum
{
    public const INSUFFICIENT_FUNDS            = 'insufficient_funds';
    public const SETTLE_BLOCKED                = 'settle_blocked';
    public const CREDIT_CARD_EXPIRED           = 'credit_card_expired';
    public const DECLINED_BY_ACQUIRER          = 'declined_by_acquirer';
    public const CREDIT_CARD_LOST_OR_STOLEN    = 'credit_card_lost_or_stolen';
    public const CREDIT_CARD_SUSPECTED_FRAUD   = 'credit_card_suspected_fraud';
    public const FRAUD_AMOUNT_TOO_HIGH         = 'refund_amount_too_high';
    public const AUTHORIZATION_EXPIRED         = 'authorization_expired';
    public const AUTHORIZATION_AMOUNT_EXCEEDED = 'authorization_amount_exceeded';
    public const AUTHORIZATION_VOIDED          = 'authorization_voided';
    public const SCA_REQUIRED                  = 'sca_required';
    public const RISK_FILTER_BLOCK             = 'risk_filter_block';
    public const FRAUD_BLOCK                   = 'fraud_block';
    public const EMV_TOKEN_DELETED             = 'emv_token_deleted';
    public const EMV_TOKEN_SUSPENDED           = 'emv_token_suspended';
    public const ACQUIRER_COMMUNICATION_ERROR  = 'acquirer_communication_error';
    public const ACQUIRER_ERROR                = 'acquirer_error';
    public const ACQUIRER_INTEGRATION_ERROR    = 'acquirer_integration_error';
    public const ACQUIRER_AUTHENTICATION_ERROR = 'acquirer_authentication_error';
    public const ACQUIRER_CONFIGURATION_ERROR  = 'acquirer_configuration_error';
    public const ACQUIRER_REJECTED_ERROR       = 'acquirer_rejected_error';

    public static function getAll(): array
    {
        return [
            self::INSUFFICIENT_FUNDS,
            self::SETTLE_BLOCKED,
            self::CREDIT_CARD_EXPIRED,
            self::DECLINED_BY_ACQUIRER,
            self::CREDIT_CARD_LOST_OR_STOLEN,
            self::CREDIT_CARD_SUSPECTED_FRAUD,
            self::FRAUD_AMOUNT_TOO_HIGH,
            self::AUTHORIZATION_EXPIRED,
            self::AUTHORIZATION_AMOUNT_EXCEEDED,
            self::AUTHORIZATION_VOIDED,
            self::SCA_REQUIRED,
            self::RISK_FILTER_BLOCK,
            self::FRAUD_BLOCK,
            self::EMV_TOKEN_DELETED,
            self::EMV_TOKEN_SUSPENDED,
            self::ACQUIRER_COMMUNICATION_ERROR,
            self::ACQUIRER_ERROR,
            self::ACQUIRER_INTEGRATION_ERROR,
            self::ACQUIRER_AUTHENTICATION_ERROR,
            self::ACQUIRER_CONFIGURATION_ERROR,
            self::ACQUIRER_REJECTED_ERROR
        ];
    }
}
