<?php

namespace Billwerk\Sdk\Test\Model\Transaction;

use Billwerk\Sdk\Model\Invoice\InvoiceGetModel;
use Billwerk\Sdk\Model\Transaction\TransactionGetModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class TransactionGetModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(TransactionGetModel::getClassName());
        $model = TransactionGetModel::fromArray($json);
        $this::assertSame('handle1', $model->getId());
        $this::assertSame('123214141241212oko1opk', $model->getTransaction());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(TransactionGetModel::getClassName());
        $model = TransactionGetModel::fromArray($json);
        $this::assertSame('handle1', $model->getId());
        $this::assertSame('123214141241212oko1opk', $model->getTransaction());
    }
}
