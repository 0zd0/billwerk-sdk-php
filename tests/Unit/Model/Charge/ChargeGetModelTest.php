<?php

namespace Billwerk\Sdk\Test\Unit\Model\Charge;

use Billwerk\Sdk\Model\Charge\ChargeGetModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class ChargeGetModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(ChargeGetModel::getClassName());
        $model = ChargeGetModel::fromArray($json);
        $this::assertSame('handle1', $model->getHandle());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(ChargeGetModel::getClassName());
        $model = ChargeGetModel::fromArray($json);
        $this::assertSame('handle1', $model->getHandle());
    }
}
