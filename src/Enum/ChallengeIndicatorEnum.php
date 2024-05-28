<?php

namespace Billwerk\Sdk\Enum;

class ChallengeIndicatorEnum
{
    public const PREFERENCE = 'preference';
    public const MANDATE    = 'mandate';

    public static function getAll(): array
    {
        return [
            self::PREFERENCE,
            self::MANDATE,
        ];
    }
}
