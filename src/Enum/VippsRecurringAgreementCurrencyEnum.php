<?php

namespace Billwerk\Sdk\Enum;

class VippsRecurringAgreementCurrencyEnum
{
    public const NOK = 'NOK';
    public const DKK = 'DKK';
    public const EUR = 'EUR';

    public static function getAll(): array
    {
        return [
            self::NOK,
            self::DKK,
            self::EUR,
        ];
    }
}
