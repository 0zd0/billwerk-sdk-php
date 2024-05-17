<?php

namespace Billwerk\Sdk\Test\Model\Invoice;

use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\TransactionErrorEnum;
use Billwerk\Sdk\Model\Invoice\TwintTransactionModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class TwintTransactionModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(TwintTransactionModel::getClassName());
        $model = TwintTransactionModel::fromArray($json);
        $this::assertSame(null, $model->getError());
        $this::assertSame(null, $model->getRefTransaction());
        $this::assertSame(null, $model->getErrorState());
        $this::assertSame(null, $model->getAcquirerMessage());
        $this::assertSame(null, $model->getTwintId());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(TwintTransactionModel::getClassName());
        $model = TwintTransactionModel::fromArray($json);
        $this::assertSame(TransactionErrorEnum::CREDIT_CARD_EXPIRED, $model->getError());
        $this::assertSame('a7a7195c54f644369922d0dfe794dd0c', $model->getRefTransaction());
        $this::assertSame(ErrorStateEnum::HARD_DECLINED, $model->getErrorState());
        $this::assertSame('Rejected', $model->getAcquirerMessage());
        $this::assertSame('c9f38076a13d1758b5d98e62dc601cc7', $model->getTwintId());
    }
}
