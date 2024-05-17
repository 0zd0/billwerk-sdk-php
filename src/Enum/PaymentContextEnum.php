<?php

namespace Billwerk\Sdk\Enum;

class PaymentContextEnum
{
    public const CIT     = 'cit';
    public const MIT     = 'mit';
    public const CIT_COF = 'cit_cof';

    public static function getAll(): array
    {
        return [
            self::CIT,
            self::MIT,
            self::CIT_COF,
        ];
    }
}
