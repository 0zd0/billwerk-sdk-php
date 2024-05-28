<?php

namespace Billwerk\Sdk\Test\Unit\Model\Charge;

use Billwerk\Sdk\Model\Charge\ChargeCreateModel;
use Billwerk\Sdk\Model\Charge\OrderLineModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class ChargeSettleModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(ChargeCreateModel::getClassName());
        $model = ChargeCreateModel::fromArray($json);
        $this::assertSame(null, $model->getKey());
        $this::assertSame(null, $model->getAmount());
        $this::assertSame(null, $model->getOrdertext());
        $this::assertSame(null, $model->getOrderLines());
        $this::assertSame(null, $model->getAcquirerReference());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(ChargeCreateModel::getClassName());
        $model = ChargeCreateModel::fromArray($json);

        $handle = 'order-0000213';
        $model->setHandle($handle);
        $this::assertSame($handle, $model->getHandle());

        $this::assertSame('5ee00b2b-effb-453e-a246-c3cc26acaeb9', $model->getKey());
        $this::assertSame(20000, $model->getAmount());
        $this::assertSame('Super product', $model->getOrdertext());
        $this::assertContainsOnlyInstancesOf(OrderLineModel::class, $model->getOrderLines());
        $this::assertSame('wd', $model->getAcquirerReference());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
