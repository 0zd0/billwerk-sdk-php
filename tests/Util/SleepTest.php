<?php

namespace Billwerk\Sdk\Test\Util;

use Billwerk\Sdk\Test\TestCase;
use Billwerk\Sdk\Util\Sleep;

class SleepTest extends TestCase
{
    public function testSetter() {
        Sleep::set(0);
        $this->assertSame(0, Sleep::$sleep_time);
    }
    
    public function testStartWithSleepTimeSet()
    {
        $time = 1;
        Sleep::set($time);
        
        $startTime = microtime(true);
        Sleep::start(10);
        $endTime = microtime(true);
        
        $this->assertGreaterThanOrEqual($time, $endTime - $startTime);
    }
}
