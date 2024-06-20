<?php

namespace Billwerk\Sdk\Enum;

class KlarnaAgreementPaymentTypeEnum
{
    public const KLARNA_PAY_NOW = 'klarna_pay_now';
    public const KLARNA_PAY_LATER = 'klarna_pay_later';
    public const KLARNA_SLICE_IT = 'klarna_slice_it';
    public const KLARNA_DIRECT_BANK_TRANSFER = 'klarna_direct_bank_transfer';
    public const KLARNA_DIRECT_DEBIT = 'klarna_direct_debit';

    public static function getAll(): array
    {
        return [
            self::KLARNA_PAY_NOW,
            self::KLARNA_PAY_LATER,
            self::KLARNA_SLICE_IT,
            self::KLARNA_DIRECT_BANK_TRANSFER,
            self::KLARNA_DIRECT_DEBIT,
        ];
    }
}
