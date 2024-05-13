<?php

namespace Billwerk\Sdk\Enum;

class ManualTransferMethodEnum
{
    public const CASH          = 'cash';
    public const CHARGEBACK    = 'chargeback';
    public const BANK_TRANSFER = 'bank_transfer';
    public const CHECK         = 'check';
    public const OTHER         = 'other';

    public static function getAll(): array
    {
        return [
            self::CASH,
            self::CHARGEBACK,
            self::BANK_TRANSFER,
            self::CHECK,
            self::OTHER,
        ];
    }
}
