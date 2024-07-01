<?php

namespace Billwerk\Sdk\Model\Checkout\Session;

use Billwerk\Sdk\Enum\PreOrderPurchaseIndicatorEnum;
use Billwerk\Sdk\Enum\ReorderItemsIndicatorEnum;
use Billwerk\Sdk\Enum\ShippingIndicatorEnum;
use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasRequestApiInterface;

class RiskIndicatorModel extends AbstractModel implements HasRequestApiInterface
{
    /**
     * For Electronic delivery, the email address to which the merchandise was delivered. Must be RFC5322 compliant
     *
     * @var string|null $deliveryEmail
     */
    protected ?string $deliveryEmail = null;

    /**
     * Indicates the merchandise delivery timeframe: electronic - Electronic Delivery, same_day_shipping - Same day
     * shipping, overnight_shipping - Overnight shipping, two_day_or_more_shipping - Two-day or more shipping
     *
     * @see DeliveryTimeframeEnum
     * @var string|null $deliveryTimeframe
     */
    protected ?string $deliveryTimeframe = null;

    /**
     * For prepaid or gift card purchase, the purchase amount total of prepaid or gift card(s) in major units
     * (for example, USD 123.45 is 123)
     *
     * @var int|null $giftCardAmount
     */
    protected ?int $giftCardAmount = null;

    /**
     * For prepaid or gift card purchase, total count of individual prepaid or gift cards/codes purchased
     *
     * @var int|null $giftCardCount
     */
    protected ?int $giftCardCount = null;

    /**
     * For prepaid or gift card purchase, currency code of the gift card in ISO 4217 three letter alpha code
     *
     * @var string|null $giftCardCurrency
     */
    protected ?string $giftCardCurrency = null;

    /**
     * For a pre-ordered purchase, the expected local date that the merchandise will be available.
     * Local date on the form yyyy-MM-dd
     *
     * @var string|null $preOrderDate
     */
    protected ?string $preOrderDate = null;

    /**
     * Indicates whether cardholder is placing an order for merchandise with a future availability or release
     * date. Either: merchandise_available or future_availability
     *
     * @see PreOrderPurchaseIndicatorEnum
     * @var string|null $preOrderPurchaseIndicator
     */
    protected ?string $preOrderPurchaseIndicator = null;

    /**
     * Indicates whether the cardholder is reordering previously purchased merchandise.
     * Either: first_time_ordered or reordered
     *
     * @see ReorderItemsIndicatorEnum
     * @var string|null $reorderItemsIndicator
     */
    protected ?string $reorderItemsIndicator = null;

    /**
     * Indicates shipping method chosen for the transaction. The Shipping Indicator code that most accurately describes
     * the cardholder’s specific transaction must be used, not the general business. If one or more items are included
     * in the sale, use the Shipping Indicator code for the physical goods, or if all digital goods, use the Shipping
     * Indicator code that describes the most expensive item. Possible values: billing_address - Ship to cardholder’s
     * billing address, verified - Ship to another verified address on file, non_billing_address - Ship to address that
     * is different than the cardholder’s billing address, ship_to_store - Pick-up at local store (Store address shall
     * be populated in shipping address fields), digital_goods - Digital goods (includes online services, electronic
     * gift cards and redemption codes), travel_and_event_tickets - Travel and Event tickets, not shipped, other
     * - Other (for example, Gaming, digital services not shipped, emedia subscriptions, etc.)
     *
     * @see ShippingIndicatorEnum
     * @var string|null $shippingIndicator
     */
    protected ?string $shippingIndicator = null;

    /**
     * For Electronic delivery, the email address to which the merchandise was delivered. Must be RFC5322 compliant
     *
     * @return string|null
     */
    public function getDeliveryEmail(): ?string
    {
        return $this->deliveryEmail;
    }

    /**
     * Indicates the merchandise delivery timeframe: electronic - Electronic Delivery, same_day_shipping - Same day
     *  shipping, overnight_shipping - Overnight shipping, two_day_or_more_shipping - Two-day or more shipping
     *
     * @see DeliveryTimeframeEnum
     * @return string|null
     */
    public function getDeliveryTimeframe(): ?string
    {
        return $this->deliveryTimeframe;
    }

    /**
     * For prepaid or gift card purchase, the purchase amount total of prepaid or gift card(s) in major units
     *  (for example, USD 123.45 is 123)
     *
     * @return int|null
     */
    public function getGiftCardAmount(): ?int
    {
        return $this->giftCardAmount;
    }

