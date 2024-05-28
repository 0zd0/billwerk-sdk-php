<?php

namespace Billwerk\Sdk\Enum;

class AgeIndicatorEnum
{
    public const GUEST_ACCOUNT      = 'guest_account';
    public const THIS_TRANSACTION   = 'this_transaction';
    public const LESS_THAN_30_DAYS  = 'less_than_30_days';
    public const FROM_30_TO_60_DAYS = 'from_30_to_60_days';
    public const MORE_THAN_60_DAYS  = 'more_than_60_days';

    public static function getAll(): array
    {
        return [
            self::GUEST_ACCOUNT,
            self::THIS_TRANSACTION,
            self::LESS_THAN_30_DAYS,
            self::FROM_30_TO_60_DAYS,
            self::MORE_THAN_60_DAYS,
        ];
    }
}
