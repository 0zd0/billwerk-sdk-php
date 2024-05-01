<?php

namespace Billwerk\Sdk\Enum;

class CardTypeEnum
{
    public const UNKNOWN   = 'unknown';
    public const VISA      = 'visa';
    public const MC        = 'mc';
    public const DANKORT   = 'dankort';
    public const VISA_DK   = 'visa_dk';
    public const FFK       = 'ffk';
    public const VISA_ELEC = 'via_elec';
    public const MAESTRO   = 'maestro';
    public const LASER     = 'laser';
    public const AMEX      = 'amex';
    public const DINERS    = 'diners';
    public const DISCOVER  = 'discover';
    public const JCB       = 'jcb';

    public static function getAll(): array
    {
        return [
            self::UNKNOWN,
            self::VISA,
            self::MC,
            self::DANKORT,
            self::VISA_DK,
            self::FFK,
            self::VISA_ELEC,
            self::MAESTRO,
            self::LASER,
            self::AMEX,
            self::DINERS,
            self::DISCOVER,
            self::JCB,
        ];
    }
}
