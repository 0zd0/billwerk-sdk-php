<?php

namespace Billwerk\Sdk\Test\Unit\Model\PaymentMethod;

use Billwerk\Sdk\Model\PaymentMethod\MpsSubscriptionModel;
use Billwerk\Sdk\Model\PaymentMethod\PaymentMethodGetModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class PaymentMethodGetModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(PaymentMethodGetModel::getClassName());
        $model = PaymentMethodGetModel::fromArray($json);
        $this::assertSame('ca_7813fc1edf8e1e9ebb84fcf8ddb872ac', $model->getId());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(PaymentMethodGetModel::getClassName());
        $model = PaymentMethodGetModel::fromArray($json);
        $this::assertSame('ca_7813fc1edf8e1e9ebb84fcf8ddb872ac', $model->getId());
    }
}
