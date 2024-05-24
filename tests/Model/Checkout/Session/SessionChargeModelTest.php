<?php

namespace Billwerk\Sdk\Test\Model\Checkout\Session;

use Billwerk\Sdk\Model\AccountFundingInformationModel;
use Billwerk\Sdk\Model\Checkout\Session\OrderModel;
use Billwerk\Sdk\Model\Checkout\Session\ScaDataModel;
use Billwerk\Sdk\Model\Checkout\Session\SessionChargeModel;
use Billwerk\Sdk\Model\Checkout\Session\SessionDataModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class SessionChargeModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(SessionChargeModel::getClassName());
        $model = SessionChargeModel::fromArray($json);
        $this::assertSame(null, $model->getConfiguration());
        $this::assertSame(null, $model->getLocale());
        $this::assertSame(null, $model->getTtl());
        $this::assertSame(null, $model->getPhone());
        $this::assertSame(null, $model->getInvoice());
        $this::assertSame(null, $model->getSettle());
        $this::assertSame(null, $model->getOrder());
        $this::assertSame(null, $model->getRecurring());
        $this::assertSame(null, $model->getAcceptUrl());
        $this::assertSame(null, $model->getCancelUrl());
        $this::assertSame(null, $model->getPaymentMethods());
        $this::assertSame(null, $model->getCardOnFile());
        $this::assertSame(null, $model->getCardOnFileRequireCvv());
        $this::assertSame(null, $model->getCardOnFileRequireExpDate());
        $this::assertSame(null, $model->getButtonText());
        $this::assertSame(null, $model->getRecurringAverageAmount());
        $this::assertSame(null, $model->getScaData());
        $this::assertSame(null, $model->getSessionData());
        $this::assertSame(null, $model->getPaymentMethodReference());
        $this::assertSame(null, $model->getAccountFunding());
        $this::assertSame(null, $model->getAccountFundingInformation());
        $this::assertSame(null, $model->getAgreementFilter());
        $this::assertSame(null, $model->getOfflineAgreementFilter());
        $this::assertSame(null, $model->getAllowedIp());
        $this::assertSame(null, $model->getTextOnStatement());
        $this::assertSame(null, $model->getAcquirerReference());
        $this::assertSame(null, $model->getRecurringOptional());
        $this::assertSame(null, $model->getRecurringOptionalText());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(SessionChargeModel::getClassName());
        $model = SessionChargeModel::fromArray($json);
        $this::assertSame('ses', $model->getConfiguration());
        $this::assertSame('en_US', $model->getLocale());
        $this::assertSame('PT3H', $model->getTtl());
        $this::assertSame('+4531313131', $model->getPhone());
        $this::assertSame('order', $model->getInvoice());
        $this::assertSame(false, $model->getSettle());
        $this::assertInstanceOf(OrderModel::class, $model->getOrder());
        $this::assertSame(true, $model->getRecurring());
        $this::assertSame('https://myshow.com/success/order-343', $model->getAcceptUrl());
        $this::assertSame('https://myshow.com/cancel/order-343', $model->getCancelUrl());
        $this::assertContainsOnly('string', $model->getPaymentMethods());
        $this::assertSame('ca_xxx', $model->getCardOnFile());
        $this::assertSame(false, $model->getCardOnFileRequireCvv());
        $this::assertSame(true, $model->getCardOnFileRequireExpDate());
        $this::assertSame('pay', $model->getButtonText());
        $this::assertSame(10000, $model->getRecurringAverageAmount());
        $this::assertInstanceOf(ScaDataModel::class, $model->getScaData());
        $this::assertInstanceOf(SessionDataModel::class, $model->getSessionData());
        $this::assertSame('order-3424', $model->getPaymentMethodReference());
        $this::assertSame(true, $model->getAccountFunding());
        $this::assertInstanceOf(AccountFundingInformationModel::class, $model->getAccountFundingInformation());
        $this::assertContainsOnly('string', $model->getAgreementFilter());
        $this::assertContainsOnly('string', $model->getOfflineAgreementFilter());
        $this::assertSame('1.2.3.4', $model->getAllowedIp());
        $this::assertSame('myshop.com 23', $model->getTextOnStatement());
        $this::assertSame('dwqd', $model->getAcquirerReference());
        $this::assertSame(true, $model->getRecurringOptional());
        $this::assertSame('Save payment method for later use', $model->getRecurringOptionalText());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
