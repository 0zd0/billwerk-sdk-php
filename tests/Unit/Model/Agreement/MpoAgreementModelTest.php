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
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class MpoAgreementModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(MpoAgreementModel::getClassName());
        $model = MpoAgreementModel::fromArray($json);
        $this::assertSame('string', $model->getShopName());
        $this::assertSame(null, $model->getShopLogoUrl());
        $this::assertSame(1, $model->getMerchantCategoryCode());
        $this::assertSame('string3', $model->getVat());
        $this::assertSame(null, $model->getMinimumUserAge());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(MpoAgreementModel::getClassName());
        $model = MpoAgreementModel::fromArray($json);
        $this::assertSame('string', $model->getShopName());
        $this::assertSame('string2', $model->getShopLogoUrl());
        $this::assertSame(1, $model->getMerchantCategoryCode());
        $this::assertSame('string3', $model->getVat());
        $this::assertSame(2, $model->getMinimumUserAge());
    }
}
