<?php

namespace Billwerk\Sdk\Enum;

/**
 * Invoice state
 *
 * @see https://optimize-docs.billwerk.com/reference/getinvoice
 *
 * @package Billwerk\Sdk\Enum
 */
class InvoiceStateEnum
{
    public const CREATED    = 'created';
    public const PENDING    = 'pending';
    public const DUNNING    = 'dunning';
    public const SETTLED    = 'settled';
    public const CANCELLED  = 'cancelled';
    public const AUTHORIZED = 'authorized';
    public const FAILED     = 'failed';

    public static function getAll(): array
    {
        return [
            self::CREATED,
            self::PENDING,
            self::DUNNING,
            self::SETTLED,
            self::CANCELLED,
            self::AUTHORIZED,
            self::FAILED,
        ];
    }
}
