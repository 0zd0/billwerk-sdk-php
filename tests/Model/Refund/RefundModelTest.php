<?php

namespace Billwerk\Sdk\Test\Model\Refund;

use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\RefundStateEnum;
use Billwerk\Sdk\Enum\RefundTypeEnum;
use Billwerk\Sdk\Enum\TransactionErrorEnum;
use Billwerk\Sdk\Model\Refund\RefundModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class RefundModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(RefundModel::getClassName());
        $model = RefundModel::fromArray($json);
        $this::assertSame('aafba2016614418f969fa5697383e47c', $model->getId());
        $this::assertSame(RefundStateEnum::REFUNDED, $model->getState());
        $this::assertSame('order-0000213', $model->getInvoice());
        $this::assertSame(10000, $model->getAmount());
        $this::assertSame('DKK', $model->getCurrency());
        $this::assertSame('dafba2016614418f969fa5697383e47c', $model->getTransaction());
        $this::assertSame(null, $model->getError());
        $this::assertSame(RefundTypeEnum::CARD, $model->getType());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame(null, $model->getCreditNoteId());
        $this::assertSame(null, $model->getRefTransaction());
        $this::assertSame(null, $model->getErrorSate());
        $this::assertSame(null, $model->getAcquirerMessage());
        $this::assertSame(null, $model->getAccountingNumber());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(RefundModel::getClassName());
        $model = RefundModel::fromArray($json);
        $this::assertSame('aafba2016614418f969fa5697383e47c', $model->getId());
        $this::assertSame(RefundStateEnum::REFUNDED, $model->getState());
        $this::assertSame('order-0000213', $model->getInvoice());
        $this::assertSame(10000, $model->getAmount());
        $this::assertSame('DKK', $model->getCurrency());
        $this::assertSame('dafba2016614418f969fa5697383e47c', $model->getTransaction());
        $this::assertSame(TransactionErrorEnum::CREDIT_CARD_EXPIRED, $model->getError());
        $this::assertSame(RefundTypeEnum::CARD, $model->getType());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame('a9cf80b4aec2d7bc12f85612f7a0f184', $model->getCreditNoteId());
        $this::assertSame('a7a7195c54f644369922d0dfe794dd0c', $model->getRefTransaction());
        $this::assertSame(ErrorStateEnum::HARD_DECLINED, $model->getErrorSate());
        $this::assertSame('Card expired', $model->getAcquirerMessage());
        $this::assertSame('2023/00005', $model->getAccountingNumber());
    }
}
