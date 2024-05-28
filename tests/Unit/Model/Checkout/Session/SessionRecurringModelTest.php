<?php

namespace Billwerk\Sdk\Test\Unit\Model\Checkout\Session;

use Billwerk\Sdk\Model\AccountFundingInformationModel;
use Billwerk\Sdk\Model\Checkout\Session\CustomerModel;
use Billwerk\Sdk\Model\Checkout\Session\ScaDataModel;
use Billwerk\Sdk\Model\Checkout\Session\SessionDataModel;
use Billwerk\Sdk\Model\Checkout\Session\SessionRecurringModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class SessionRecurringModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(SessionRecurringModel::getClassName());
        $model = SessionRecurringModel::fromArray($json);
        $this::assertSame(null, $model->getConfiguration());
        $this::assertSame(null, $model->getLocale());
        $this::assertSame(null, $model->getTtl());
        $this::assertSame(null, $model->getPhone());
        $this::assertSame(null, $model->getCustomer());
        $this::assertSame(null, $model->getCurrency());
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
        $this::assertSame(null, $model->getCreateCustomer());
        $this::assertSame(null, $model->getOrderText());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(SessionRecurringModel::getClassName());
        $model = SessionRecurringModel::fromArray($json);
        $this::assertSame('ddd', $model->getConfiguration());
        $this::assertSame('en_US', $model->getLocale());
        $this::assertSame('PT3H', $model->getTtl());
        $this::assertSame('+4531313131', $model->getPhone());
        $this::assertSame('cust-0011', $model->getCustomer());
        $this::assertSame('DKK', $model->getCurrency());
        $this::assertSame('https://myshow.com/success/order-343', $model->getAcceptUrl());
        $this::assertSame('https://myshow.com/cancel/order-343', $model->getCancelUrl());
        $this::assertContainsOnly('string', $model->getPaymentMethods());
        $this::assertSame('ca_xxx', $model->getCardOnFile());
        $this::assertSame(true, $model->getCardOnFileRequireCvv());
        $this::assertSame(false, $model->getCardOnFileRequireExpDate());
        $this::assertSame('pay', $model->getButtonText());
        $this::assertSame(10000, $model->getRecurringAverageAmount());
        $this::assertInstanceOf(ScaDataModel::class, $model->getScaData());
        $this::assertInstanceOf(SessionDataModel::class, $model->getSessionData());
        $this::assertSame('order-3424', $model->getPaymentMethodReference());
        $this::assertSame(false, $model->getAccountFunding());
        $this::assertInstanceOf(AccountFundingInformationModel::class, $model->getAccountFundingInformation());
        $this::assertContainsOnly('string', $model->getAgreementFilter());
        $this::assertContainsOnly('string', $model->getOfflineAgreementFilter());
        $this::assertSame('1.2.3.4', $model->getAllowedIp());
        $this::assertInstanceOf(CustomerModel::class, $model->getCreateCustomer());
        $this::assertSame('Monthly broadband subscription €199', $model->getOrderText());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
