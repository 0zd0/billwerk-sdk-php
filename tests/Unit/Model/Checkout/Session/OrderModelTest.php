<?php

namespace Billwerk\Sdk\Test\Unit\Model\Checkout\Session;

use Billwerk\Sdk\Model\AddressModel;
use Billwerk\Sdk\Model\Checkout\Session\CustomerModel;
use Billwerk\Sdk\Model\Checkout\Session\OrderLineModel;
use Billwerk\Sdk\Model\Checkout\Session\OrderModel;
use Billwerk\Sdk\Model\MetaDataModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class OrderModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(OrderModel::getClassName());
        $model = OrderModel::fromArray($json);
        $this::assertSame('order-0000213', $model->getHandle());
        $this::assertSame(null, $model->getKey());
        $this::assertSame(null, $model->getAmount());
        $this::assertSame(null, $model->getCurrency());
        $this::assertSame(null, $model->getCustomer());
        $this::assertSame(null, $model->getMetadata());
        $this::assertSame(null, $model->getOrdertext());
        $this::assertSame(null, $model->getOrderLines());
        $this::assertSame(null, $model->getCustomerHandle());
        $this::assertSame(null, $model->getBillingAddress());
        $this::assertSame(null, $model->getShippingAddress());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(OrderModel::getClassName());
        $model = OrderModel::fromArray($json);
        $this::assertSame('order-0000213', $model->getHandle());
        $this::assertSame('5ee00b2b-effb-453e-a246-c3cc26acaeb9', $model->getKey());
        $this::assertSame(20000, $model->getAmount());
        $this::assertSame('USD', $model->getCurrency());
        $this::assertInstanceOf(CustomerModel::class, $model->getCustomer());
        $this::assertContainsOnlyInstancesOf(MetaDataModel::class, $model->getMetadata());
        $this::assertSame('Super product', $model->getOrdertext());
        $this::assertContainsOnlyInstancesOf(OrderLineModel::class, $model->getOrderLines());
        $this::assertSame('cust-0022', $model->getCustomerHandle());
        $this::assertInstanceOf(AddressModel::class, $model->getBillingAddress());
        $this::assertInstanceOf(AddressModel::class, $model->getShippingAddress());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
