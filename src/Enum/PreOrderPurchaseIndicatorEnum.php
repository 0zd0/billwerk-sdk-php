<?php

namespace Billwerk\Sdk\Enum;

class PreOrderPurchaseIndicatorEnum
{
    public const MERCHANDISE_AVAILABLE = 'merchandise_available';
    public const FUTURE_AVAILABILITY   = 'future_availability';

    public static function getAll(): array
    {
        return [
            self::MERCHANDISE_AVAILABLE,
            self::FUTURE_AVAILABILITY,
        ];
    }
}
