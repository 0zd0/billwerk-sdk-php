<?php

namespace Billwerk\Sdk\Enum;

class VippsRecurringAgreementChargeTypeEnum
{
    public const RECURRING = 'recurring';
    public const UNSCHEDULED = 'unscheduled';

    public static function getAll(): array
    {
        return [
            self::RECURRING,
            self::UNSCHEDULED,
        ];
    }
}
