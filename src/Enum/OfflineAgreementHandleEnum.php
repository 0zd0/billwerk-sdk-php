<?php

namespace Billwerk\Sdk\Enum;

class OfflineAgreementHandleEnum
{
    public const OFFLINE_BANK_TRANSFER = 'offline_bank_transfer';
    public const OFFLINE_CASH = 'offline_cash';
    public const OFFLINE_OTHER = 'offline_other';

    public static function getAll(): array
    {
        return [
            self::OFFLINE_BANK_TRANSFER,
            self::OFFLINE_CASH,
            self::OFFLINE_OTHER,
        ];
    }
}
