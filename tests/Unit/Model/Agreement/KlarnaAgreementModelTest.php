<?php

namespace Billwerk\Sdk\Test\Unit\Model\Agreement;

use Billwerk\Sdk\Enum\AccountStateEnum;
use Billwerk\Sdk\Enum\CardGatewayAgreementProviderEnum;
use Billwerk\Sdk\Enum\KlarnaAgreementPaymentTypeEnum;
use Billwerk\Sdk\Enum\OfflineAgreementPaymentTypeEnum;
use Billwerk\Sdk\Enum\OfflineAgreementSettleTypeEnum;
use Billwerk\Sdk\Model\Account\AccountModel;
use Billwerk\Sdk\Model\Agreement\AnydayAgreementModel;
use Billwerk\Sdk\Model\Agreement\CardGatewayAgreementModel;
use Billwerk\Sdk\Model\Agreement\EmvConfigurationModel;
use Billwerk\Sdk\Model\Agreement\KlarnaAgreementModel;
use Billwerk\Sdk\Model\Agreement\MpoAgreementModel;
use Billwerk\Sdk\Model\Agreement\OfflineAgreementModel;
use Billwerk\Sdk\Model\Agreement\ViabillAgreementModel;
use Billwerk\Sdk\Model\Agreement\VippsAgreementModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class KlarnaAgreementModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(KlarnaAgreementModel::getClassName());
        $model = KlarnaAgreementModel::fromArray($json);
        $this::assertSame('string', $model->getUsername());
        $this::assertSame('string2', $model->getPassword());
        $this::assertSame(null, $model->getTest());
        $this::assertIsArray($model->getCurrencies());
        $this::assertSame(KlarnaAgreementPaymentTypeEnum::KLARNA_SLICE_IT, $model->getPaymentType());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(KlarnaAgreementModel::getClassName());
        $model = KlarnaAgreementModel::fromArray($json);
        $this::assertSame('string', $model->getUsername());
        $this::assertSame('string2', $model->getPassword());
        $this::assertSame(true, $model->getTest());
        $this::assertIsArray($model->getCurrencies());
        $this::assertSame(KlarnaAgreementPaymentTypeEnum::KLARNA_SLICE_IT, $model->getPaymentType());
    }
}
