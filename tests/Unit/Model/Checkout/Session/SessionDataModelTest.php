<?php

namespace Billwerk\Sdk\Test\Unit\Model\Checkout\Session;

use Billwerk\Sdk\Enum\IntervalUnitEnum;
use Billwerk\Sdk\Enum\MpsFrequencyEnum;
use Billwerk\Sdk\Enum\VippsRecurringPricingTypeEnum;
use Billwerk\Sdk\Model\Checkout\Session\SessionDataModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class SessionDataModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(SessionDataModel::getClassName());
        $model = SessionDataModel::fromArray($json);
        $this::assertSame(null, $model->getSsn());
        $this::assertSame(null, $model->getAccountHolderName());
        $this::assertSame(null, $model->getMpsAmount());
        $this::assertSame(null, $model->getMpsPlan());
        $this::assertSame(null, $model->getMpsDescription());
        $this::assertSame(null, $model->getMpsFrequency());
        $this::assertSame(null, $model->getMpsExternalId());
        $this::assertSame(null, $model->getMpsPaymentDescription());
        $this::assertSame(null, $model->getMpsCancelRedirectUrl());
        $this::assertSame(null, $model->getAlternativeReturnUrl());
        $this::assertSame(null, $model->getApplepayRecurringPaymentStartDate());
        $this::assertSame(null, $model->getApplepayRecurringPaymentEndDate());
        $this::assertSame(null, $model->getApplepayRecurringPaymentIntervalUnit());
        $this::assertSame(null, $model->getApplepayRecurringPaymentIntervalCount());
        $this::assertSame(null, $model->getApplepayRecurringLabel());
        $this::assertSame(null, $model->getApplepayRecurringAmount());
        $this::assertSame(null, $model->getSepaDebtorName());
        $this::assertSame(null, $model->getSepaDebtorAddress());
        $this::assertSame(null, $model->getSepaDebtorPostalCode());
        $this::assertSame(null, $model->getSepaDebtorCity());
        $this::assertSame(null, $model->getSepaDebtorCountry());
        $this::assertSame(null, $model->getSepaDebtorIban());
        $this::assertSame(null, $model->getSepaMandateAmount());
        $this::assertSame(null, $model->getVippsRecurringAmount());
        $this::assertSame(null, $model->getVippsRecurringProductName());
        $this::assertSame(null, $model->getVippsRecurringPricingType());
        $this::assertSame(null, $model->getVippsRecurringProductDescription());
        $this::assertSame(null, $model->getVippsRecurringIntervalCount());
        $this::assertSame(null, $model->getVippsRecurringIntervalUnit());
        $this::assertSame(null, $model->getVippsRecurringInitialPaymentDescription());
        $this::assertSame(null, $model->getVippsRecurringMerchantCancelUrl());
        $this::assertSame(null, $model->getVippsRecurringCampaignAmount());
        $this::assertSame(null, $model->getVippsRecurringCampaignIntervalCount());
        $this::assertSame(null, $model->getVippsRecurringCampaignEndDate());
        $this::assertSame(null, $model->getAnydayWebshopUrl());
        $this::assertSame(null, $model->getVippsRecurringCampaignIntervalUnit());
        $this::assertSame(null, $model->getMpoMinimumUserAge());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(SessionDataModel::getClassName());
        $model = SessionDataModel::fromArray($json);
        $this::assertSame('200519903345', $model->getSsn());
        $this::assertSame('John Doe', $model->getAccountHolderName());
        $this::assertSame(20000, $model->getMpsAmount());
        $this::assertSame('Premium Subscription', $model->getMpsPlan());
        $this::assertSame('Free access', $model->getMpsDescription());
        $this::assertSame(MpsFrequencyEnum::YEARLY, $model->getMpsFrequency());
        $this::assertSame('sub-0021', $model->getMpsExternalId());
        $this::assertSame('Welcome package', $model->getMpsPaymentDescription());
        $this::assertSame('https://merchant.com/my-mps-cancel-page.html', $model->getMpsCancelRedirectUrl());
        $this::assertSame('e', $model->getAlternativeReturnUrl());
        $this::assertSame('2022-06-01', $model->getApplepayRecurringPaymentStartDate());
        $this::assertSame('2022-12-01', $model->getApplepayRecurringPaymentEndDate());
        $this::assertSame(IntervalUnitEnum::MONTH, $model->getApplepayRecurringPaymentIntervalUnit());
        $this::assertSame(12, $model->getApplepayRecurringPaymentIntervalCount());
        $this::assertSame('Premium Subscription', $model->getApplepayRecurringLabel());
        $this::assertSame(20001, $model->getApplepayRecurringAmount());
        $this::assertSame('Michael Schmidt', $model->getSepaDebtorName());
        $this::assertSame('Mainzer Landstrasse 51', $model->getSepaDebtorAddress());
        $this::assertSame('60329', $model->getSepaDebtorPostalCode());
        $this::assertSame('Frankfurt am Main', $model->getSepaDebtorCity());
        $this::assertSame('DE', $model->getSepaDebtorCountry());
        $this::assertSame('DE12345678901234567890', $model->getSepaDebtorIban());
        $this::assertSame(20002, $model->getSepaMandateAmount());
        $this::assertSame(20003, $model->getVippsRecurringAmount());
        $this::assertSame('Premier subscription', $model->getVippsRecurringProductName());
        $this::assertSame(VippsRecurringPricingTypeEnum::VARIABLE, $model->getVippsRecurringPricingType());
        $this::assertSame('Access to all games', $model->getVippsRecurringProductDescription());
        $this::assertSame(12, $model->getVippsRecurringIntervalCount());
        $this::assertSame(IntervalUnitEnum::YEAR, $model->getVippsRecurringIntervalUnit());
        $this::assertSame('Welcome package', $model->getVippsRecurringInitialPaymentDescription());
        $this::assertSame(
            'https://www.reepay.com/vipps-recurring-cancel-page.html',
            $model->getVippsRecurringMerchantCancelUrl()
        );
        $this::assertSame(20004, $model->getVippsRecurringCampaignAmount());
        $this::assertSame(30, $model->getVippsRecurringCampaignIntervalCount());
        $this::assertEquals(new DateTime('2024-05-14T05:03:56.656Z'), $model->getVippsRecurringCampaignEndDate());
        $this::assertSame('https://www.mywebshop.com', $model->getAnydayWebshopUrl());
        $this::assertSame(IntervalUnitEnum::DAY, $model->getVippsRecurringCampaignIntervalUnit());
        $this::assertSame(22, $model->getMpoMinimumUserAge());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
