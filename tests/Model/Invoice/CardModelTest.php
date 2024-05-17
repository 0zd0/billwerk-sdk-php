<?php

namespace Billwerk\Sdk\Test\Model\Invoice;

use Billwerk\Sdk\Enum\CardStateEnum;
use Billwerk\Sdk\Enum\CardTypeEnum;
use Billwerk\Sdk\Enum\ErrorStateEnum;
use Billwerk\Sdk\Enum\StrongAuthenticationStatusEnum;
use Billwerk\Sdk\Enum\ThreeDSecureStatusEnum;
use Billwerk\Sdk\Enum\TransactionErrorEnum;
use Billwerk\Sdk\Model\Invoice\CardModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class CardModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(CardModel::getClassName());
        $model = CardModel::fromArray($json);

        $this::assertSame('ca_fcfac2016614418f969fa5697383e47c', $model->getId());
        $this::assertSame(CardStateEnum::ACTIVE, $model->getState());
        $this::assertSame('customer00069', $model->getCustomer());
        $this::assertSame(null, $model->getReference());
        $this::assertEquals(null, $model->getFailed());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame(null, $model->getFingerprint());
        $this::assertEquals(null, $model->getReactivated());
        $this::assertSame('657e86162633415a9e6b715248c84da4', $model->getGwRef());
        $this::assertSame(CardTypeEnum::VISA_DK, $model->getCardType());
        $this::assertSame(null, $model->getTransactionCardType());
        $this::assertSame(null, $model->getExpDate());
        $this::assertSame(null, $model->getMaskedCard());
        $this::assertEquals(null, $model->getLastSuccess());
        $this::assertEquals(null, $model->getLastFailed());
        $this::assertEquals(null, $model->getFirstFail());
        $this::assertSame(null, $model->getErrorCode());
        $this::assertSame(null, $model->getErrorState());
        $this::assertSame(null, $model->getStrongAuthenticationStatus());
        $this::assertSame(null, $model->getThreeDSecureStatus());
        $this::assertSame(null, $model->getRiskRule());
        $this::assertSame(null, $model->getCardCountry());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(CardModel::getClassName());
        $model = CardModel::fromArray($json);
        $this::assertSame('ca_fcfac2016614418f969fa5697383e47c', $model->getId());
        $this::assertSame(CardStateEnum::ACTIVE, $model->getState());
        $this::assertSame('customer00069', $model->getCustomer());
        $this::assertSame('cs_6be90a4babc3c57ef7e6e477ac97ed3b', $model->getReference());
        $this::assertEquals(new DateTime('2015-06-04T12:40:56.656Z'), $model->getFailed());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame('cst_64e8a26cc0e85bc3f5ce7c5b366b4096', $model->getFingerprint());
        $this::assertEquals(new DateTime('2015-05-14T00:00:00Z'), $model->getReactivated());
        $this::assertSame('657e86162633415a9e6b715248c84da4', $model->getGwRef());
        $this::assertSame(CardTypeEnum::VISA_DK, $model->getCardType());
        $this::assertSame(CardTypeEnum::VISA, $model->getTransactionCardType());
        $this::assertSame('09-18', $model->getExpDate());
        $this::assertSame('457111XXXXXX3777', $model->getMaskedCard());
        $this::assertEquals(new DateTime('2015-05-14T00:00:00Z'), $model->getLastSuccess());
        $this::assertEquals(new DateTime('2015-05-14T00:00:00Z'), $model->getLastFailed());
        $this::assertEquals(new DateTime('2015-05-14T00:00:00Z'), $model->getFirstFail());
        $this::assertSame(TransactionErrorEnum::CREDIT_CARD_EXPIRED, $model->getErrorCode());
        $this::assertSame(ErrorStateEnum::HARD_DECLINED, $model->getErrorState());
        $this::assertSame(StrongAuthenticationStatusEnum::SECURED_BY_NETS, $model->getStrongAuthenticationStatus());
        $this::assertSame(ThreeDSecureStatusEnum::Y, $model->getThreeDSecureStatus());
        $this::assertSame('string', $model->getRiskRule());
        $this::assertSame('US', $model->getCardCountry());
    }
}
