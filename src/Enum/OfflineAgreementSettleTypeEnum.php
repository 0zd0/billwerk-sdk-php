<?php

namespace Billwerk\Sdk\Enum;

class OfflineAgreementSettleTypeEnum
{
    public const PENDING = 'pending';
    public const INSTANT = 'instant';

    public static function getAll(): array
    {
        return [
            self::PENDING,
            self::INSTANT,
        ];
    }
}
