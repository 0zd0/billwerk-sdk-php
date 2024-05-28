<?php

namespace Billwerk\Sdk\Test\Integration\Service;

use Billwerk\Sdk\Test\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class AccountServiceTest extends TestCase
{
    use MatchesSnapshots;

    public function testGetAccount()
    {
        $account = $this->sdk->account()->get();

        $this->assertMatchesJsonSnapshot(json_encode($account->toArray()));
    }

    public function testGetWebHookSettings()
    {
        $webHookSettings = $this->sdk->account()->getWebHookSettings();

        $this->assertMatchesJsonSnapshot(json_encode($webHookSettings->toArray()));
    }
}
