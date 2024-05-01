<?php

namespace Billwerk\Sdk\Enum;

class InvoiceEventEnum
{
    public const INVOICE_CREATED              = 'invoice_created';
    public const INVOICE_SETTLED              = 'invoice_settled';
    public const INVOICE_AUTHORIZED           = 'invoice_authorized';
    public const INVOICE_DUNNING              = 'invoice_dunning';
    public const INVOICE_DUNNING_NOTIFICATION = 'invoice_dunning_notification';
    public const INVOICE_DUNNING_CANCELLED    = 'invoice_dunning_cancelled';
    public const INVOICE_FAILED               = 'invoice_failed';
    public const INVOICE_REFUND               = 'invoice_refund';
    public const INVOICE_REFUND_FAILED        = 'invoice_refund_failed';
    public const INVOICE_REACTIVATE           = 'invoice_reactivate';
    public const INVOICE_CANCELLED            = 'invoice_cancelled';
    public const INVOICE_CHANGED              = 'invoice_changed';
    public const INVOICE_CREDITED             = 'invoice_credited';

    public static function getAll(): array
    {
        return [
            self::INVOICE_CREATED,
            self::INVOICE_SETTLED,
            self::INVOICE_AUTHORIZED,
            self::INVOICE_DUNNING,
            self::INVOICE_DUNNING_NOTIFICATION,
            self::INVOICE_DUNNING_CANCELLED,
            self::INVOICE_FAILED,
            self::INVOICE_REFUND,
            self::INVOICE_REFUND_FAILED,
            self::INVOICE_REACTIVATE,
            self::INVOICE_CANCELLED,
            self::INVOICE_CHANGED,
            self::INVOICE_CREDITED,
        ];
    }
}
