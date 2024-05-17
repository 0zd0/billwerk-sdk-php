<?php

namespace Billwerk\Sdk\Test\Model\Invoice;

use Billwerk\Sdk\Enum\InvoiceStateEnum;
use Billwerk\Sdk\Enum\InvoiceTypeEnum;
use Billwerk\Sdk\Model\AddressModel;
use Billwerk\Sdk\Model\CreditNoteModel;
use Billwerk\Sdk\Model\Invoice\CreditModel;
use Billwerk\Sdk\Model\Invoice\InvoiceModel;
use Billwerk\Sdk\Model\Invoice\OrderLineModel;
use Billwerk\Sdk\Model\Invoice\TransactionModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class InvoiceModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(InvoiceModel::getClassName());
        $model = InvoiceModel::fromArray($json);
        $this::assertSame('dafba2016614418f969fa5697383e47c', $model->getId());
        $this::assertSame('inv-311', $model->getHandle());
        $this::assertSame('customer006', $model->getCustomer());
        $this::assertSame(null, $model->getSubscription());
        $this::assertSame(null, $model->getPlan());
        $this::assertSame(InvoiceStateEnum::PENDING, $model->getState());
        $this::assertSame(null, $model->getProcessing());
        $this::assertSame(InvoiceTypeEnum::CHARGE, $model->getType());
        $this::assertSame(10000, $model->getAmount());
        $this::assertSame(null, $model->getNumber());
        $this::assertSame('DKK', $model->getCurrency());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getDue());
        $this::assertEquals(null, $model->getFailed());
        $this::assertEquals(null, $model->getSettled());
        $this::assertEquals(null, $model->getCancelled());
        $this::assertEquals(null, $model->getAuthorized());
        $this::assertContainsOnlyInstancesOf(CreditModel::class, $model->getCredits());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame(null, $model->getPlanVersion());
        $this::assertSame(null, $model->getDunningPlan());
        $this::assertSame(20000, $model->getDiscountAmount());
        $this::assertSame(10000, $model->getOrgAmount());
        $this::assertSame(2000, $model->getAmountVat());
        $this::assertSame(8000, $model->getAmountExVat());
        $this::assertSame(50000, $model->getSettledAmount());
        $this::assertSame(50000, $model->getRefundedAmount());
        $this::assertSame(null, $model->getAuthorizedAmount());
        $this::assertSame(null, $model->getCreditedAmount());
        $this::assertSame(null, $model->getPeriodNumber());
        $this::assertSame(null, $model->getRecurringPaymentMethod());
        $this::assertContainsOnlyInstancesOf(OrderLineModel::class, $model->getOrderLines());
        $this::assertContainsOnly('string', $model->getAdditionalCosts());
        $this::assertContainsOnlyInstancesOf(TransactionModel::class, $model->getTransactions());
        $this::assertSame(null, $model->getDunningStart());
        $this::assertSame(null, $model->getDunningCount());
        $this::assertSame(null, $model->getDunningExpired());
        $this::assertSame(null, $model->getPeriodFrom());
        $this::assertSame(null, $model->getPeriodTo());
        $this::assertSame(null, $model->getSettleLater());
        $this::assertSame(null, $model->getSettleLaterPaymentMethod());
        $this::assertSame(null, $model->getBillingAddress());
        $this::assertSame(null, $model->getShippingAddress());
        $this::assertSame(null, $model->getAccountingNumber());
        $this::assertSame(null, $model->getDebtorId());
        $this::assertSame(null, $model->getDownloadUrl());
        $this::assertSame(null, $model->getAccountingCreatedDate());
        $this::assertSame(null, $model->getCreditNotes());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(InvoiceModel::getClassName());
        $model = InvoiceModel::fromArray($json);
        $this::assertSame('dafba2016614418f969fa5697383e47c', $model->getId());
        $this::assertSame('inv-311', $model->getHandle());
        $this::assertSame('customer006', $model->getCustomer());
        $this::assertSame('sub010', $model->getSubscription());
        $this::assertSame('a7a7195c54f644369922d0dfe794dd0c', $model->getPlan());
        $this::assertSame(InvoiceStateEnum::PENDING, $model->getState());
        $this::assertSame(false, $model->getProcessing());
        $this::assertSame(InvoiceTypeEnum::CHARGE, $model->getType());
        $this::assertSame(10000, $model->getAmount());
        $this::assertSame(1002, $model->getNumber());
        $this::assertSame('DKK', $model->getCurrency());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getDue());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getFailed());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getSettled());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCancelled());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getAuthorized());
        $this::assertContainsOnlyInstancesOf(CreditModel::class, $model->getCredits());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame(1, $model->getPlanVersion());
        $this::assertSame('dunning_plan_02', $model->getDunningPlan());
        $this::assertSame(20000, $model->getDiscountAmount());
        $this::assertSame(10000, $model->getOrgAmount());
        $this::assertSame(2000, $model->getAmountVat());
        $this::assertSame(8000, $model->getAmountExVat());
        $this::assertSame(50000, $model->getSettledAmount());
        $this::assertSame(50000, $model->getRefundedAmount());
        $this::assertSame(50000, $model->getAuthorizedAmount());
        $this::assertSame(50000, $model->getCreditedAmount());
        $this::assertSame(1, $model->getPeriodNumber());
        $this::assertSame('ca_0d53b3c057ac262647b482184d5fd574', $model->getRecurringPaymentMethod());
        $this::assertContainsOnlyInstancesOf(OrderLineModel::class, $model->getOrderLines());
        $this::assertContainsOnly('string', $model->getAdditionalCosts());
        $this::assertContainsOnlyInstancesOf(TransactionModel::class, $model->getTransactions());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getDunningStart());
        $this::assertSame(1, $model->getDunningCount());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getDunningExpired());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getPeriodFrom());
        $this::assertEquals(new DateTime('2015-05-04T12:40:56.656Z'), $model->getPeriodTo());
        $this::assertSame(true, $model->getSettleLater());
        $this::assertSame('ca_608698b783382bccc4e23b3a024631f0', $model->getSettleLaterPaymentMethod());
        $this::assertInstanceOf(AddressModel::class, $model->getBillingAddress());
        $this::assertInstanceOf(AddressModel::class, $model->getShippingAddress());
        $this::assertSame('2023/00005', $model->getAccountingNumber());
        $this::assertSame(10001, $model->getDebtorId());
        $this::assertSame('https://example.com/123', $model->getDownloadUrl());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getAccountingCreatedDate());
        $this::assertContainsOnlyInstancesOf(CreditNoteModel::class, $model->getCreditNotes());
    }
}
