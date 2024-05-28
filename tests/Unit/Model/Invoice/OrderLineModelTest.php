<?php

namespace Billwerk\Sdk\Test\Unit\Model\Invoice;

use Billwerk\Sdk\Model\Invoice\OrderLineModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class OrderLineModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(OrderLineModel::getClassName());
        $model = OrderLineModel::fromArray($json);
        $this::assertSame('c33fbb06a00e4dc0b9055f6fb509c0ed', $model->getId());
        $this::assertSame('Product X', $model->getOrdertext());
        $this::assertSame(15000, $model->getAmount());
        $this::assertSame(0.25, $model->getVat());
        $this::assertSame(1, $model->getQuantity());
        $this::assertSame('plan', $model->getOrigin());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getTimestamp());
        $this::assertSame(null, $model->getDiscountedAmount());
        $this::assertSame(3000, $model->getAmountVat());
        $this::assertSame(12000, $model->getAmountExVat());
        $this::assertSame(15000, $model->getUnitAmount());
        $this::assertSame(3000, $model->getUnitAmountVat());
        $this::assertSame(12000, $model->getUnitAmountExVat());
        $this::assertSame(true, $model->getAmountDefinedInclVat());
        $this::assertSame(null, $model->getOriginHandle());
        $this::assertEquals(null, $model->getPeriodFrom());
        $this::assertEquals(null, $model->getPeriodTo());
        $this::assertSame(null, $model->getDiscountPercentage());
        $this::assertSame(null, $model->getDiscountedOrderLine());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(OrderLineModel::getClassName());
        $model = OrderLineModel::fromArray($json);
        $this::assertSame('c33fbb06a00e4dc0b9055f6fb509c0ed', $model->getId());
        $this::assertSame('Product X', $model->getOrdertext());
        $this::assertSame(15000, $model->getAmount());
        $this::assertSame(0.25, $model->getVat());
        $this::assertSame(1, $model->getQuantity());
        $this::assertSame('plan', $model->getOrigin());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getTimestamp());
        $this::assertSame(2000, $model->getDiscountedAmount());
        $this::assertSame(3000, $model->getAmountVat());
        $this::assertSame(12000, $model->getAmountExVat());
        $this::assertSame(15000, $model->getUnitAmount());
        $this::assertSame(3000, $model->getUnitAmountVat());
        $this::assertSame(12000, $model->getUnitAmountExVat());
        $this::assertSame(true, $model->getAmountDefinedInclVat());
        $this::assertSame('c33fbb06a00e4dc0b9055f6fb509c0ed', $model->getOriginHandle());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getPeriodFrom());
        $this::assertEquals(new DateTime('2015-05-04T12:40:56.656Z'), $model->getPeriodTo());
        $this::assertSame(25, $model->getDiscountPercentage());
        $this::assertSame('423434534252345sdafsdfa5435', $model->getDiscountedOrderLine());
    }
}
