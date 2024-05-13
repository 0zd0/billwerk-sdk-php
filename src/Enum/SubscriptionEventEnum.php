<?php

namespace Billwerk\Sdk\Enum;

/**
 * Subscription events
 *
 * @see https://optimize-docs.billwerk.com/reference/event
 *
 * @package Billwerk\Sdk\Enum
 */
class SubscriptionEventEnum
{
    /**
     * Subscription has been created
     */
    public const SUBSCRIPTION_CREATED = 'subscription_created';

    /**
     * A payment method has been added to the subscription for the first time
     */
    public const SUBSCRIPTION_PAYMENT_METHOD_ADDED = 'subscription_payment_method_added';

    /**
     * The payment method has been changed for a subscription with an existing payment method
     */
    public const SUBSCRIPTION_PAYMENT_METHOD_CHANGED = 'subscription_payment_method_changed';

    /**
     * The trial period for subscription has ended
     */
    public const SUBSCRIPTION_TRIAL_END = 'subscription_trial_end';

    /**
     * An invoice has been made and new billing period has started for subscription
     */
    public const SUBSCRIPTION_RENEWAL = 'subscription_renewal';

    /**
     * Subscription has been cancelled to expire at end of current billing period
     */
    public const SUBSCRIPTION_CANCELLED = 'subscription_cancelled';

    /**
     * A previous cancellation has been cancelled
     */
    public const SUBSCRIPTION_UNCANCELLED = 'subscription_uncancelled';

    /**
     * Subscription has been put on hold by request
     */
    public const SUBSCRIPTION_ON_HOLD = 'subscription_on_hold';

    /**
     * Subscription has been put on hold due to a failed dunning process
     */
    public const SUBSCRIPTION_ON_HOLD_DUNNING = 'subscription_on_hold_dunning';

    /**
     * Subscription on hold has been reactivated to active state
     */
    public const SUBSCRIPTION_REACTIVATED = 'subscription_reactivated';

    /**
     * Subscription has expired either by request, end of fixed life time or because cancelled
     * and billing period has ended
     */
    public const SUBSCRIPTION_EXPIRED = 'subscription_expired';

    /**
     * Subscription has expired due to a failed dunning process
     */
    public const SUBSCRIPTION_EXPIRED_DUNNING = 'subscription_expired_dunning';

    /**
     * Subscription scheduling or pricing has been changed, e.g. by changed plan or changed next period start
     */
    public const SUBSCRIPTION_CHANGED = 'subscription_changed';

    public static function getAll(): array
    {
        return [
            self::SUBSCRIPTION_CREATED,
            self::SUBSCRIPTION_PAYMENT_METHOD_ADDED,
            self::SUBSCRIPTION_PAYMENT_METHOD_CHANGED,
            self::SUBSCRIPTION_TRIAL_END,
            self::SUBSCRIPTION_RENEWAL,
            self::SUBSCRIPTION_CANCELLED,
            self::SUBSCRIPTION_UNCANCELLED,
            self::SUBSCRIPTION_ON_HOLD,
            self::SUBSCRIPTION_ON_HOLD_DUNNING,
            self::SUBSCRIPTION_REACTIVATED,
            self::SUBSCRIPTION_EXPIRED,
            self::SUBSCRIPTION_EXPIRED_DUNNING,
            self::SUBSCRIPTION_CHANGED,
        ];
    }
}
