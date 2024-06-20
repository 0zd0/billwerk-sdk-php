<?php

namespace Billwerk\Sdk\Enum;

class CardGatewayAgreementPaymentTypeEnum
{
    public const CARD = 'card';
    public const APPLEPAY = 'applepay';
    public const GOOGLEPAY = 'googlepay';
    public const MOBILEPAY = 'mobilepay';
    public const VIPPS = 'vipps';

    public static function getAll(): array
    {
        return [
            self::CARD,
            self::APPLEPAY,
            self::GOOGLEPAY,
            self::MOBILEPAY,
            self::VIPPS,
        ];
    }
}
