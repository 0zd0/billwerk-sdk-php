<?php

namespace Billwerk\Sdk\Enum;

/**
 * Type of invoice
 *
 * @see https://optimize-docs.billwerk.com/reference/getinvoice
 *
 * @package Billwerk\Sdk\Enum
 */
class InvoiceTypeEnum
{
    public const SUBSCRIPTION_RECURRING        = 's';
    public const SUBSCRIPTION_ONE_TIME         = 'so';
    public const SUBSCRIPTION_ONE_TIME_INSTANT = 'soi';
    public const CUSTOMER_ONE_TIME             = 'co';
    public const CHARGE                        = 'ch';

    public static function getAll(): array
    {
        return [
            self::SUBSCRIPTION_RECURRING,
            self::SUBSCRIPTION_ONE_TIME,
            self::SUBSCRIPTION_ONE_TIME_INSTANT,
            self::CUSTOMER_ONE_TIME,
            self::CHARGE,
        ];
    }
}
