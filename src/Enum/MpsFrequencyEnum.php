<?php

namespace Billwerk\Sdk\Enum;

class MpsFrequencyEnum
{
    public const FLEXIBLE  = 'flexible';
    public const YEARLY    = 'yearly';
    public const BIYEARLY  = 'biyearly';
    public const QUARTERLY = 'quarterly';
    public const MONTHLY   = 'monthly';
    public const BIWEEKLY  = 'biweekly';
    public const WEEKLY    = 'weekly';
    public const DAILY     = 'daily';

    public static function getAll(): array
    {
        return [
            self::FLEXIBLE,
            self::YEARLY,
            self::BIYEARLY,
            self::QUARTERLY,
            self::MONTHLY,
            self::BIWEEKLY,
            self::WEEKLY,
            self::DAILY,
        ];
    }
}
