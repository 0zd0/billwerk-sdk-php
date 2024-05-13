<?php

namespace Billwerk\Sdk\Enum;

/**
 * Customer events
 *
 * @see https://optimize-docs.billwerk.com/reference/event
 *
 * @package Billwerk\Sdk\Enum
 */
class CustomerEventEnum
{
    /**
     * Customer has been created
     */
    public const CUSTOMER_CREATED = 'customer_created';

    /**
     * Customer information has been changed
     */
    public const CUSTOMER_CHANGED = 'customer_changed';

    /**
     * Customer has been deleted
     */
    public const CUSTOMER_DELETED = 'customer_deleted';

    /**
     * A payment method has been added to customer
     */
    public const CUSTOMER_PAYMENT_METHOD_ADDED = 'customer_payment_method_added';

    /**
     * Payment method has entered failed state and should not be used again for future payments
     */
    public const CUSTOMER_PAYMENT_METHOD_FAILED = 'customer_payment_method_failed';

    /**
     * Payment method has been updated, e.g. for EMV tokens when the underlying card changes resulting
     * in new masked card number and changed expiry date
     */
    public const CUSTOMER_PAYMENT_METHOD_UPDATED = 'customer_payment_method_updated';

    /**
     * Failed payment method is put back to state active. Can happen for EMV tokens if a suspended token
     * is resumed. Can happen for credit cards if a faild card is retried with success
     */
    public const CUSTOMER_PAYMENT_METHOD_REACTIVATED = 'customer_payment_method_reactivated';

    /**
     * A payment method has been deleted in the Admin or with API call
     */
    public const CUSTOMER_PAYMENT_METHOD_DELETED = 'customer_payment_method_deleted';

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
