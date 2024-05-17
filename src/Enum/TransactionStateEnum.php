<?php

namespace Billwerk\Sdk\Enum;

/**
 * State of transaction
 *
 * @see https://optimize-docs.billwerk.com/reference/getinvoice
 *
 * @package Billwerk\Sdk\Enum
 */
class TransactionStateEnum
{
    public const PENDING    = 'pending';
    public const PROCESSING = 'processing';
    public const AUTHORIZED = 'authorized';
    public const SETTLED    = 'settled';
    public const REFUNDED   = 'refunded';
    public const FAILED     = 'failed';
    public const CANCELLED  = 'cancelled';

    public static function getAll(): array
    {
        return [
            self::PENDING,
            self::PROCESSING,
            self::AUTHORIZED,
            self::SETTLED,
            self::REFUNDED,
            self::FAILED,
            self::CANCELLED,
        ];
    }
}
