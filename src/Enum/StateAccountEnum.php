<?php

namespace Billwerk\Sdk\Enum;

class StateAccountEnum
{
    public const TEST = 'test';
    public const LIVE = 'live';
    public const CLOSED = 'closed';
    
    public static function getAll(): array
    {
        return [
            self::TEST,
            self::LIVE,
            self::CLOSED
        ];
    }
}
