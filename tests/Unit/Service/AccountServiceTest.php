<?php

namespace Billwerk\Sdk\Test\Unit\Service;

use Billwerk\Sdk\Model\Account\AccountModel;
use Billwerk\Sdk\Model\Account\WebhookSettingsModel;

final class AccountServiceTest extends AbstractServiceTest
{
    public function testGetAccount()
    {
        $this->setMockJsonModel(AccountModel::getClassName());

        $account = $this->account->get();

        $this::assertInstanceOf(AccountModel::class, $account);
    }

    public function testGetWebhookSettings()
    {
        $this->setMockJsonModel(WebhookSettingsModel::getClassName());

        $account = $this->account->getWebHookSettings();

        $this::assertInstanceOf(WebhookSettingsModel::class, $account);
    }
}