    /**
     * For prepaid or gift card purchase, total count of individual prepaid or gift cards/codes purchased
     *
     * @return int|null
     */
    public function getGiftCardCount(): ?int
    {
        return $this->giftCardCount;
    }

    /**
     * For prepaid or gift card purchase, currency code of the gift card in ISO 4217 three letter alpha code
     *
     * @return string|null
     */
    public function getGiftCardCurrency(): ?string
    {
        return $this->giftCardCurrency;
    }

    /**
     * For a pre-ordered purchase, the expected local date that the merchandise will be available.
     *  Local date on the form yyyy-MM-dd
     *
     * @return string|null
     */
    public function getPreOrderDate(): ?string
    {
        return $this->preOrderDate;
    }

    /**
     * Indicates whether cardholder is placing an order for merchandise with a future availability or release
     *  date. Either: merchandise_available or future_availability
     *
     * @see PreOrderPurchaseIndicatorEnum
     * @return string|null
     */
    public function getPreOrderPurchaseIndicator(): ?string
    {
        return $this->preOrderPurchaseIndicator;
    }

    /**
     * Indicates whether the cardholder is reordering previously purchased merchandise.
     *  Either: first_time_ordered or reordered
     *
     * @see ReorderItemsIndicatorEnum
     * @return string|null
     */
    public function getReorderItemsIndicator(): ?string
    {
        return $this->reorderItemsIndicator;
    }

    /**
     * Indicates shipping method chosen for the transaction. The Shipping Indicator code that most accurately describes
     * the cardholder’s specific transaction must be used, not the general business. If one or more items are included
     * in the sale, use the Shipping Indicator code for the physical goods, or if all digital goods, use the Shipping
     * Indicator code that describes the most expensive item. Possible values: billing_address - Ship to cardholder’s
     * billing address, verified - Ship to another verified address on file, non_billing_address - Ship to address that
     * is different than the cardholder’s billing address, ship_to_store - Pick-up at local store (Store address shall
     * be populated in shipping address fields), digital_goods - Digital goods (includes online services, electronic
     * gift cards and redemption codes), travel_and_event_tickets - Travel and Event tickets, not shipped, other
     * - Other (for example, Gaming, digital services not shipped, emedia subscriptions, etc.)
     *
     * @see ShippingIndicatorEnum
     * @return string|null
     */
    public function getShippingIndicator(): ?string
    {
        return $this->shippingIndicator;
    }

    /**
     * For Electronic delivery, the email address to which the merchandise was delivered. Must be RFC5322 compliant
     *
     * @param string|null $deliveryEmail
     *
     * @return self
     */
    public function setDeliveryEmail(?string $deliveryEmail): self
    {
        $this->deliveryEmail = $deliveryEmail;

        return $this;
    }

    /**
     * Indicates the merchandise delivery timeframe: electronic - Electronic Delivery, same_day_shipping - Same day
     *  shipping, overnight_shipping - Overnight shipping, two_day_or_more_shipping - Two-day or more shipping
     *
     * @see DeliveryTimeframeEnum
     *
     * @param string|null $deliveryTimeframe
     *
     * @return self
     */
    public function setDeliveryTimeframe(?string $deliveryTimeframe): self
    {
        $this->deliveryTimeframe = $deliveryTimeframe;

        return $this;
    }

    /**
     * For prepaid or gift card purchase, the purchase amount total of prepaid or gift card(s) in major units
     *  (for example, USD 123.45 is 123)
     *
     * @param int|null $giftCardAmount
     *
     * @return self
     */
    public function setGiftCardAmount(?int $giftCardAmount): self
    {
        $this->giftCardAmount = $giftCardAmount;

        return $this;
    }

    /**
     * For prepaid or gift card purchase, total count of individual prepaid or gift cards/codes purchased
     *
     * @param int|null $giftCardCount
     *
     * @return self
     */
    public function setGiftCardCount(?int $giftCardCount): self
    {
        $this->giftCardCount = $giftCardCount;

        return $this;
    }

    /**
     * For prepaid or gift card purchase, currency code of the gift card in ISO 4217 three letter alpha code
     *
     * @param string|null $giftCardCurrency
     *
     * @return self
     */
    public function setGiftCardCurrency(?string $giftCardCurrency): self
    {
        $this->giftCardCurrency = $giftCardCurrency;

        return $this;
    }

    /**
     * For a pre-ordered purchase, the expected local date that the merchandise will be available.
     *  Local date on the form yyyy-MM-dd
     *
     * @param string|null $preOrderDate
     *
     * @return self
     */
    public function setPreOrderDate(?string $preOrderDate): self
    {
        $this->preOrderDate = $preOrderDate;

        return $this;
    }

