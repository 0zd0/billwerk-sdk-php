<?php

namespace Billwerk\Sdk\Test\Unit\Model;

use Billwerk\Sdk\Model\CreditNoteLineModel;
use Billwerk\Sdk\Model\CreditNoteModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class CreditNoteModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(CreditNoteModel::getClassName());
        $model = CreditNoteModel::fromArray($json);
        $this::assertSame('c33fbb06a00e4dc0b9055f6fb509c0ed', $model->getId());
        $this::assertSame('inv-2021', $model->getInvoice());
        $this::assertSame(null, $model->getTransaction());
        $this::assertSame(null, $model->getCredit());
        $this::assertSame(15000, $model->getAmount());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame('DKK', $model->getCurrency());
        $this::assertSame('customer006', $model->getCustomer());
        $this::assertSame(null, $model->getSubscription());
        $this::assertSame(2000, $model->getAmountVat());
        $this::assertSame(null, $model->getAmountExVat());
        $this::assertContainsOnlyInstancesOf(CreditNoteLineModel::class, $model->getCreditNoteLines());
        $this::assertSame(null, $model->getAccountingNumber());
        $this::assertSame(null, $model->getDebtorId());
        $this::assertSame(null, $model->getDownloadUrl());
        $this::assertSame(null, $model->getAccountingCreatedDate());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(CreditNoteModel::getClassName());
        $model = CreditNoteModel::fromArray($json);
        $this::assertSame('c33fbb06a00e4dc0b9055f6fb509c0ed', $model->getId());
        $this::assertSame('inv-2021', $model->getInvoice());
        $this::assertSame('082ebeb1b5864e019b6bf13cad7c535b', $model->getTransaction());
        $this::assertSame('credit-234', $model->getCredit());
        $this::assertSame(15000, $model->getAmount());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame('DKK', $model->getCurrency());
        $this::assertSame('customer006', $model->getCustomer());
        $this::assertSame('sub010', $model->getSubscription());
        $this::assertSame(2000, $model->getAmountVat());
        $this::assertSame(1323, $model->getAmountExVat());
        $this::assertContainsOnlyInstancesOf(CreditNoteLineModel::class, $model->getCreditNoteLines());
        $this::assertSame('CN-2024-03-00005', $model->getAccountingNumber());
        $this::assertSame(10001, $model->getDebtorId());
        $this::assertSame('https://example.com/123', $model->getDownloadUrl());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getAccountingCreatedDate());
    }
}
