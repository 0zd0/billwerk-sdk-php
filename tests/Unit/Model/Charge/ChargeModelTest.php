<?php

namespace Billwerk\Sdk\Test\Unit\Model\Charge;

use Billwerk\Sdk\Enum\ChargeStateEnum;
use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\PaymentContextEnum;
use Billwerk\Sdk\Enum\TransactionErrorEnum;
use Billwerk\Sdk\Model\AddressModel;
use Billwerk\Sdk\Model\Charge\ChargeModel;
use Billwerk\Sdk\Model\Charge\SourceModel;
use Billwerk\Sdk\Model\Invoice\OrderLineModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class ChargeModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(ChargeModel::getClassName());
        $model = ChargeModel::fromArray($json);
        $this::assertSame('order-0000213', $model->getHandle());
        $this::assertSame(ChargeStateEnum::AUTHORIZED, $model->getState());
        $this::assertSame('customer006', $model->getCustomer());
        $this::assertSame(10000, $model->getAmount());
        $this::assertSame('DKK', $model->getCurrency());
        $this::assertSame(null, $model->getAuthorized());
        $this::assertSame(null, $model->getSettled());
        $this::assertSame(null, $model->getCancelled());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame(null, $model->getTransaction());
        $this::assertSame(null, $model->getError());
        $this::assertSame(null, $model->getProcessing());
        $this::assertInstanceOf(SourceModel::class, $model->getSource());
        $this::assertContainsOnlyInstancesOf(OrderLineModel::class, $model->getOrderLines());
        $this::assertSame(5000, $model->getRefundedAmount());
        $this::assertSame(null, $model->getAuthorizedAmount());
        $this::assertSame(null, $model->getErrorState());
        $this::assertSame(null, $model->getRecurringPaymentMethod());
        $this::assertSame(null, $model->getBillingAddress());
        $this::assertSame(null, $model->getShippingAddress());
        $this::assertSame(null, $model->getPaymentContext());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(ChargeModel::getClassName());
        $model = ChargeModel::fromArray($json);
        $this::assertSame('order-0000213', $model->getHandle());
        $this::assertSame(ChargeStateEnum::AUTHORIZED, $model->getState());
        $this::assertSame('customer006', $model->getCustomer());
        $this::assertSame(10000, $model->getAmount());
        $this::assertSame('DKK', $model->getCurrency());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getAuthorized());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getSettled());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCancelled());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame('dafba2016614418f969fa5697383e47c', $model->getTransaction());
        $this::assertSame(TransactionErrorEnum::CREDIT_CARD_EXPIRED, $model->getError());
        $this::assertSame(false, $model->getProcessing());
        $this::assertInstanceOf(SourceModel::class, $model->getSource());
        $this::assertContainsOnlyInstancesOf(OrderLineModel::class, $model->getOrderLines());
        $this::assertSame(5000, $model->getRefundedAmount());
        $this::assertSame(20000, $model->getAuthorizedAmount());
        $this::assertSame(ErrorStateEnum::HARD_DECLINED, $model->getErrorState());
        $this::assertSame('ca_0d53b3c057ac262647b482184d5fd574', $model->getRecurringPaymentMethod());
        $this::assertInstanceOf(AddressModel::class, $model->getBillingAddress());
        $this::assertInstanceOf(AddressModel::class, $model->getShippingAddress());
        $this::assertSame(PaymentContextEnum::MIT, $model->getPaymentContext());
    }
}