    /**
     * Indicates whether cardholder is placing an order for merchandise with a future availability or release
     *  date. Either: merchandise_available or future_availability
     *
     * @see PreOrderPurchaseIndicatorEnum
     *
     * @param string|null $preOrderPurchaseIndicator
     *
     * @return self
     */
    public function setPreOrderPurchaseIndicator(?string $preOrderPurchaseIndicator): self
    {
        $this->preOrderPurchaseIndicator = $preOrderPurchaseIndicator;

        return $this;
    }

    /**
     * Indicates whether the cardholder is reordering previously purchased merchandise.
     *  Either: first_time_ordered or reordered
     *
     * @see ReorderItemsIndicatorEnum
     *
     * @param string|null $reorderItemsIndicator
     *
     * @return self
     */
    public function setReorderItemsIndicator(?string $reorderItemsIndicator): self
    {
        $this->reorderItemsIndicator = $reorderItemsIndicator;

        return $this;
    }

    /**
     * Indicates shipping method chosen for the transaction. The Shipping Indicator code that most accurately describes
     * the cardholder’s specific transaction must be used, not the general business. If one or more items are included
     * in the sale, use the Shipping Indicator code for the physical goods, or if all digital goods, use the Shipping
     * Indicator code that describes the most expensive item. Possible values: billing_address - Ship to cardholder’s
     * billing address, verified - Ship to another verified address on file, non_billing_address - Ship to address that
     * is different than the cardholder’s billing address, ship_to_store - Pick-up at local store (Store address shall
     * be populated in shipping address fields), digital_goods - Digital goods (includes online services, electronic
     * gift cards and redemption codes), travel_and_event_tickets - Travel and Event tickets, not shipped, other
     * - Other (for example, Gaming, digital services not shipped, emedia subscriptions, etc.)
     *
     * @see ShippingIndicatorEnum
     *
     * @param string|null $shippingIndicator
     *
     * @return self
     */
    public function setShippingIndicator(?string $shippingIndicator): self
    {
        $this->shippingIndicator = $shippingIndicator;

        return $this;
    }


    /**
     * @param array $response
     *
     * @return self
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        if (isset($response['delivery_email'])) {
            $model->setDeliveryEmail($response['delivery_email']);
        }

        if (isset($response['delivery_timeframe'])) {
            $model->setDeliveryTimeframe($response['delivery_timeframe']);
        }

        if (isset($response['gift_card_amount'])) {
            $model->setGiftCardAmount($response['gift_card_amount']);
        }

        if (isset($response['gift_card_count'])) {
            $model->setGiftCardCount($response['gift_card_count']);
        }

        if (isset($response['gift_card_currency'])) {
            $model->setGiftCardCurrency($response['gift_card_currency']);
        }

        if (isset($response['pre_order_date'])) {
            $model->setPreOrderDate($response['pre_order_date']);
        }

        if (isset($response['pre_order_purchase_indicator'])
            && in_array($response['pre_order_purchase_indicator'], PreOrderPurchaseIndicatorEnum::getAll(), true)) {
            $model->setPreOrderPurchaseIndicator($response['pre_order_purchase_indicator']);
        }

        if (isset($response['reorder_items_indicator'])
            && in_array($response['reorder_items_indicator'], ReorderItemsIndicatorEnum::getAll(), true)) {
            $model->setReorderItemsIndicator($response['reorder_items_indicator']);
        }

        if (isset($response['shipping_indicator'])
                  && in_array($response['shipping_indicator'], ShippingIndicatorEnum::getAll(), true)) {
            $model->setShippingIndicator($response['shipping_indicator']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'delivery_email' => $this->getDeliveryEmail(),
            'delivery_timeframe' => $this->getDeliveryTimeframe(),
            'gift_card_amount' => $this->getGiftCardAmount(),
            'gift_card_count' => $this->getGiftCardCount(),
            'gift_card_currency' => $this->getGiftCardCurrency(),
            'pre_order_date' => $this->getPreOrderDate(),
            'pre_order_purchase_indicator' => $this->getPreOrderPurchaseIndicator(),
            'reorder_items_indicator' => $this->getReorderItemsIndicator(),
            'shipping_indicator' => $this->getShippingIndicator(),
        ], function ($value) {
            return $value !== null;
        });
    }

    public function toApi(): array
    {
        return $this->toArray();
    }
}
