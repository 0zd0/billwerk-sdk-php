<?php

namespace Billwerk\Sdk\Enum;

class PaymentTypeEnum
{
    public const CARD                    = 'card';
    public const EMV_TOKEN               = 'emv_token';
    public const VIPPS_RECURRING         = 'vipps_recurring';
    public const APPLEPAY                = 'applepay';
    public const MOBILEPAY_SUBSCRIPTIONS = 'mobilepay_subscriptions';
    public const SEPA                    = 'sepa';
    public const OFFLINE_CASH            = 'offline_cash';
    public const OFFLINE_BANK_TRANSFER   = 'offline_bank_transfer';
    public const OFFLINE_OTHER           = 'offline_other';

    public static function getAll(): array
    {
        return [
            self::CARD,
            self::EMV_TOKEN,
            self::VIPPS_RECURRING,
            self::APPLEPAY,
            self::MOBILEPAY_SUBSCRIPTIONS,
            self::SEPA,
            self::OFFLINE_CASH,
            self::OFFLINE_BANK_TRANSFER,
            self::OFFLINE_OTHER,
        ];
    }
}
