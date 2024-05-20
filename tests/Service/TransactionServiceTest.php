<?php

namespace Billwerk\Sdk\Test\Service;

use Billwerk\Sdk\Model\Transaction\TransactionGetModel;
use Billwerk\Sdk\Model\Transaction\TransactionModel;

final class TransactionServiceTest extends AbstractServiceTest
{
    public function testGetTransaction()
    {
        $this->setMockJsonModel(TransactionModel::getClassName());

        $id = 'dafba2016614418f969fa5697383e47c';
        $transaction = 'drggregdafba2016614418f969fa5697383e47c';

        $getTransaction = $this->transaction->get((new TransactionGetModel())->setId($id)->setTransaction($transaction));

        $this::assertInstanceOf(TransactionModel::class, $getTransaction);
        $this::assertSame($id, $getTransaction->getId());
    }
}
