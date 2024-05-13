<?php

namespace Billwerk\Sdk\Enum;

/**
 * Invoice events
 *
 * @see https://optimize-docs.billwerk.com/reference/event
 *
 * @package Billwerk\Sdk\Enum
 */
class InvoiceEventEnum
{
    /**
     * Invoice has been created
     */
    public const INVOICE_CREATED = 'invoice_created';

    /**
     * Invoice has been settled
     */
    public const INVOICE_SETTLED = 'invoice_settled';

    /**
     * Invoice has been authorized
     */
    public const INVOICE_AUTHORIZED = 'invoice_authorized';

    /**
     * Invoice has entered dunning state
     */
    public const INVOICE_DUNNING = 'invoice_dunning';

    /**
     * Time for sending dunning notification acording to dunning plan
     */
    public const INVOICE_DUNNING_NOTIFICATION = 'invoice_dunning_notification';

    /**
     * An ongoing dunning process has been cancelled either because the invoice has been
     * settled or because the invoice has been cancelled
     */
    public const INVOICE_DUNNING_CANCELLED = 'invoice_dunning_cancelled';

    /**
     * Invoice has failed. A failed may later be authorized, settled, cancelled or fail again.
     * For subscription invoices due to an unsuccessful dunning process or because of instant
     * ondemand settle fail
     */
    public const INVOICE_FAILED = 'invoice_failed';

    /**
     * A refund has been performed on a settled invoice
     */
    public const INVOICE_REFUND = 'invoice_refund';

    /**
     * For asynchronous refund this event will be fired if the refund fails. An asynchronous refund
     * will be indicated by the refund state processing when performing the refund
     */
    public const INVOICE_REFUND_FAILED = 'invoice_refund_failed';

    /**
     * A failed or cancelled invoice has been reactivated to state pending for processing
     */
    public const INVOICE_REACTIVATE = 'invoice_reactivate';

    /**
     * Invoice has been cancelled
     */
    public const INVOICE_CANCELLED = 'invoice_cancelled';

    /**
     * State has not changed but other attributes on the invoice has changed. E.g. settle later cancel
     */
    public const INVOICE_CHANGED = 'invoice_changed';

    /**
     * Invoice has been credited by creating attached an credit note and creating a subscription credit
     */
    public const INVOICE_CREDITED = 'invoice_credited';

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
