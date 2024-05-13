<?php

namespace Billwerk\Sdk\Test\Model;

use Billwerk\Sdk\Model\Refund\NoteLineModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class NoteLineModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(NoteLineModel::getClassName());
        $model = NoteLineModel::fromArray($json);
        $this::assertSame(20000, $model->getAmount());
        $this::assertSame('Some compensation', $model->getText());
        $this::assertSame(1, $model->getQuantity());
        $this::assertSame(null, $model->getVat());
        $this::assertSame(null, $model->getOrderLineId());
        $this::assertSame(null, $model->getAmountInclVat());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(NoteLineModel::getClassName());
        $model = NoteLineModel::fromArray($json);
        $this::assertSame(20000, $model->getAmount());
        $this::assertSame('Some compensation', $model->getText());
        $this::assertSame(1, $model->getQuantity());
        $this::assertSame(0.25, $model->getVat());
        $this::assertSame('62', $model->getOrderLineId());
        $this::assertSame(true, $model->getAmountInclVat());
    }
}
