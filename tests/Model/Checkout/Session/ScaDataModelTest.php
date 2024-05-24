<?php

namespace Billwerk\Sdk\Test\Model\Checkout\Session;

use Billwerk\Sdk\Enum\ChallengeIndicatorEnum;
use Billwerk\Sdk\Model\Checkout\Session\AccountInfoModel;
use Billwerk\Sdk\Model\Checkout\Session\AddressModel;
use Billwerk\Sdk\Model\Checkout\Session\PhoneModel;
use Billwerk\Sdk\Model\Checkout\Session\RiskIndicatorModel;
use Billwerk\Sdk\Model\Checkout\Session\ScaDataModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class ScaDataModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(ScaDataModel::getClassName());
        $model = ScaDataModel::fromArray($json);
        $this::assertSame(null, $model->getName());
        $this::assertSame(null, $model->getEmail());
        $this::assertSame(null, $model->getHomePhone());
        $this::assertSame(null, $model->getMobilePhone());
        $this::assertSame(null, $model->getWorkPhone());
        $this::assertSame(null, $model->getBillingAddress());
        $this::assertSame(null, $model->getShippingAddress());
        $this::assertSame(null, $model->getAddressMatch());
        $this::assertSame(null, $model->getAccountId());
        $this::assertSame(null, $model->getChallengeIndicator());
        $this::assertSame(null, $model->getRiskIndicator());
        $this::assertSame(null, $model->getAccountInfo());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(ScaDataModel::getClassName());
        $model = ScaDataModel::fromArray($json);
        $this::assertSame('John Doe', $model->getName());
        $this::assertSame('mail@example.com', $model->getEmail());
        $this::assertInstanceOf(PhoneModel::class, $model->getHomePhone());
        $this::assertInstanceOf(PhoneModel::class, $model->getMobilePhone());
        $this::assertInstanceOf(PhoneModel::class, $model->getWorkPhone());
        $this::assertInstanceOf(AddressModel::class, $model->getBillingAddress());
        $this::assertInstanceOf(AddressModel::class, $model->getShippingAddress());
        $this::assertSame(true, $model->getAddressMatch());
        $this::assertSame('123456', $model->getAccountId());
        $this::assertSame(ChallengeIndicatorEnum::MANDATE, $model->getChallengeIndicator());
        $this::assertInstanceOf(RiskIndicatorModel::class, $model->getRiskIndicator());
        $this::assertInstanceOf(AccountInfoModel::class, $model->getAccountInfo());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
