<?php

namespace Billwerk\Sdk\Model;

use Billwerk\Sdk\Enum\PaymentTypeEnum;
use Billwerk\Sdk\Enum\StatePaymentMethodEnum;
use DateTime;
use Exception;

class PaymentMethodModel extends AbstractModel implements HasIdInterface
{
    protected string                $id;
    protected string                $state;
    protected string                $customer;
    protected ?string               $reference;
    protected ?DateTime             $failed;
    protected DateTime              $created;
    protected ?CardModel            $card;
    protected ?ApplePayModel        $applePay;
    protected ?string               $paymentType;
    protected ?MpsSubscriptionModel $mpsSubscription;
    protected ?array               $vippsRecurringMandate;
    protected ?SepaMandateModel     $sepaMandate;
    protected ?OfflineMandateModel  $offlineMandate;
    
    /**
     * @return ApplePayModel|null
     */
    public function getApplePay(): ?ApplePayModel
    {
        return $this->applePay;
    }
    
    /**
     * @return CardModel|null
     */
    public function getCard(): ?CardModel
    {
        return $this->card;
    }
    
    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }
    
    /**
     * @return string
     */
    public function getCustomer(): string
    {
        return $this->customer;
    }
    
    /**
     * @return DateTime|null
     */
    public function getFailed(): ?DateTime
    {
        return $this->failed;
    }
    
    /**
     * @return MpsSubscriptionModel|null
     */
    public function getMpsSubscription(): ?MpsSubscriptionModel
    {
        return $this->mpsSubscription;
    }
    
    /**
     * @return OfflineMandateModel|null
     */
    public function getOfflineMandate(): ?OfflineMandateModel
    {
        return $this->offlineMandate;
    }
    
    /**
     * @return string|null
     */
    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }
    
    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }
    
    /**
     * @return SepaMandateModel|null
     */
    public function getSepaMandate(): ?SepaMandateModel
    {
        return $this->sepaMandate;
    }
    
    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }
    
    /**
     * @return array|null
     */
    public function getVippsRecurringMandate(): ?array
    {
        return $this->vippsRecurringMandate;
    }
    
    /**
     * @param ApplePayModel|null $applePay
     */
    public function setApplePay(?ApplePayModel $applePay): void
    {
        $this->applePay = $applePay;
    }
    
    /**
     * @param CardModel|null $card
     */
    public function setCard(?CardModel $card): void
    {
        $this->card = $card;
    }
    
    /**
     * @param DateTime $created
     */
    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }
    
    /**
     * @param string $customer
     */
    public function setCustomer(string $customer): void
    {
        $this->customer = $customer;
    }
    
    /**
     * @param DateTime|null $failed
     */
    public function setFailed(?DateTime $failed): void
    {
        $this->failed = $failed;
    }
    
    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }
    
    /**
     * @param MpsSubscriptionModel|null $mpsSubscription
     */
    public function setMpsSubscription(?MpsSubscriptionModel $mpsSubscription): void
    {
        $this->mpsSubscription = $mpsSubscription;
    }
    
    /**
     * @param OfflineMandateModel|null $offlineMandate
     */
    public function setOfflineMandate(?OfflineMandateModel $offlineMandate): void
    {
        $this->offlineMandate = $offlineMandate;
    }
    
    /**
     * @param string|null $paymentType
     */
    public function setPaymentType(?string $paymentType): void
    {
        $this->paymentType = $paymentType;
    }
    
    /**
     * @param string|null $reference
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }
    
    /**
     * @param SepaMandateModel|null $sepaMandate
     */
    public function setSepaMandate(?SepaMandateModel $sepaMandate): void
    {
        $this->sepaMandate = $sepaMandate;
    }
    
    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }
    
    /**
     * @param array|null $vippsRecurringMandate
     */
    public function setVippsRecurringMandate(?array $vippsRecurringMandate): void
    {
        $this->vippsRecurringMandate = $vippsRecurringMandate;
    }
    
    /**
     * @throws Exception
     */
    public static function fromArray(array $response): self
    {
        $paymentMethod = new self();
        
        $paymentMethod->setId($response['id']);
        
        if (in_array($response['state'], StatePaymentMethodEnum::getAll(), true)) {
            $paymentMethod->setState($response['state']);
        }
        
        $paymentMethod->setCustomer($response['customer']);
        
        if (isset($response['reference'])) {
            $paymentMethod->setReference($response['reference']);
        }
        
        if (isset($response['failed'])) {
            $paymentMethod->setFailed(new DateTime($response['failed']));
        }
        
        $paymentMethod->setCreated(new DateTime($response['created']));
        
        if (isset($response['card'])) {
            $paymentMethod->setCard(CardModel::fromArray($response['card']));
        }
        
        if (isset($response['applepay'])) {
            $paymentMethod->setApplePay(ApplePayModel::fromArray($response['applepay']));
        }
        
        $paymentMethod->setPaymentType($response['payment_type']);
        
        if (isset($response['mps_subscription'])) {
            $paymentMethod->setMpsSubscription(MpsSubscriptionModel::fromArray($response['mps_subscription']));
        }
        
        if (isset($response['vipps_recurring_mandate'])) {
            $paymentMethod->setVippsRecurringMandate($response['vipps_recurring_mandate']);
        }
        
        if (isset($response['sepa_mandate'])) {
            $paymentMethod->setSepaMandate(SepaMandateModel::fromArray($response['sepa_mandate']));
        }
        
        if (isset($response['offline_mandate'])) {
            $paymentMethod->setOfflineMandate(OfflineMandateModel::fromArray($response['offline_mandate']));
        }
        
        return $paymentMethod;
    }
    
    public function getId(): ?string
    {
        return $this->id;
    }
}
