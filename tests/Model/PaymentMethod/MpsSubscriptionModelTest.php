<?php

namespace Billwerk\Sdk\Test\Model\PaymentMethod;

use Billwerk\Sdk\Model\PaymentMethod\MpsSubscriptionModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
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
        $this::assertSame(null, $model->getExternalId());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(MpsSubscriptionModel::getClassName());
        $model = MpsSubscriptionModel::fromArray($json);
        $this::assertSame('mps_sub_001', $model->getExternalId());
    }
}
