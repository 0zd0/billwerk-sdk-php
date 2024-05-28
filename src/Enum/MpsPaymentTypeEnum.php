<?php

namespace Billwerk\Sdk\Enum;

class MpsPaymentTypeEnum
{
    public const REGULAR = 'regular';
    public const ONE_OFF_CIT = 'one_off_cit';
    public const ONE_OFF_MIT = 'one_off_mit';

    public static function getAll(): array
    {
        return [
            self::REGULAR,
            self::ONE_OFF_CIT,
            self::ONE_OFF_MIT,
        ];
    }
}
