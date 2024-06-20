<?php

namespace Billwerk\Sdk\Enum;

class AgreementUsageEnum
{
    public const SINGLE = 'single';
    public const REUSABLE = 'reusable';
    public const SUBSCRIPTION = 'subscription';

    public static function getAll(): array
    {
        return [
            self::SINGLE,
            self::REUSABLE,
            self::SUBSCRIPTION,
        ];
    }
}
