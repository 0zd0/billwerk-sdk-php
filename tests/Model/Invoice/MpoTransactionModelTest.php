<?php

namespace Billwerk\Sdk\Test\Model\Invoice;

use Billwerk\Sdk\Enum\CardTypeEnum;
use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\ProviderEnum;
use Billwerk\Sdk\Enum\StrongAuthenticationStatusEnum;
use Billwerk\Sdk\Enum\ThreeDSecureStatusEnum;
use Billwerk\Sdk\Enum\TransactionErrorEnum;
use Billwerk\Sdk\Model\Invoice\CardModel;
use Billwerk\Sdk\Model\Invoice\MpoTransactionModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class MpoTransactionModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(MpoTransactionModel::getClassName());
        $model = MpoTransactionModel::fromArray($json);
        $this::assertSame(null, $model->getCard());
        $this::assertSame(null, $model->getError());
        $this::assertSame(null, $model->getFingerprint());
        $this::assertSame(null, $model->getProvider());
        $this::assertSame(null, $model->getFrictionless());
        $this::assertSame(null, $model->getRefTransaction());
        $this::assertSame(null, $model->getGwId());
        $this::assertSame(null, $model->getLastFailed());
        $this::assertSame(null, $model->getFirstFailed());
        $this::assertSame(null, $model->getErrorState());
        $this::assertSame(CardTypeEnum::VISA_DK, $model->getCardType());
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
        $json  = $this::getStubJsonModelWithAllFields(MpoTransactionModel::getClassName());
        $model = MpoTransactionModel::fromArray($json);
        $this::assertInstanceOf(CardModel::class, $model->getCard());
        $this::assertSame(TransactionErrorEnum::CREDIT_CARD_EXPIRED, $model->getError());
        $this::assertSame('cst_64e8a26cc0e85bc3f5ce7c5b366b4096', $model->getFingerprint());
        $this::assertSame(ProviderEnum::CLEARHAUS, $model->getProvider());
        $this::assertSame(true, $model->getFrictionless());
        $this::assertSame('a7a7195c54f644369922d0dfe794dd0c', $model->getRefTransaction());
        $this::assertSame('28fc559a229e4fd3a134297a478a0075', $model->getGwId());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getLastFailed());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getFirstFailed());
        $this::assertSame(ErrorStateEnum::HARD_DECLINED, $model->getErrorState());
        $this::assertSame(CardTypeEnum::VISA_DK, $model->getCardType());
        $this::assertSame(CardTypeEnum::VISA, $model->getTransactionCardType());
        $this::assertSame('09-18', $model->getExpDate());
        $this::assertSame('457111XXXXXX3777', $model->getMaskedCard());
        $this::assertSame('US', $model->getCardCountry());
        $this::assertSame(StrongAuthenticationStatusEnum::SECURED_BY_NETS, $model->getStrongAuthenticationStatus());
        $this::assertSame(ThreeDSecureStatusEnum::Y, $model->getThreeDSecureStatus());
        $this::assertSame('string', $model->getRiskRule());
        $this::assertSame('40135', $model->getAcquirerCode());
        $this::assertSame('Card expired', $model->getAcquirerMessage());
        $this::assertSame('Card expired', $model->getAcquirerReference());
        $this::assertSame('myshop.com 123', $model->getTextOnStatement());
        $this::assertSame(123, $model->getSurchargeFee());
    }
}
