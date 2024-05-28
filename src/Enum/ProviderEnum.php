<?php

namespace Billwerk\Sdk\Enum;

class ProviderEnum
{
    public const REEPAY        = 'reepay';
    public const CLEARHAUS     = 'clearhaus';
    public const NETS          = 'nets';
    public const SWEDBANK      = 'swedbank';
    public const HANDELSBANKEN = 'handelsbanken';
    public const ELAVON        = 'elavon';
    public const BAMBORA       = 'bambora';
    public const VALITOR       = 'valitor';
    public const DIBS          = 'dibs';
    public const STRIPE        = 'stripe';
    public const TEST          = 'test';

    public static function getAll(): array
    {
        return [
            self::REEPAY,
            self::CLEARHAUS,
            self::NETS,
            self::SWEDBANK,
            self::HANDELSBANKEN,
            self::ELAVON,
            self::BAMBORA,
            self::VALITOR,
            self::DIBS,
            self::STRIPE,
            self::TEST,
        ];
    }
}
