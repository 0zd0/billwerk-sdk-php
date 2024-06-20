<?php

namespace Billwerk\Sdk\Test\Unit\Model\Agreement;

use Billwerk\Sdk\Enum\AccountStateEnum;
use Billwerk\Sdk\Enum\CardGatewayAgreementProviderEnum;
use Billwerk\Sdk\Model\Account\AccountModel;
use Billwerk\Sdk\Model\Agreement\CardGatewayAgreementModel;
use Billwerk\Sdk\Model\Agreement\EmvConfigurationModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class CardGatewayAgreementModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(CardGatewayAgreementModel::getClassName());
        $model = CardGatewayAgreementModel::fromArray($json);
        $this::assertSame(null, $model->getCurrencies());
        $this::assertSame(null, $model->getSurcharge());
        $this::assertSame(null, $model->getName());
        $this::assertSame(CardGatewayAgreementProviderEnum::TEST, $model->getProvider());
        $this::assertSame(null, $model->getCardTypes());
        $this::assertSame(null, $model->getPaymentTypes());
        $this::assertSame(null, $model->getProviderSettings());
        $this::assertSame(null, $model->getFeeConfiguration());
        $this::assertSame(null, $model->getThreedSecure());
        $this::assertSame(null, $model->getThreedSecureRecurring());
        $this::assertSame(null, $model->getSecuredByNets());
        $this::assertSame(null, $model->getSecuredByNetsRecurring());
        $this::assertSame(null, $model->getDefaultRequireSca());
        $this::assertSame(null, $model->getDisallowThreedSecureAttempted());
        $this::assertSame(null, $model->getPayout());
        $this::assertSame(null, $model->getVtsConfiguration());
        $this::assertSame(null, $model->getScofConfiguration());
        $this::assertSame('657e86162633415a9e6b715248c84da4', $model->getGwRef());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(CardGatewayAgreementModel::getClassName());
        $model = CardGatewayAgreementModel::fromArray($json);
        $this::assertIsArray($model->getCurrencies());
        $this::assertSame(true, $model->getSurcharge());
        $this::assertSame('sek_worldline', $model->getName());
        $this::assertSame(CardGatewayAgreementProviderEnum::TEST, $model->getProvider());
        $this::assertIsArray($model->getCardTypes());
        $this::assertIsArray($model->getPaymentTypes());
        $this::assertSame([], $model->getProviderSettings());
        $this::assertContainsOnly('array', $model->getFeeConfiguration());
        $this::assertSame(true, $model->getThreedSecure());
        $this::assertSame(false, $model->getThreedSecureRecurring());
        $this::assertSame(true, $model->getSecuredByNets());
        $this::assertSame(false, $model->getSecuredByNetsRecurring());
        $this::assertSame(true, $model->getDefaultRequireSca());
        $this::assertSame(false, $model->getDisallowThreedSecureAttempted());
        $this::assertSame(true, $model->getPayout());
        $this::assertInstanceOf(EmvConfigurationModel::class, $model->getVtsConfiguration());
        $this::assertInstanceOf(EmvConfigurationModel::class, $model->getScofConfiguration());
        $this::assertSame('657e86162633415a9e6b715248c84da4', $model->getGwRef());
    }
}
