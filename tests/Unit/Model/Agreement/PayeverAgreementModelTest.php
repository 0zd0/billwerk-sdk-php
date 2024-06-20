<?php

namespace Billwerk\Sdk\Test\Unit\Model\Agreement;

use Billwerk\Sdk\Enum\AccountStateEnum;
use Billwerk\Sdk\Enum\CardGatewayAgreementProviderEnum;
use Billwerk\Sdk\Enum\OfflineAgreementPaymentTypeEnum;
use Billwerk\Sdk\Enum\OfflineAgreementSettleTypeEnum;
use Billwerk\Sdk\Model\Account\AccountModel;
use Billwerk\Sdk\Model\Agreement\CardGatewayAgreementModel;
use Billwerk\Sdk\Model\Agreement\EmvConfigurationModel;
use Billwerk\Sdk\Model\Agreement\MpoAgreementModel;
use Billwerk\Sdk\Model\Agreement\OfflineAgreementModel;
use Billwerk\Sdk\Model\Agreement\PayeverAgreementModel;
use Billwerk\Sdk\Model\Agreement\ViabillAgreementModel;
use Billwerk\Sdk\Model\Agreement\VippsAgreementModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class PayeverAgreementModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(PayeverAgreementModel::getClassName());
        $model = PayeverAgreementModel::fromArray($json);
        $this::assertSame('string', $model->getCurrency());
        $this::assertSame(null, $model->getTest());
        $this::assertSame(null, $model->getClientId());
        $this::assertSame(null, $model->getClientSecret());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(PayeverAgreementModel::getClassName());
        $model = PayeverAgreementModel::fromArray($json);
        $this::assertSame('string', $model->getCurrency());
        $this::assertSame(true, $model->getTest());
        $this::assertSame('string2', $model->getClientId());
        $this::assertSame('string3', $model->getClientSecret());
    }
}
