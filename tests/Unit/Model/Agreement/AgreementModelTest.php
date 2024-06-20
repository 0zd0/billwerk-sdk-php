<?php

namespace Billwerk\Sdk\Test\Unit\Model\Agreement;

use Billwerk\Sdk\Enum\AccountStateEnum;
use Billwerk\Sdk\Enum\AgreementStateEnum;
use Billwerk\Sdk\Enum\AgreementTypeEnum;
use Billwerk\Sdk\Enum\AgreementUsageEnum;
use Billwerk\Sdk\Enum\CardGatewayAgreementProviderEnum;
use Billwerk\Sdk\Enum\OfflineAgreementPaymentTypeEnum;
use Billwerk\Sdk\Enum\OfflineAgreementSettleTypeEnum;
use Billwerk\Sdk\Model\Account\AccountModel;
use Billwerk\Sdk\Model\Agreement\AgreementModel;
use Billwerk\Sdk\Model\Agreement\AnydayAgreementModel;
use Billwerk\Sdk\Model\Agreement\ApplepayAgreementModel;
use Billwerk\Sdk\Model\Agreement\CardGatewayAgreementModel;
use Billwerk\Sdk\Model\Agreement\EmvConfigurationModel;
use Billwerk\Sdk\Model\Agreement\GooglepayAgreementModel;
use Billwerk\Sdk\Model\Agreement\KlarnaAgreementModel;
use Billwerk\Sdk\Model\Agreement\MpoAgreementModel;
use Billwerk\Sdk\Model\Agreement\MpsAgreementModel;
use Billwerk\Sdk\Model\Agreement\OfflineAgreementModel;
use Billwerk\Sdk\Model\Agreement\PayeverAgreementModel;
use Billwerk\Sdk\Model\Agreement\PaypalAgreementModel;
use Billwerk\Sdk\Model\Agreement\PproAgreementModel;
use Billwerk\Sdk\Model\Agreement\ResursAgreementModel;
use Billwerk\Sdk\Model\Agreement\SwishAgreementModel;
use Billwerk\Sdk\Model\Agreement\ViabillAgreementModel;
use Billwerk\Sdk\Model\Agreement\VippsAgreementModel;
use Billwerk\Sdk\Model\Agreement\VippsRecurringAgreementModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class AgreementModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(AgreementModel::getClassName());
        $model = AgreementModel::fromArray($json);
        $this::assertSame('0943a00c8b0c48f28c637a8a2fd268f1', $model->getId());
        $this::assertSame(AgreementStateEnum::ACTIVE, $model->getState());
        $this::assertSame(null, $model->getType());
        $this::assertSame(AgreementUsageEnum::REUSABLE, $model->getUsage());
        $this::assertSame(true, $model->getTest());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame(null, $model->getName());
        $this::assertSame(null, $model->getCardGatewayAgreement());
        $this::assertSame(null, $model->getOfflineAgreement());
        $this::assertSame(null, $model->getMpoAgreement());
        $this::assertSame(null, $model->getVippsAgreement());
        $this::assertSame(null, $model->getVippsRecurringAgreement());
        $this::assertSame(null, $model->getViabillAgreement());
        $this::assertSame(null, $model->getAnydayAgreement());
        $this::assertSame(null, $model->getResursAgreement());
        $this::assertSame(null, $model->getKlarnaAgreement());
        $this::assertSame(null, $model->getSwish());
        $this::assertSame(null, $model->getApplepayAgreement());
        $this::assertSame(null, $model->getGooglepayAgreement());
        $this::assertSame(null, $model->getPaypalAgreement());
        $this::assertSame(null, $model->getMpsAgreement());
        $this::assertSame(null, $model->getPproAgreement());
        $this::assertSame(null, $model->getPayeverAgreement());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(AgreementModel::getClassName());
        $model = AgreementModel::fromArray($json);
        $this::assertSame('0943a00c8b0c48f28c637a8a2fd268f1', $model->getId());
        $this::assertSame(AgreementStateEnum::ACTIVE, $model->getState());
        $this::assertSame(AgreementTypeEnum::CARD, $model->getType());
        $this::assertSame(AgreementUsageEnum::REUSABLE, $model->getUsage());
        $this::assertSame(true, $model->getTest());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame('Example Agreement', $model->getName());
        $this::assertInstanceOf(CardGatewayAgreementModel::class, $model->getCardGatewayAgreement());
        $this::assertInstanceOf(OfflineAgreementModel::class, $model->getOfflineAgreement());
        $this::assertInstanceOf(MpoAgreementModel::class, $model->getMpoAgreement());
        $this::assertInstanceOf(VippsAgreementModel::class, $model->getVippsAgreement());
        $this::assertInstanceOf(VippsRecurringAgreementModel::class, $model->getVippsRecurringAgreement());
        $this::assertInstanceOf(ViabillAgreementModel::class, $model->getViabillAgreement());
        $this::assertInstanceOf(AnydayAgreementModel::class, $model->getAnydayAgreement());
        $this::assertInstanceOf(ResursAgreementModel::class, $model->getResursAgreement());
        $this::assertInstanceOf(KlarnaAgreementModel::class, $model->getKlarnaAgreement());
        $this::assertInstanceOf(SwishAgreementModel::class, $model->getSwish());
        $this::assertInstanceOf(ApplepayAgreementModel::class, $model->getApplepayAgreement());
        $this::assertInstanceOf(GooglepayAgreementModel::class, $model->getGooglepayAgreement());
        $this::assertInstanceOf(PaypalAgreementModel::class, $model->getPaypalAgreement());
        $this::assertInstanceOf(MpsAgreementModel::class, $model->getMpsAgreement());
        $this::assertInstanceOf(PproAgreementModel::class, $model->getPproAgreement());
        $this::assertInstanceOf(PayeverAgreementModel::class, $model->getPayeverAgreement());
    }
}
