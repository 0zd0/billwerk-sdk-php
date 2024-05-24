<?php

namespace Billwerk\Sdk\Enum;

class IntervalUnitEnum
{
    public const YEAR  = 'year';
    public const MONTH = 'month';
    public const WEEK = 'week';
    public const DAY   = 'day';

    public static function getAll(): array
    {
        return [
            self::DAY,
            self::WEEK,
            self::MONTH,
            self::YEAR,
        ];
    }
}
