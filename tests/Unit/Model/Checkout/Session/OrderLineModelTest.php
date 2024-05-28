<?php

namespace Billwerk\Sdk\Test\Unit\Model\Checkout\Session;

use Billwerk\Sdk\Model\Checkout\Session\OrderLineModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
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
        $this::assertSame('Soda', $model->getOrdertext());
        $this::assertSame(20000, $model->getAmount());
        $this::assertSame(null, $model->getVat());
        $this::assertSame(null, $model->getQuantity());
        $this::assertSame(null, $model->getAmountInclVat());
        $this::assertSame(null, $model->getTaxPolicy());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(OrderLineModel::getClassName());
        $model = OrderLineModel::fromArray($json);
        $this::assertSame('Soda', $model->getOrdertext());
        $this::assertSame(20000, $model->getAmount());
        $this::assertSame(0.25, $model->getVat());
        $this::assertSame(1, $model->getQuantity());
        $this::assertSame(true, $model->getAmountInclVat());
        $this::assertSame('default_tax_policy_handle', $model->getTaxPolicy());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
