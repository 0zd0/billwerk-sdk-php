<?php

namespace Billwerk\Sdk\Test\Model\Checkout\Session;

use Billwerk\Sdk\Enum\AgeIndicatorEnum;
use Billwerk\Sdk\Enum\CardAgeIndicatorEnum;
use Billwerk\Sdk\Enum\ChangeIndicatorEnum;
use Billwerk\Sdk\Enum\PasswordChangeIndicatorEnum;
use Billwerk\Sdk\Enum\ShippingAddressUsageIndicatorEnum;
use Billwerk\Sdk\Model\Checkout\Session\AccountInfoModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class AccountInfoModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(AccountInfoModel::getClassName());
        $model = AccountInfoModel::fromArray($json);
        $this::assertSame(null, $model->getCreated());
        $this::assertSame(null, $model->getChanged());
        $this::assertSame(null, $model->getAgeIndicator());
        $this::assertSame(null, $model->getChangeIndicator());
        $this::assertSame(null, $model->getPasswordChange());
        $this::assertSame(null, $model->getPasswordChangeIndicator());
        $this::assertSame(null, $model->getPurchaseCount());
        $this::assertSame(null, $model->getAddCardAttempts());
        $this::assertSame(null, $model->getTransactionsDay());
        $this::assertSame(null, $model->getTransactionsYear());
        $this::assertSame(null, $model->getCardAge());
        $this::assertSame(null, $model->getCardAgeIndicator());
        $this::assertSame(null, $model->getShippingAddressUsage());
        $this::assertSame(null, $model->getShippingAddressUsageIndicator());
        $this::assertSame(null, $model->getShippingNameIndicator());
        $this::assertSame(null, $model->getSuspiciousActivity());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(AccountInfoModel::getClassName());
        $model = AccountInfoModel::fromArray($json);
        $this::assertSame('2020-11-03', $model->getCreated());
        $this::assertSame('2020-11-03', $model->getChanged());
        $this::assertSame(AgeIndicatorEnum::THIS_TRANSACTION, $model->getAgeIndicator());
        $this::assertSame(ChangeIndicatorEnum::LESS_THAN_30_DAYS, $model->getChangeIndicator());
        $this::assertSame('2020-11-03', $model->getPasswordChange());
        $this::assertSame(PasswordChangeIndicatorEnum::THIS_TRANSACTION, $model->getPasswordChangeIndicator());
        $this::assertSame(2, $model->getPurchaseCount());
        $this::assertSame(0, $model->getAddCardAttempts());
        $this::assertSame(2, $model->getTransactionsDay());
        $this::assertSame(32, $model->getTransactionsYear());
        $this::assertSame('2020-10-02', $model->getCardAge());
        $this::assertSame(CardAgeIndicatorEnum::FROM_30_TO_60_DAYS, $model->getCardAgeIndicator());
        $this::assertSame('2020-09-21', $model->getShippingAddressUsage());
        $this::assertSame(
            ShippingAddressUsageIndicatorEnum::FROM_30_TO_60_DAYS,
            $model->getShippingAddressUsageIndicator()
        );
        $this::assertSame(false, $model->getShippingNameIndicator());
        $this::assertSame(true, $model->getSuspiciousActivity());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
