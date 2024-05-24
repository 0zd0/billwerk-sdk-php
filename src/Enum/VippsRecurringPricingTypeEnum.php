<?php

namespace Billwerk\Sdk\Enum;

class VippsRecurringPricingTypeEnum
{
    public const LEGACY   = 'legacy';
    public const VARIABLE = 'variable';

    public static function getAll(): array
    {
        return [
            self::LEGACY,
            self::VARIABLE,
        ];
    }
}
