<?php

namespace Billwerk\Sdk\Test\Model;

use Billwerk\Sdk\Enum\CardTypeEnum;
use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\StrongAuthenticationStatusEnum;
use Billwerk\Sdk\Enum\ThreeDSecureStatusEnum;
use Billwerk\Sdk\Model\ApplePayModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class ApplePayModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(ApplePayModel::getClassName());
        $model = ApplePayModel::fromArray($json);
        $this::assertSame('nets', $model->getGateway());
        $this::assertSame('657e86162633415a9e6b715248c84da4', $model->getGwRef());
        $this::assertSame(CardTypeEnum::VISA_DK, $model->getCardType());
        $this::assertSame('2b18c5d1f4dc640d9ff91bfbb2cbcce0', $model->getCardAgreement());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(ApplePayModel::getClassName());
        $model = ApplePayModel::fromArray($json);
        $this::assertSame('nets', $model->getGateway());
        $this::assertSame('cst_64e8a26cc0e85bc3f5ce7c5b366b4096', $model->getFingerprint());
        $this::assertEquals(new DateTime('2015-05-14T00:00:00Z'), $model->getReactivated());
        $this::assertSame('657e86162633415a9e6b715248c84da4', $model->getGwRef());
        $this::assertSame(CardTypeEnum::VISA_DK, $model->getCardType());
        $this::assertSame(CardTypeEnum::VISA, $model->getTransactionCardType());
        $this::assertSame('2b18c5d1f4dc640d9ff91bfbb2cbcce0', $model->getCardAgreement());
        $this::assertSame('09-18', $model->getExpDate());
        $this::assertSame('457111XXXXXX3777', $model->getMaskedCard());
        $this::assertEquals(new DateTime('2015-05-14T00:00:00Z'), $model->getLastSuccess());
        $this::assertEquals(new DateTime('2015-05-14T00:00:00Z'), $model->getLastFailed());
        $this::assertEquals(new DateTime('2015-05-14T00:00:00Z'), $model->getFirstFail());
        $this::assertSame('credit_card_expired', $model->getErrorCode());
        $this::assertSame(ErrorStateEnum::HARD_DECLINED, $model->getErrorState());
        $this::assertSame(2, $model->getDeclinedCount());
        $this::assertSame(StrongAuthenticationStatusEnum::SECURED_BY_NETS, $model->getStrongAuthenticationStatus());
        $this::assertSame(ThreeDSecureStatusEnum::Y, $model->getThreeDSecureStatus());
        $this::assertSame('string', $model->getRiskRule());
        $this::assertSame('US', $model->getCardCountry());
    }
}
