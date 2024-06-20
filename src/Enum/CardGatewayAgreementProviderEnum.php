<?php

namespace Billwerk\Sdk\Enum;

class CardGatewayAgreementProviderEnum
{
    public const TEST = 'test';
    public const DIBS = 'dibs';
    public const DIBS_TEST = 'dibs_test';

    public static function getAll(): array
    {
        return [
            self::TEST,
            self::DIBS,
            self::DIBS_TEST,
        ];
    }
}
