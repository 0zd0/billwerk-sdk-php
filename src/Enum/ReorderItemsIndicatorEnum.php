<?php

namespace Billwerk\Sdk\Enum;

class ReorderItemsIndicatorEnum
{
    public const FIRST_TIME_ORDERED = 'first_time_ordered';
    public const REORDERED          = 'reordered';

    public static function getAll(): array
    {
        return [
            self::FIRST_TIME_ORDERED,
            self::REORDERED,
        ];
    }
}
