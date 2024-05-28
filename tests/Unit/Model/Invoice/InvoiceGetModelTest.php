<?php

namespace Billwerk\Sdk\Test\Unit\Model\Invoice;

use Billwerk\Sdk\Model\Invoice\InvoiceGetModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class InvoiceGetModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(InvoiceGetModel::getClassName());
        $model = InvoiceGetModel::fromArray($json);
        $this::assertSame('handle_1-2', $model->getId());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(InvoiceGetModel::getClassName());
        $model = InvoiceGetModel::fromArray($json);
        $this::assertSame('handle_1-2', $model->getId());
    }
}
