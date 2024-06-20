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
use Billwerk\Sdk\Model\Agreement\PaypalAgreementModel;
use Billwerk\Sdk\Model\Agreement\ViabillAgreementModel;
use Billwerk\Sdk\Model\Agreement\VippsAgreementModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class PaypalAgreementModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(PaypalAgreementModel::getClassName());
        $model = PaypalAgreementModel::fromArray($json);
        $this::assertSame(null, $model->getTest());
        $this::assertSame(null, $model->getVersion());
        $this::assertSame('string', $model->getClientId());
        $this::assertSame('string2', $model->getClientSecret());
        $this::assertSame(null, $model->getActionUrl());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(PaypalAgreementModel::getClassName());
        $model = PaypalAgreementModel::fromArray($json);
        $this::assertSame(true, $model->getTest());
        $this::assertSame(1, $model->getVersion());
        $this::assertSame('string', $model->getClientId());
        $this::assertSame('string2', $model->getClientSecret());
        $this::assertSame('string3', $model->getActionUrl());
    }
}
