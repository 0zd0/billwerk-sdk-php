<?php

namespace Billwerk\Sdk\Enum;

class KlarnaTransactionTypeEnum
{
    public const PAY_NOW              = 'klarna_pay_now';
    public const PAY_LATER            = 'klarna_pay_later';
    public const SLICE_IT             = 'klarna_slice_it';
    public const DIRECT_BANK_TRANSFER = 'klarna_direct_bank_transfer';
    public const DIRECT_DEBIT         = 'klarna_direct_debit';

    public static function getAll(): array
    {
        return [
            self::PAY_NOW,
            self::PAY_LATER,
            self::SLICE_IT,
            self::DIRECT_BANK_TRANSFER,
            self::DIRECT_DEBIT
        ];
    }
}
