<?php

namespace Billwerk\Sdk\Test\Unit\Model\Agreement;

use Billwerk\Sdk\Enum\AccountStateEnum;
use Billwerk\Sdk\Enum\CardGatewayAgreementProviderEnum;
use Billwerk\Sdk\Enum\OfflineAgreementPaymentTypeEnum;
use Billwerk\Sdk\Enum\OfflineAgreementSettleTypeEnum;
use Billwerk\Sdk\Model\Account\AccountModel;
use Billwerk\Sdk\Model\Agreement\CardGatewayAgreementModel;
use Billwerk\Sdk\Model\Agreement\EmvConfigurationModel;
use Billwerk\Sdk\Model\Agreement\OfflineAgreementModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class OfflineAgreementModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(OfflineAgreementModel::getClassName());
        $model = OfflineAgreementModel::fromArray($json);
        $this::assertSame('Bank transfer', $model->getName());
        $this::assertSame(null, $model->getDescription());
        $this::assertSame('instructions', $model->getInstructions());
        $this::assertSame(null, $model->getCurrencies());
        $this::assertSame('bank_transfer_nordea', $model->getHandle());
        $this::assertSame(null, $model->getLogo());
        $this::assertSame(OfflineAgreementSettleTypeEnum::INSTANT, $model->getSettleType());
        $this::assertSame(OfflineAgreementPaymentTypeEnum::OFFLINE_CASH, $model->getPaymentType());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(OfflineAgreementModel::getClassName());
        $model = OfflineAgreementModel::fromArray($json);
        $this::assertSame('Bank transfer', $model->getName());
        $this::assertSame('desc', $model->getDescription());
        $this::assertSame('instructions', $model->getInstructions());
        $this::assertIsArray($model->getCurrencies());
        $this::assertSame('bank_transfer_nordea', $model->getHandle());
        $this::assertSame('logo', $model->getLogo());
        $this::assertSame(OfflineAgreementSettleTypeEnum::INSTANT, $model->getSettleType());
        $this::assertSame(OfflineAgreementPaymentTypeEnum::OFFLINE_CASH, $model->getPaymentType());
    }
}
