<?php

namespace Billwerk\Sdk\Enum;

class StrongAuthenticationStatusEnum
{
    public const THREED_SECURE              = 'threed_secure';
    public const THREED_SECURE_NOT_ENROLLED = 'threed_secure_not_enrolled';
    public const SECURED_BY_NETS            = 'secured_by_nets';

    public static function getAll(): array
    {
        return [
            self::THREED_SECURE,
            self::THREED_SECURE_NOT_ENROLLED,
            self::SECURED_BY_NETS,
        ];
    }
}
