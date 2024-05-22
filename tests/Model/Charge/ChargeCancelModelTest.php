<?php

namespace Billwerk\Sdk\Test\Model\Charge;

use Billwerk\Sdk\Model\Charge\ChargeCancelModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class ChargeCancelModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(ChargeCancelModel::getClassName());
        $model = ChargeCancelModel::fromArray($json);
        $this::assertSame('handle1', $model->getHandle());
    }
}
