<?php

namespace Billwerk\Sdk\Test\Model\Invoice;

use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\TransactionErrorEnum;
use Billwerk\Sdk\Model\Invoice\OfflineTransactionModel;
use Billwerk\Sdk\Model\OfflineMandateModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class OfflineTransactionModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(OfflineTransactionModel::getClassName());
        $model = OfflineTransactionModel::fromArray($json);
        $this::assertSame(null, $model->getError());
        $this::assertSame(null, $model->getRefTransaction());
        $this::assertSame(null, $model->getErrorState());
        $this::assertSame(null, $model->getAcquirerMessage());
        $this::assertSame(null, $model->getOfflineMandate());
        $this::assertSame(null, $model->getOfflineAgreementHandle());
        $this::assertSame('string', $model->getOfflinePaymentInstructions());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(OfflineTransactionModel::getClassName());
        $model = OfflineTransactionModel::fromArray($json);
        $this::assertSame(TransactionErrorEnum::CREDIT_CARD_EXPIRED, $model->getError());
        $this::assertSame('a7a7195c54f644369922d0dfe794dd0c', $model->getRefTransaction());
        $this::assertSame(ErrorStateEnum::HARD_DECLINED, $model->getErrorState());
        $this::assertSame('Rejected', $model->getAcquirerMessage());
        $this::assertInstanceOf(OfflineMandateModel::class, $model->getOfflineMandate());
        $this::assertSame('string', $model->getOfflineAgreementHandle());
        $this::assertSame('string', $model->getOfflinePaymentInstructions());
    }
}
