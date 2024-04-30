<?php

namespace Billwerk\Sdk\Enum;

class ErrorStateEnum
{
    public const PENDING          = 'pending';
    public const SOFT_DECLINED    = 'soft_declined';
    public const HARD_DECLINED    = 'hard_declined';
    public const PROCESSING_ERROR = 'processing_error';
    
    public static function getAll(): array
    {
        return [
            self::PENDING,
            self::SOFT_DECLINED,
            self::HARD_DECLINED,
            self::PROCESSING_ERROR,
        ];
    }
}
