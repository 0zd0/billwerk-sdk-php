<?php

namespace Billwerk\Sdk\Test\Unit\Model\PaymentMethod;

use Billwerk\Sdk\Enum\PaymentMethodPaymentTypeEnum;
use Billwerk\Sdk\Enum\PaymentMethodStateEnum;
use Billwerk\Sdk\Model\OfflineMandateModel;
use Billwerk\Sdk\Model\PaymentMethod\ApplePayModel;
use Billwerk\Sdk\Model\PaymentMethod\CardModel;
use Billwerk\Sdk\Model\PaymentMethod\MpsSubscriptionModel;
use Billwerk\Sdk\Model\PaymentMethod\PaymentMethodModel;
use Billwerk\Sdk\Model\PaymentMethod\SepaMandateModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use DateTime;
use Exception;

class PaymentMethodModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(PaymentMethodModel::getClassName());
        $model = PaymentMethodModel::fromArray($json);
        $this::assertSame('ca_fcfac2016614418f969fa5697383e47c', $model->getId());
        $this::assertSame(PaymentMethodStateEnum::ACTIVE, $model->getState());
        $this::assertSame('customer00069', $model->getCustomer());
        $this::assertSame(null, $model->getReference());
        $this::assertSame(null, $model->getFailed());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertSame(null, $model->getCard());
        $this::assertSame(null, $model->getApplePay());
        $this::assertSame(PaymentMethodPaymentTypeEnum::CARD, $model->getPaymentType());
        $this::assertSame(null, $model->getMpsSubscription());
        $this::assertSame(null, $model->getVippsRecurringMandate());
        $this::assertSame(null, $model->getSepaMandate());
        $this::assertSame(null, $model->getOfflineMandate());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(PaymentMethodModel::getClassName());
        $model = PaymentMethodModel::fromArray($json);
        $this::assertSame('ca_fcfac2016614418f969fa5697383e47c', $model->getId());
        $this::assertSame(PaymentMethodStateEnum::ACTIVE, $model->getState());
        $this::assertSame('customer00069', $model->getCustomer());
        $this::assertSame('cs_6be90a4babc3c57ef7e6e477ac97ed3b', $model->getReference());
        $this::assertEquals(new DateTime('2015-06-04T12:40:56.656Z'), $model->getFailed());
        $this::assertEquals(new DateTime('2015-04-04T12:40:56.656Z'), $model->getCreated());
        $this::assertInstanceOf(CardModel::class, $model->getCard());
        $this::assertInstanceOf(ApplePayModel::class, $model->getApplePay());
        $this::assertSame(PaymentMethodPaymentTypeEnum::CARD, $model->getPaymentType());
        $this::assertInstanceOf(MpsSubscriptionModel::class, $model->getMpsSubscription());
        $this::assertSame([], $model->getVippsRecurringMandate());
        $this::assertInstanceOf(SepaMandateModel::class, $model->getSepaMandate());
        $this::assertInstanceOf(OfflineMandateModel::class, $model->getOfflineMandate());
    }
}
