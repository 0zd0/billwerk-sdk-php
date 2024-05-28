<?php

namespace Billwerk\Sdk\Enum;

class RefundStateEnum
{
    public const REFUNDED   = 'refunded';
    public const FAILED     = 'failed';
    public const PROCESSING = 'processing';

    public static function getAll(): array
    {
        return [
            self::REFUNDED,
            self::FAILED,
            self::PROCESSING
        ];
    }
}
