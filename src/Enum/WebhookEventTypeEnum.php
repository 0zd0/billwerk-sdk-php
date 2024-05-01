<?php

namespace Billwerk\Sdk\Enum;

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
