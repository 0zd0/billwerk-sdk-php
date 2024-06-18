<?php

namespace Billwerk\Sdk\Test\Unit\Model\Account;

use Billwerk\Sdk\Enum\InvoiceEventEnum;
use Billwerk\Sdk\Model\Account\WebhookSettingsModel;
use Billwerk\Sdk\Model\Account\WebhookSettingsUpdateModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class WebhookSettingsUpdateModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(WebhookSettingsUpdateModel::getClassName());
        $model = WebhookSettingsUpdateModel::fromArray($json);

        $this::assertIsArray($model->getUrls());
        $this::assertSame(null, $model->getUsername());
        $this::assertSame(null, $model->getPassword());
        $this::assertSame(false, $model->getDisabled());
        $this::assertSame(null, $model->getAlertEmails());
        $this::assertSame(null, $model->getAlertCount());
        $this::assertSame(null, $model->getEventTypes());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(WebhookSettingsUpdateModel::getClassName());
        $model = WebhookSettingsUpdateModel::fromArray($json);

        $this::assertIsArray($model->getUrls());
        $this::assertSame('myuser', $model->getUsername());
        $this::assertSame('mypassword', $model->getPassword());
        $this::assertSame(false, $model->getDisabled());
        $this::assertIsArray($model->getAlertEmails());
        $this::assertSame(1, $model->getAlertCount());
        $this::assertIsArray($model->getEventTypes());
    }
}
