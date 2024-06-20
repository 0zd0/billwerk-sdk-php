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
use Billwerk\Sdk\Model\Agreement\MpsAgreementModel;
use Billwerk\Sdk\Model\Agreement\OfflineAgreementModel;
use Billwerk\Sdk\Model\Agreement\ViabillAgreementModel;
use Billwerk\Sdk\Model\Agreement\VippsAgreementModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class MpsAgreementModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(MpsAgreementModel::getClassName());
        $model = MpsAgreementModel::fromArray($json);
        $this::assertIsArray($model->getCurrencies());
        $this::assertSame(null, $model->getCountry());
        $this::assertSame(null, $model->getShopName());
        $this::assertSame(null, $model->getMerchantVat());
        $this::assertSame(null, $model->getProviderId());
        $this::assertSame(null, $model->getAuthorizationUrl());
        $this::assertSame(null, $model->getAsyncOneOff());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(MpsAgreementModel::getClassName());
        $model = MpsAgreementModel::fromArray($json);
        $this::assertIsArray($model->getCurrencies());
        $this::assertSame('string', $model->getCountry());
        $this::assertSame('string2', $model->getShopName());
        $this::assertSame('string3', $model->getMerchantVat());
        $this::assertSame('string4', $model->getProviderId());
        $this::assertSame('string5', $model->getAuthorizationUrl());
        $this::assertSame(true, $model->getAsyncOneOff());
    }
}
