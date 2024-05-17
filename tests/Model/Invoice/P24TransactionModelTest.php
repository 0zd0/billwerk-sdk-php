<?php

namespace Billwerk\Sdk\Test\Model\Invoice;

use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\TransactionErrorEnum;
use Billwerk\Sdk\Model\Invoice\P24TransactionModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class P24TransactionModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(P24TransactionModel::getClassName());
        $model = P24TransactionModel::fromArray($json);
        $this::assertSame(null, $model->getError());
        $this::assertSame(null, $model->getRefTransaction());
        $this::assertSame(null, $model->getErrorState());
        $this::assertSame(null, $model->getAcquirerMessage());
        $this::assertSame(null, $model->getP24Id());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(P24TransactionModel::getClassName());
        $model = P24TransactionModel::fromArray($json);
        $this::assertSame(TransactionErrorEnum::CREDIT_CARD_EXPIRED, $model->getError());
        $this::assertSame('a7a7195c54f644369922d0dfe794dd0c', $model->getRefTransaction());
        $this::assertSame(ErrorStateEnum::HARD_DECLINED, $model->getErrorState());
        $this::assertSame('Rejected', $model->getAcquirerMessage());
        $this::assertSame('28fc559a229e4fd3a134297a478a0070', $model->getP24Id());
    }
}
