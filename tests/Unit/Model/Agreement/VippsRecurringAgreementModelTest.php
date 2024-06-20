<?php

namespace Billwerk\Sdk\Test\Unit\Model\Agreement;

use Billwerk\Sdk\Enum\AccountStateEnum;
use Billwerk\Sdk\Enum\CardGatewayAgreementProviderEnum;
use Billwerk\Sdk\Enum\OfflineAgreementPaymentTypeEnum;
use Billwerk\Sdk\Enum\OfflineAgreementSettleTypeEnum;
use Billwerk\Sdk\Enum\VippsRecurringAgreementChargeTypeEnum;
use Billwerk\Sdk\Enum\VippsRecurringAgreementCurrencyEnum;
use Billwerk\Sdk\Model\Account\AccountModel;
use Billwerk\Sdk\Model\Agreement\CardGatewayAgreementModel;
use Billwerk\Sdk\Model\Agreement\EmvConfigurationModel;
use Billwerk\Sdk\Model\Agreement\MpoAgreementModel;
use Billwerk\Sdk\Model\Agreement\OfflineAgreementModel;
use Billwerk\Sdk\Model\Agreement\VippsAgreementModel;
use Billwerk\Sdk\Model\Agreement\VippsRecurringAgreementModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class VippsRecurringAgreementModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(VippsRecurringAgreementModel::getClassName());
        $model = VippsRecurringAgreementModel::fromArray($json);
        $this::assertSame('123456', $model->getMerchantSerialNumber());
        $this::assertSame('https://example.com/cancel', $model->getMerchantCancelUrl());
        $this::assertSame(VippsRecurringAgreementCurrencyEnum::NOK, $model->getCurrency());
        $this::assertSame(VippsRecurringAgreementChargeTypeEnum::RECURRING, $model->getChargeType());
    }
}
