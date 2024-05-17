<?php

namespace Billwerk\Sdk\Test\Model\Invoice;

use Billwerk\Sdk\Enum\CardStateEnum;
use Billwerk\Sdk\Model\Invoice\MpsSubscriptionModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class MpsSubscriptionModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(MpsSubscriptionModel::getClassName());
        $model = MpsSubscriptionModel::fromArray($json);

        $this::assertSame('ca_fcfac2016614418f969fa5697383e47c', $model->getId());
        $this::assertSame(CardStateEnum::ACTIVE, $model->getState());
        $this::assertSame('customer00069', $model->getCustomer());
        $this::assertSame(null, $model->getReference());
        $this::assertSame(null, $model->getFailed());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame(null, $model->getExternalId());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(MpsSubscriptionModel::getClassName());
        $model = MpsSubscriptionModel::fromArray($json);
        $this::assertSame('ca_fcfac2016614418f969fa5697383e47c', $model->getId());
        $this::assertSame(CardStateEnum::ACTIVE, $model->getState());
        $this::assertSame('customer00069', $model->getCustomer());
        $this::assertSame('cs_6be90a4babc3c57ef7e6e477ac97ed3b', $model->getReference());
        $this::assertEquals(new DateTime('2015-06-04T12:40:56.656Z'), $model->getFailed());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame('mps_sub_001', $model->getExternalId());
    }
}
