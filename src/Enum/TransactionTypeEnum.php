<?php

namespace Billwerk\Sdk\Enum;

/**
 * Transaction type
 *
 * @see https://optimize-docs.billwerk.com/reference/getinvoice
 *
 * @package Billwerk\Sdk\Enum
 */
class TransactionTypeEnum
{
    public const SETTLE        = 'settle';
    public const REFUND        = 'refund';
    public const AUTHORIZATION = 'authorization';

    public static function getAll(): array
    {
        return [
            self::SETTLE,
            self::REFUND,
            self::AUTHORIZATION,
        ];
    }
}
