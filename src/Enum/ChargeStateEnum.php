<?php

namespace Billwerk\Sdk\Enum;

class ChargeStateEnum
{
    public const CREATED    = 'created';
    public const AUTHORIZED = 'authorized';
    public const SETTLED    = 'settled';
    public const FAILED     = 'failed';
    public const CANCELED   = 'cancelled';
    public const PENDING    = 'pending';

    public static function getAll(): array
    {
        return [
            self::CREATED,
            self::AUTHORIZED,
            self::SETTLED,
            self::FAILED,
            self::CANCELED,
            self::PENDING,
        ];
    }
}
