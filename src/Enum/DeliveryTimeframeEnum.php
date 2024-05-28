<?php

namespace Billwerk\Sdk\Enum;

class DeliveryTimeframeEnum
{
    public const ELECTRONIC               = 'electronic';
    public const SAME_DAY_SHIPPING        = 'same_day_shipping';
    public const OVERNIGHT_SHIPPING       = 'overnight_shipping';
    public const TWO_DAY_OR_MORE_SHIPPING = 'two_day_or_more_shipping';

    public static function getAll(): array
    {
        return [
            self::ELECTRONIC,
            self::SAME_DAY_SHIPPING,
            self::OVERNIGHT_SHIPPING,
            self::TWO_DAY_OR_MORE_SHIPPING,
        ];
    }
}
