<?php

namespace Billwerk\Sdk\Test\Model;

use Billwerk\Sdk\Model\CreditNoteLineModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class CreditNoteLineModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(CreditNoteLineModel::getClassName());
        $model = CreditNoteLineModel::fromArray($json);
        $this::assertSame(15000, $model->getAmount());
        $this::assertSame('Refund product X', $model->getText());
        $this::assertSame(1, $model->getQuantity());
        $this::assertSame(null, $model->getVat());
        $this::assertSame(null, $model->getCreated());
        $this::assertSame(null, $model->getOrderLineId());
        $this::assertSame(null, $model->getAmountInclVat());
        $this::assertSame(null, $model->getAmountExVat());
        $this::assertSame(null, $model->getUnitAmount());
        $this::assertSame(null, $model->getUnitAmountVat());
        $this::assertSame(null, $model->getUnitAmountExVat());
        $this::assertSame(null, $model->getAmountInclVatDefined());
        $this::assertSame(null, $model->getPeriodFrom());
        $this::assertSame(null, $model->getPeriodTo());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(CreditNoteLineModel::getClassName());
        $model = CreditNoteLineModel::fromArray($json);
        $this::assertSame(15000, $model->getAmount());
        $this::assertSame('Refund product X', $model->getText());
        $this::assertSame(1, $model->getQuantity());
        $this::assertSame(0.25, $model->getVat());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame('7f014d7f5d9e4ee89f1741a8cfe214d7', $model->getOrderLineId());
        $this::assertSame(1230, $model->getAmountInclVat());
        $this::assertSame(1230, $model->getAmountExVat());
        $this::assertSame(230, $model->getUnitAmount());
        $this::assertSame(230, $model->getUnitAmountVat());
        $this::assertSame(230, $model->getUnitAmountExVat());
        $this::assertSame(true, $model->getAmountInclVatDefined());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getPeriodFrom());
        $this::assertEquals(new DateTime('2015-05-04T12:40:56.656Z'), $model->getPeriodTo());
    }
}
