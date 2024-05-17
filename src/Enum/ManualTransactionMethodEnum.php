<?php

namespace Billwerk\Sdk\Enum;

class ManualTransactionMethodEnum
{
    public const CASH          = 'cash';
    public const BANK_TRANSFER = 'bank_transfer';
    public const CHECK         = 'check';
    public const CHARGEBACK    = 'chargeback';
    public const OTHER         = 'other';

    public static function getAll(): array
    {
        return [
            self::CASH,
            self::BANK_TRANSFER,
            self::CHECK,
            self::CHARGEBACK,
            self::OTHER,
        ];
    }
}
