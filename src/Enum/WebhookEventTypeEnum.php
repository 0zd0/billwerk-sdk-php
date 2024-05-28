<?php

namespace Billwerk\Sdk\Enum;

/**
 * Webhook events
 *
 * @see https://optimize-docs.billwerk.com/reference/event
 *
 * @package Billwerk\Sdk\Enum
 */
class WebhookEventTypeEnum
{
    public static function getAll(): array
    {
        return [
            ...CustomerEventEnum::getAll(),
            ...InvoiceEventEnum::getAll(),
            ...SubscriptionEventEnum::getAll()
        ];
    }
}
