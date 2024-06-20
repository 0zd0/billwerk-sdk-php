<?php

namespace Billwerk\Sdk\Test\Unit\Service;

use Billwerk\Sdk\Model\Account\AccountModel;
use Billwerk\Sdk\Model\Account\WebhookSettingsModel;
use Billwerk\Sdk\Model\Account\WebhookSettingsUpdateModel;
use Billwerk\Sdk\Model\Agreement\AgreementModel;

final class AgreementServiceTest extends AbstractServiceTest
{
    public function testGetAllAgreements()
    {
        $this->setMockJsonModel(AgreementModel::getClassName(), false, true);

        $agreements = $this->agreement->all();

        $this::assertContainsOnlyInstancesOf(AgreementModel::class, $agreements);
    }
}
