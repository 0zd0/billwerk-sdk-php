<?php

namespace Billwerk\Sdk\Test\Model\Transaction;

use Billwerk\Sdk\Model\Transaction\ManualTransactionModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class ManualTransactionModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(ManualTransactionModel::getClassName());
        $model = ManualTransactionModel::fromArray($json);
        $this::assertSame('cash', $model->getMethod());
        $this::assertSame(null, $model->getComment());
        $this::assertSame(null, $model->getReference());
        $this::assertEquals(new DateTime('2024-05-16T22:41:12.921Z'), $model->getPaymentDate());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(ManualTransactionModel::getClassName());
        $model = ManualTransactionModel::fromArray($json);
        $this::assertSame('cash', $model->getMethod());
        $this::assertSame('Paid by cash in the shop', $model->getComment());
        $this::assertSame('231', $model->getReference());
        $this::assertEquals(new DateTime('2024-05-16T22:41:12.921Z'), $model->getPaymentDate());
    }
}
