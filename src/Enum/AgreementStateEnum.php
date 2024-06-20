<?php

namespace Billwerk\Sdk\Enum;

class AgreementStateEnum
{
    public const ACTIVE = 'active';
    public const DISABLED = 'disabled';
    public const PENDING = 'pending';
    public const DELETED = 'deleted';

    public static function getAll(): array
    {
        return [
            self::ACTIVE,
            self::DISABLED,
            self::PENDING,
            self::DELETED,
        ];
    }
}
