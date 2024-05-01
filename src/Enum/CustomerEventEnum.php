<?php

namespace Billwerk\Sdk\Enum;

class CustomerEventEnum
{
    public const CUSTOMER_CREATED                    = 'customer_created';
    public const CUSTOMER_CHANGED                    = 'customer_changed';
    public const CUSTOMER_DELETED                    = 'customer_deleted';
    public const CUSTOMER_PAYMENT_METHOD_ADDED       = 'customer_payment_method_added';
    public const CUSTOMER_PAYMENT_METHOD_FAILED      = 'customer_payment_method_failed';
    public const CUSTOMER_PAYMENT_METHOD_UPDATED     = 'customer_payment_method_updated';
    public const CUSTOMER_PAYMENT_METHOD_REACTIVATED = 'customer_payment_method_reactivated';
    public const CUSTOMER_PAYMENT_METHOD_DELETED     = 'customer_payment_method_deleted';

    public static function getAll(): array
    {
        return [
            self::CUSTOMER_CREATED,
            self::CUSTOMER_CHANGED,
            self::CUSTOMER_DELETED,
            self::CUSTOMER_PAYMENT_METHOD_ADDED,
            self::CUSTOMER_PAYMENT_METHOD_FAILED,
            self::CUSTOMER_PAYMENT_METHOD_UPDATED,
            self::CUSTOMER_PAYMENT_METHOD_REACTIVATED,
            self::CUSTOMER_PAYMENT_METHOD_DELETED,
        ];
    }
}
