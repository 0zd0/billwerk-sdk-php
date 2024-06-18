<?php

namespace Billwerk\Sdk\Test\Unit\Service;

use Billwerk\Sdk\Model\Account\AccountModel;
use Billwerk\Sdk\Model\Account\WebhookSettingsModel;
use Billwerk\Sdk\Model\Account\WebhookSettingsUpdateModel;

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

        $settings = $this->account->getWebHookSettings();

        $this::assertInstanceOf(WebhookSettingsModel::class, $settings);
    }

    public function testUpdateWebhookSettings()
    {
        $this->setMockJsonModel(WebhookSettingsModel::getClassName());

        $settings = $this->account->updateWebHookSettings(
            (new WebhookSettingsUpdateModel())
            ->setUrls(['test'])
            ->setDisabled(false)
        );

        $this::assertInstanceOf(WebhookSettingsModel::class, $settings);
    }
}
