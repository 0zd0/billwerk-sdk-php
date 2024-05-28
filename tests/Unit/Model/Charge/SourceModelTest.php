<?php

namespace Billwerk\Sdk\Test\Unit\Model\Charge;

use Billwerk\Sdk\Enum\CardTypeEnum;
use Billwerk\Sdk\Enum\ProviderEnum;
use Billwerk\Sdk\Enum\SourceTypeEnum;
use Billwerk\Sdk\Enum\StrongAuthenticationStatusEnum;
use Billwerk\Sdk\Enum\ThreeDSecureStatusEnum;
use Billwerk\Sdk\Model\Charge\SourceModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class SourceModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(SourceModel::getClassName());
        $model = SourceModel::fromArray($json);
        $this::assertSame(SourceTypeEnum::CARD, $model->getType());
        $this::assertSame(null, $model->getCard());
        $this::assertSame(null, $model->getMps());
        $this::assertSame(null, $model->getIban());
        $this::assertSame(null, $model->getFingerprint());
        $this::assertSame(null, $model->getProvider());
        $this::assertSame(null, $model->getFrictionless());
        $this::assertSame(null, $model->getVippsRecurring());
        $this::assertSame(null, $model->getSepaMandate());
        $this::assertSame(null, $model->getOfflineAgreementHandle());
        $this::assertSame(null, $model->getAuthTransaction());
        $this::assertSame(null, $model->getCardType());
        $this::assertSame(null, $model->getTransactionCardType());
        $this::assertSame(null, $model->getExpDate());
        $this::assertSame(null, $model->getMaskedCard());
        $this::assertSame(null, $model->getCardCountry());
        $this::assertSame(null, $model->getStrongAuthenticationStatus());
        $this::assertSame(null, $model->getThreeDSecureStatus());
        $this::assertSame(null, $model->getRiskRule());
        $this::assertSame(null, $model->getAcquirerCode());
        $this::assertSame(null, $model->getAcquirerMessage());
        $this::assertSame(null, $model->getAcquirerReference());
        $this::assertSame(null, $model->getTextOnStatement());
        $this::assertSame(null, $model->getSurchargeFee());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(SourceModel::getClassName());
        $model = SourceModel::fromArray($json);
        $this::assertSame(SourceTypeEnum::CARD, $model->getType());
        $this::assertSame('ca_80437fbb75cc5ec47aee09ff160e9cb9', $model->getCard());
        $this::assertSame('ms_4f3b975246e6acb7f569297d67830d64', $model->getMps());
        $this::assertSame('DK9520000123456789', $model->getIban());
        $this::assertSame('cst_64e8a26cc0e85bc3f5ce7c5b366b4096', $model->getFingerprint());
        $this::assertSame(ProviderEnum::CLEARHAUS, $model->getProvider());
        $this::assertSame(true, $model->getFrictionless());
        $this::assertSame('vr_4f3b975246e6acb7f569297d67830d64', $model->getVippsRecurring());
        $this::assertSame('sr_4f3b975246e6acb7f569297d67830d64', $model->getSepaMandate());
        $this::assertSame('offline-cash-123', $model->getOfflineAgreementHandle());
        $this::assertSame('4f3b975246e6acb7f569297d67830d64', $model->getAuthTransaction());
        $this::assertSame(CardTypeEnum::VISA_DK, $model->getCardType());
        $this::assertSame(CardTypeEnum::VISA, $model->getTransactionCardType());
        $this::assertSame('09-18', $model->getExpDate());
        $this::assertSame('457111XXXXXX3777', $model->getMaskedCard());
        $this::assertSame('US', $model->getCardCountry());
        $this::assertSame(StrongAuthenticationStatusEnum::SECURED_BY_NETS, $model->getStrongAuthenticationStatus());
        $this::assertSame(ThreeDSecureStatusEnum::Y, $model->getThreeDSecureStatus());
        $this::assertSame('non_eu_card', $model->getRiskRule());
        $this::assertSame('40135', $model->getAcquirerCode());
        $this::assertSame('Card expired', $model->getAcquirerMessage());
        $this::assertSame('Card expired', $model->getAcquirerReference());
        $this::assertSame('myshop.com 123', $model->getTextOnStatement());
        $this::assertSame(123, $model->getSurchargeFee());
    }
}
