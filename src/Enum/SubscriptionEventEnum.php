<?php

namespace Billwerk\Sdk\Enum;

class SubscriptionEventEnum
{
    public const SUBSCRIPTION_CREATED                = 'subscription_created';
    public const SUBSCRIPTION_PAYMENT_METHOD_ADDED   = 'subscription_payment_method_added';
    public const SUBSCRIPTION_PAYMENT_METHOD_CHANGED = 'subscription_payment_method_changed';
    public const SUBSCRIPTION_TRIAL_END              = 'subscription_trial_end';
    public const SUBSCRIPTION_RENEWAL                = 'subscription_renewal';
    public const SUBSCRIPTION_CANCELLED              = 'subscription_cancelled';
    public const SUBSCRIPTION_UNCANCELLED            = 'subscription_uncancelled';
    public const SUBSCRIPTION_ON_HOLD                = 'subscription_on_hold';
    public const SUBSCRIPTION_ON_HOLD_DUNNING        = 'subscription_on_hold_dunning';
    public const SUBSCRIPTION_REACTIVATED            = 'subscription_reactivated';
    public const SUBSCRIPTION_EXPIRED                = 'subscription_expired';
    public const SUBSCRIPTION_EXPIRED_DUNNING        = 'subscription_expired_dunning';
    public const SUBSCRIPTION_CHANGED                = 'subscription_changed';

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
