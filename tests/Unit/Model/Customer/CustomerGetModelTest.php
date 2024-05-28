<?php

namespace Billwerk\Sdk\Test\Unit\Model\Customer;

use Billwerk\Sdk\Model\Customer\CustomerGetModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class CustomerGetModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(CustomerGetModel::getClassName());
        $model = CustomerGetModel::fromArray($json);
        $this::assertSame('customer006', $model->getHandle());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(CustomerGetModel::getClassName());
        $model = CustomerGetModel::fromArray($json);
        $this::assertSame('customer006', $model->getHandle());
    }
}
