<?php

namespace Billwerk\Sdk\Test\Unit\Model\Checkout\Session;

use Billwerk\Sdk\Enum\DeliveryTimeframeEnum;
use Billwerk\Sdk\Enum\PreOrderPurchaseIndicatorEnum;
use Billwerk\Sdk\Enum\ReorderItemsIndicatorEnum;
use Billwerk\Sdk\Enum\ShippingIndicatorEnum;
use Billwerk\Sdk\Model\Checkout\Session\RiskIndicatorModel;
use Billwerk\Sdk\Test\StubTrait;
use Billwerk\Sdk\Test\TestCase;
use Exception;

class RiskIndicatorModelTest extends TestCase
{
    use StubTrait;

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithRequiredFields()
    {
        $json  = $this::getStubJsonModelWithRequiredFields(RiskIndicatorModel::getClassName());
        $model = RiskIndicatorModel::fromArray($json);
        $this::assertSame(null, $model->getDeliveryEmail());
        $this::assertSame(null, $model->getDeliveryTimeframe());
        $this::assertSame(null, $model->getGiftCardAmount());
        $this::assertSame(null, $model->getGiftCardCount());
        $this::assertSame(null, $model->getGiftCardCurrency());
        $this::assertSame(null, $model->getPreOrderDate());
        $this::assertSame(null, $model->getPreOrderPurchaseIndicator());
        $this::assertSame(null, $model->getReorderItemsIndicator());
        $this::assertSame(null, $model->getShippingIndicator());
    }

    /**
     * @throws Exception
     */
    public function testFromArrayMethodWithAllFields()
    {
        $json  = $this::getStubJsonModelWithAllFields(RiskIndicatorModel::getClassName());
        $model = RiskIndicatorModel::fromArray($json);
        $this::assertSame('mail@example.com', $model->getDeliveryEmail());
        $this::assertSame(DeliveryTimeframeEnum::ELECTRONIC, $model->getDeliveryTimeframe());
        $this::assertSame(123, $model->getGiftCardAmount());
        $this::assertSame(5, $model->getGiftCardCount());
        $this::assertSame('USD', $model->getGiftCardCurrency());
        $this::assertSame('2020-11-05', $model->getPreOrderDate());
        $this::assertSame(PreOrderPurchaseIndicatorEnum::MERCHANDISE_AVAILABLE, $model->getPreOrderPurchaseIndicator());
        $this::assertSame(ReorderItemsIndicatorEnum::FIRST_TIME_ORDERED, $model->getReorderItemsIndicator());
        $this::assertSame(ShippingIndicatorEnum::VERIFIED, $model->getShippingIndicator());

        $toApi = $model->toApi();
        $this::assertEqualsCanonicalizing(sort($toApi), sort($json));
    }
}
