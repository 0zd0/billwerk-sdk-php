<?php

namespace Billwerk\Sdk\Enum;

/**
 * Order line origin
 *
 * @see https://optimize-docs.billwerk.com/reference/getinvoice
 *
 * @package Billwerk\Sdk\Enum
 */
class OrderLineOriginEnum
{
    public const PLAN            = 'plan';
    public const ADD_ON          = 'add_on';
    public const ONDEMAND        = 'ondemand';
    public const ADDITIONAL_COST = 'additional_cost';
    public const CREDIT          = 'credit';
    public const DISCOUNT        = 'discount';
    public const SETUP_FEE       = 'setup_fee';
    public const SURCHARGE_FEE   = 'surcharge_fee';

    public static function getAll(): array
    {
        return [
            self::PLAN,
            self::ADD_ON,
            self::ONDEMAND,
            self::ADDITIONAL_COST,
            self::CREDIT,
            self::DISCOUNT,
            self::SETUP_FEE,
            self::SURCHARGE_FEE,
        ];
    }
}
