<?php

namespace Billwerk\Sdk\Enum;

class MpsSubscriptionStateEnum
{
    public const ACTIVE = 'active';
    public const INACTIVATED = 'inactivated';
    public const FAILED = 'failed';
    public const PENDING = 'pending';
    public const DELETED = 'deleted';

    public static function getAll(): array
    {
        return [
            self::ACTIVE,
            self::INACTIVATED,
            self::FAILED,
            self::PENDING,
            self::DELETED,
        ];
    }
}
