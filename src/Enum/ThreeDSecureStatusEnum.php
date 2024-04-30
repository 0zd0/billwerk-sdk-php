<?php

namespace Billwerk\Sdk\Enum;

class ThreeDSecureStatusEnum
{
    /**
     * If 3D Secure authenticated the 3D status will either be Y (fully authenticated) or A (attempted authenticated).
     * An attempted authentication means that card issuer (e.g. bank) does not support 3D Secure so no full
     * authentication has been performed. Attempted authentication normally means liability shift, but this
     * can differ between acquirers.
     */
    public const Y = 'Y';
    public const A = 'A';
    
    public static function getAll(): array
    {
        return [
            self::Y,
            self::A,
        ];
    }
}
