<?php

namespace Billwerk\Sdk\Test\Model\Invoice;

use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\TransactionErrorEnum;
use Billwerk\Sdk\Model\Invoice\SantanderTransactionModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class SantanderTransactionModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(SantanderTransactionModel::getClassName());
        $model = SantanderTransactionModel::fromArray($json);
        $this::assertSame(null, $model->getError());
        $this::assertSame(null, $model->getRefTransaction());
        $this::assertSame(null, $model->getErrorState());
        $this::assertSame(null, $model->getAcquirerMessage());
        $this::assertSame(null, $model->getSantanderId());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(SantanderTransactionModel::getClassName());
        $model = SantanderTransactionModel::fromArray($json);
        $this::assertSame(TransactionErrorEnum::CREDIT_CARD_EXPIRED, $model->getError());
        $this::assertSame('a7a7195c54f644369922d0dfe794dd0c', $model->getRefTransaction());
        $this::assertSame(ErrorStateEnum::HARD_DECLINED, $model->getErrorState());
        $this::assertSame('Rejected', $model->getAcquirerMessage());
        $this::assertSame('28fc559a229e4fd3a134297a478a0075', $model->getSantanderId());
    }
}
