<?php

namespace Billwerk\Sdk\Util;

class Sleep
{
    public static ?int $sleep_time = null;
    
    public static function set(int $time): void
    {
        self::$sleep_time = $time;
    }
    
    public static function start(int $time): void
    {
        ! is_null(self::$sleep_time) ? sleep(self::$sleep_time) : sleep($time);
    }
}
