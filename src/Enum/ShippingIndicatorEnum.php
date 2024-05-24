<?php

namespace Billwerk\Sdk\Enum;

class ShippingIndicatorEnum
{
    public const BILLING_ADDRESS          = 'billing_address';
    public const VERIFIED                 = 'verified';
    public const NON_BILLING_ADDRESS      = 'non_billing_address';
    public const SHIP_TO_STORE            = 'ship_to_store';
    public const DIGITAL_GOODS            = 'digital_goods';
    public const TRAVEL_AND_EVENT_TICKETS = 'travel_and_event_tickets';
    public const OTHER                    = 'other';

    public static function getAll(): array
    {
        return [
            self::BILLING_ADDRESS,
            self::VERIFIED,
            self::NON_BILLING_ADDRESS,
            self::SHIP_TO_STORE,
            self::DIGITAL_GOODS,
            self::TRAVEL_AND_EVENT_TICKETS,
            self::OTHER,
        ];
    }
}
