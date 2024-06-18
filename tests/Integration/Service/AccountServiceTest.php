<?php

namespace Billwerk\Sdk\Test\Integration\Service;

use Billwerk\Sdk\Model\Account\WebhookSettingsUpdateModel;
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

    public function testUpdateWebHookSettings()
    {
        $config = $this->devConfig['service']['account']['update-webhook'];

        $webHookSettings = $this->sdk->account()->updateWebHookSettings(
            (new WebhookSettingsUpdateModel())
                ->setUrls($config['urls'])
                ->setDisabled(false)
        );

        $this->assertMatchesJsonSnapshot(json_encode($webHookSettings->toArray()));
    }
}
