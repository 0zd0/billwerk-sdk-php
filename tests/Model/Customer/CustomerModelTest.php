<?php

namespace Billwerk\Sdk\Test\Model\Customer;

use Billwerk\Sdk\Model\Customer\CustomerModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class CustomerModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(CustomerModel::getClassName());
        $model = CustomerModel::fromArray($json);
        $this::assertSame(null, $model->getEmail());
        $this::assertSame(null, $model->getAddress());
        $this::assertSame(null, $model->getAddress2());
        $this::assertSame(null, $model->getCity());
        $this::assertSame(null, $model->getCountry());
        $this::assertSame(null, $model->getPhone());
        $this::assertSame(null, $model->getCompany());
        $this::assertSame(null, $model->getVat());
        $this::assertSame(null, $model->getLanguage());
        $this::assertSame('customer006', $model->getHandle());
        $this::assertSame(null, $model->getTest());
        $this::assertSame(0, $model->getSubscriptions());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame(null, $model->getDeleted());
        $this::assertSame(null, $model->getFirstName());
        $this::assertSame(null, $model->getLastName());
        $this::assertSame(null, $model->getPostalCode());
        $this::assertSame(null, $model->getDebtorId());
        $this::assertSame(1, $model->getActiveSubscriptions());
        $this::assertSame(2, $model->getTrialActiveSubscriptions());
        $this::assertSame(3, $model->getTrialCancelledSubscriptions());
        $this::assertSame(4, $model->getExpiredSubscriptions());
        $this::assertSame(5, $model->getOnHoldSubscriptions());
        $this::assertSame(6, $model->getCancelledSubscriptions());
        $this::assertSame(7, $model->getNonRenewingSubscriptions());
        $this::assertSame(8, $model->getFailedInvoices());
        $this::assertSame(9, $model->getFailedAmount());
        $this::assertSame(10, $model->getCancelledInvoices());
        $this::assertSame(11, $model->getCancelledAmount());
        $this::assertSame(12, $model->getPendingInvoices());
        $this::assertSame(13, $model->getPendingAmount());
        $this::assertSame(14, $model->getDunningInvoices());
        $this::assertSame(15, $model->getDunningAmount());
        $this::assertSame(16, $model->getSettledInvoices());
        $this::assertSame(17, $model->getSettledAmount());
        $this::assertSame(18, $model->getRefundedAmount());
        $this::assertSame(19, $model->getPendingAdditionalCosts());
        $this::assertSame(20, $model->getPendingAdditionalCostAmount());
        $this::assertSame(21, $model->getTransferredAdditionalCosts());
        $this::assertSame(22, $model->getTransferredAdditionalCostAmount());
        $this::assertSame(23, $model->getPendingCredits());
        $this::assertSame(24, $model->getPendingCreditAmount());
        $this::assertSame(25, $model->getTransferredCredits());
        $this::assertSame(26, $model->getTransferredCreditAmount());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(CustomerModel::getClassName());
        $model = CustomerModel::fromArray($json);
        $this::assertSame('carl@leone.com', $model->getEmail());
        $this::assertSame('Grove Street 12', $model->getAddress());
        $this::assertSame('Ganton', $model->getAddress2());
        $this::assertSame('Los Santos', $model->getCity());
        $this::assertSame('US', $model->getCountry());
        $this::assertSame('555-gotcars', $model->getPhone());
        $this::assertSame('Leones Cars', $model->getCompany());
        $this::assertSame('US123456789', $model->getVat());
        $this::assertSame('en', $model->getLanguage());
        $this::assertSame('customer006', $model->getHandle());
        $this::assertSame(true, $model->getTest());
        $this::assertSame(0, $model->getSubscriptions());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getDeleted());
        $this::assertSame('Carl', $model->getFirstName());
        $this::assertSame('Johnson', $model->getLastName());
        $this::assertSame('4531', $model->getPostalCode());
        $this::assertSame(10001, $model->getDebtorId());
        $this::assertSame(1, $model->getActiveSubscriptions());
        $this::assertSame(2, $model->getTrialActiveSubscriptions());
        $this::assertSame(3, $model->getTrialCancelledSubscriptions());
        $this::assertSame(4, $model->getExpiredSubscriptions());
        $this::assertSame(5, $model->getOnHoldSubscriptions());
        $this::assertSame(6, $model->getCancelledSubscriptions());
        $this::assertSame(7, $model->getNonRenewingSubscriptions());
        $this::assertSame(8, $model->getFailedInvoices());
        $this::assertSame(9, $model->getFailedAmount());
        $this::assertSame(10, $model->getCancelledInvoices());
        $this::assertSame(11, $model->getCancelledAmount());
        $this::assertSame(12, $model->getPendingInvoices());
        $this::assertSame(13, $model->getPendingAmount());
        $this::assertSame(14, $model->getDunningInvoices());
        $this::assertSame(15, $model->getDunningAmount());
        $this::assertSame(16, $model->getSettledInvoices());
        $this::assertSame(17, $model->getSettledAmount());
        $this::assertSame(18, $model->getRefundedAmount());
        $this::assertSame(19, $model->getPendingAdditionalCosts());
        $this::assertSame(20, $model->getPendingAdditionalCostAmount());
        $this::assertSame(21, $model->getTransferredAdditionalCosts());
        $this::assertSame(22, $model->getTransferredAdditionalCostAmount());
        $this::assertSame(23, $model->getPendingCredits());
        $this::assertSame(24, $model->getPendingCreditAmount());
        $this::assertSame(25, $model->getTransferredCredits());
        $this::assertSame(26, $model->getTransferredCreditAmount());
    }
}
