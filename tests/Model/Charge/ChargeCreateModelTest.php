<?php

namespace Billwerk\Sdk\Test\Model\Charge;

use Billwerk\Sdk\Model\AccountFundingInformationModel;
use Billwerk\Sdk\Model\AddressModel;
use Billwerk\Sdk\Model\Charge\ChargeCreateModel;
use Billwerk\Sdk\Model\Charge\CustomerModel;
use Billwerk\Sdk\Model\Charge\OrderLineModel;
use Billwerk\Sdk\Model\Charge\ParametersModel;
use Billwerk\Sdk\Model\MetaDataModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class ChargeCreateModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(ChargeCreateModel::getClassName());
        $model = ChargeCreateModel::fromArray($json);
        $this::assertSame('order-0000213', $model->getHandle());
        $this::assertSame(null, $model->getKey());
        $this::assertSame(null, $model->getAmount());
        $this::assertSame(null, $model->getCurrency());
        $this::assertSame(null, $model->getCustomer());
        $this::assertSame(null, $model->getMetadata());
        $this::assertSame('ca_f96004cae4308473c92bea0638b5b688', $model->getSource());
        $this::assertSame(null, $model->getSettle());
        $this::assertSame(null, $model->getRecurring());
        $this::assertSame(null, $model->getParameters());
        $this::assertSame(null, $model->getOrdertext());
        $this::assertSame(null, $model->getOrderLines());
        $this::assertSame(null, $model->getCustomerHandle());
        $this::assertSame(null, $model->getBillingAddress());
        $this::assertSame(null, $model->getShippingAddress());
        $this::assertSame(null, $model->getUsePmForSubscription());
        $this::assertSame(null, $model->getTextOnStatement());
        $this::assertSame(null, $model->getPaymentMethodReference());
        $this::assertSame(null, $model->getAsync());
        $this::assertSame(null, $model->getAcquirerReference());
        $this::assertSame(null, $model->getAccountFundingInformation());
        $this::assertSame(null, $model->getAccountFunding());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(ChargeCreateModel::getClassName());
        $model = ChargeCreateModel::fromArray($json);
        $this::assertSame('order-0000213', $model->getHandle());
        $this::assertSame('5ee00b2b-effb-453e-a246-c3cc26acaeb9', $model->getKey());
        $this::assertSame(20000, $model->getAmount());
        $this::assertSame('USD', $model->getCurrency());
        $this::assertInstanceOf(CustomerModel::class, $model->getCustomer());
        $this::assertContainsOnlyInstancesOf(MetaDataModel::class, $model->getMetadata());
        $this::assertSame('ca_f96004cae4308473c92bea0638b5b688', $model->getSource());
        $this::assertSame(false, $model->getSettle());
        $this::assertSame(false, $model->getRecurring());
        $this::assertInstanceOf(ParametersModel::class, $model->getParameters());
        $this::assertSame('Super product', $model->getOrdertext());
        $this::assertContainsOnlyInstancesOf(OrderLineModel::class, $model->getOrderLines());
        $this::assertSame('cust-0022', $model->getCustomerHandle());
        $this::assertInstanceOf(AddressModel::class, $model->getBillingAddress());
        $this::assertInstanceOf(AddressModel::class, $model->getShippingAddress());
        $this::assertSame(true, $model->getUsePmForSubscription());
        $this::assertSame('myshop.com 23', $model->getTextOnStatement());
        $this::assertSame('cs_6be90a4babc3c57ef7e6e477ac97ed3b', $model->getPaymentMethodReference());
        $this::assertSame(true, $model->getAsync());
        $this::assertSame('wd', $model->getAcquirerReference());
        $this::assertInstanceOf(AccountFundingInformationModel::class, $model->getAccountFundingInformation());
        $this::assertSame(true, $model->getAccountFunding());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
