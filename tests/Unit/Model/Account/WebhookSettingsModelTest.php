<?php

namespace Billwerk\Sdk\Test\Unit\Model\Account;

use Billwerk\Sdk\Enum\InvoiceEventEnum;
use Billwerk\Sdk\Model\Account\WebhookSettingsModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class WebhookSettingsModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(WebhookSettingsModel::getClassName());
        $model = WebhookSettingsModel::fromArray($json);

        $this::assertIsArray($model->getUrls());
        $this::assertSame(null, $model->getUsername());
        $this::assertSame(null, $model->getPassword());
        $this::assertSame(false, $model->getDisabled());
        $this::assertSame('webhook_secret_dafba2016614418f969fa5697383e47c', $model->getSecret());
        $this::assertSame(null, $model->getAlertEmails());
        $this::assertSame(null, $model->getAlertCount());
        $this::assertSame(null, $model->getEventTypes());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(WebhookSettingsModel::getClassName());
        $model = WebhookSettingsModel::fromArray($json);

        $this::assertIsArray($model->getUrls());
        $this::assertSame('myuser', $model->getUsername());
        $this::assertSame('mypassword', $model->getPassword());
        $this::assertSame(false, $model->getDisabled());
        $this::assertSame('webhook_secret_dafba2016614418f969fa5697383e47c', $model->getSecret());
        $this::assertIsArray($model->getAlertEmails());
        $this::assertSame(0, $model->getAlertCount());
        $this::assertSame(InvoiceEventEnum::INVOICE_SETTLED, $model->getEventTypes());

        $json['event_types'] = ['invoice_settled'];
        $model = WebhookSettingsModel::fromArray($json);
        $this::assertIsArray($model->getEventTypes());
    }
}
