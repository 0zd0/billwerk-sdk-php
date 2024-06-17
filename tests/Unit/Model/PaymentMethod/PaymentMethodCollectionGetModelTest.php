<?php

namespace Billwerk\Sdk\Test\Unit\Model\PaymentMethod;

use Billwerk\Sdk\Enum\RangeEnum;
use Billwerk\Sdk\Model\Customer\CustomerCollectionGetModel;
use Billwerk\Sdk\Model\PaymentMethod\PaymentMethodCollectionGetModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class PaymentMethodCollectionGetModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(PaymentMethodCollectionGetModel::getClassName());
        $model = PaymentMethodCollectionGetModel::fromArray($json);
        $this::assertEquals(null, $model->getFrom());
        $this::assertEquals(null, $model->getTo());
        $this::assertSame(null, $model->getInterval());
        $this::assertSame(null, $model->getSize());
        $this::assertSame(null, $model->getNextPageToken());
        $this::assertSame(null, $model->getRange());
        $this::assertSame(null, $model->getId());
        $this::assertSame(null, $model->getState());
        $this::assertSame(null, $model->getPaymentType());
        $this::assertSame(null, $model->getCustomer());
        $this::assertSame(null, $model->getSubscription());
        $this::assertSame(null, $model->getReference());
        $this::assertSame(null, $model->getFailed());
        $this::assertSame(null, $model->getCardType());
        $this::assertSame(null, $model->getTransactionCardType());
        $this::assertSame(null, $model->getCardPrefix());
        $this::assertSame(null, $model->getCardPostfix());
        $this::assertSame(null, $model->getCardFingerprint());
        $this::assertSame(null, $model->getCardCountry());
        $this::assertSame(null, $model->getCardGateway());
        $this::assertSame(null, $model->getCardAgreement());
        $this::assertSame(null, $model->getOfflineAgreementHandle());
        $this::assertSame(null, $model->getMpsExternalId());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(PaymentMethodCollectionGetModel::getClassName());
        $model = PaymentMethodCollectionGetModel::fromArray($json);
        $this::assertEquals(new DateTime('2021-09-06T13:02:23.190'), $model->getFrom());
        $this::assertEquals(new DateTime('2021-10-06T13:02:23.190'), $model->getTo());
        $this::assertSame('P1W', $model->getInterval());
        $this::assertSame(50, $model->getSize());
        $this::assertSame('MTYzMjkxNDc4NTAwMDoxMA', $model->getNextPageToken());
        $this::assertSame(RangeEnum::CREATED, $model->getRange());
        $this::assertSame('ca_c9c125152dee0420a71d2577896e12ab', $model->getId());
        $this::assertContainsOnly('string', $model->getState());
        $this::assertContainsOnly('string', $model->getPaymentType());
        $this::assertSame('cust-0002', $model->getCustomer());
        $this::assertSame('sub-0010', $model->getSubscription());
        $this::assertSame('card-0002', $model->getReference());
        $this::assertSame('[2021-09-01;2021-10-01]', $model->getFailed());
        $this::assertContainsOnly('string', $model->getCardType());
        $this::assertContainsOnly('string', $model->getTransactionCardType());
        $this::assertSame('457100', $model->getCardPrefix());
        $this::assertSame('0123', $model->getCardPostfix());
        $this::assertSame('0124', $model->getCardFingerprint());
        $this::assertContainsOnly('string', $model->getCardCountry());
        $this::assertSame('nets', $model->getCardGateway());
        $this::assertSame('2b18c5d1f4dc640d9ff91bfbb2cbcce0', $model->getCardAgreement());
        $this::assertSame('offline-bank-transfer-dk-01', $model->getOfflineAgreementHandle());
        $this::assertSame('sub-0021', $model->getMpsExternalId());

        $this::assertEqualsCanonicalizing($model->toApi(), $json);
    }
}
