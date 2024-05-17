<?php

namespace Billwerk\Sdk\Test\Model\Refund;

use Billwerk\Sdk\Model\Refund\ManualTransferModel;
use Billwerk\Sdk\Model\Refund\NoteLineModel;
use Billwerk\Sdk\Model\Refund\RefundCreateModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class RefundCreateModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(RefundCreateModel::getClassName());
        $model = RefundCreateModel::fromArray($json);
        $this::assertSame('order-0000213', $model->getInvoice());
        $this::assertSame(null, $model->getKey());
        $this::assertSame(null, $model->getAmount());
        $this::assertSame(null, $model->getVat());
        $this::assertSame(null, $model->getText());
        $this::assertSame(null, $model->getAmountInclVat());
        $this::assertSame(null, $model->getNoteLines());
        $this::assertSame(null, $model->getManuaTransfer());
        $this::assertSame(null, $model->getAcquirerReference());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(RefundCreateModel::getClassName());
        $model = RefundCreateModel::fromArray($json);
        $this::assertSame('order-0000213', $model->getInvoice());
        $this::assertSame('5ee00b2b-effb-453e-a246-c3cc26acaeb9', $model->getKey());
        $this::assertSame(20000, $model->getAmount());
        $this::assertSame(0.25, $model->getVat());
        $this::assertSame('Super Product', $model->getText());
        $this::assertSame(true, $model->getAmountInclVat());
        $this::assertContainsOnlyInstancesOf(NoteLineModel::class, $model->getNoteLines());
        $this::assertInstanceOf(ManualTransferModel::class, $model->getManuaTransfer());
        $this::assertSame('sdvsds', $model->getAcquirerReference());
    }
}
