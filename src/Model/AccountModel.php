<?php

namespace Billwerk\Sdk\Model;

use Billwerk\Sdk\Enum\StateAccountEnum;
use DateTime;
use Exception;

class AccountModel extends AbstractModel implements HasIdInterface
{
    protected string   $handle;
    protected string   $currency;
    protected string   $name;
    protected ?string  $address;
    protected ?string  $address2;
    protected ?string  $city;
    protected string   $locale;
    protected string   $timezone;
    protected string   $country;
    protected ?string  $email;
    protected ?string  $phone;
    protected ?string  $vat;
    protected ?string  $website;
    protected ?string  $logo;
    protected string   $id;
    protected string   $organisation;
    protected DateTime $created;
    protected string   $state;
    protected ?string  $postalCode;
    protected float    $defaultVat;
    protected ?string  $subscriptionInvoicePrefix;
    
    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }
    
    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }
    
    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    
    /**
     * @return string|null
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }
    
    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }
    
    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }
    
    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }
    
    /**
     * @return float
     */
    public function getDefaultVat(): float
    {
        return $this->defaultVat;
    }
    
    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    
    /**
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }
    
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }
    
    /**
     * @return string|null
     */
    public function getLogo(): ?string
    {
        return $this->logo;
    }
    
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @return string
     */
    public function getOrganisation(): string
    {
        return $this->organisation;
    }
    
    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }
    
    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }
    
    /**
     * @return string|null
     */
    public function getSubscriptionInvoicePrefix(): ?string
    {
        return $this->subscriptionInvoicePrefix;
    }
    
    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }
    
    /**
     * @return string|null
     */
    public function getVat(): ?string
    {
        return $this->vat;
    }
    
    /**
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }
    
    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }
    
    /**
     * @param string $id
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @param DateTime $created
     */
    public function setCreated(DateTime $created): self
    {
        $this->created = $created;
        
        return $this;
    }
    
    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): self
    {
        $this->address = $address;
        
        return $this;
    }
    
    /**
     * @param string|null $address2
     */
    public function setAddress2(?string $address2): self
    {
        $this->address2 = $address2;
        
        return $this;
    }
    
    /**
     * @param string|null $city
     */
    public function setCity(?string $city): self
    {
        $this->city = $city;
        
        return $this;
    }
    
    /**
     * @param string $country
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;
        
        return $this;
    }
    
    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        
        return $this;
    }
    
    /**
     * @param float $defaultVat
     */
    public function setDefaultVat(float $defaultVat): self
    {
        $this->defaultVat = $defaultVat;
        
        return $this;
    }
    
    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
        
        return $this;
    }
    
    /**
     * @param string $handle
     */
    public function setHandle(string $handle): self
    {
        $this->handle = $handle;
        
        return $this;
    }
    
    /**
     * @param string $locale
     */
    public function setLocale(string $locale): self
    {
        $this->locale = $locale;
        
        return $this;
    }
    
    /**
     * @param string|null $logo
     */
    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;
        
        return $this;
    }
    
    /**
     * @param string $name
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * @param string $organisation
     */
    public function setOrganisation(string $organisation): self
    {
        $this->organisation = $organisation;
        
        return $this;
    }
    
    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;
        
        return $this;
    }
    
    /**
     * @param string|null $postalCode
     */
    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;
        
        return $this;
    }
    
    /**
     * @param string|null $subscriptionInvoicePrefix
     */
    public function setSubscriptionInvoicePrefix(?string $subscriptionInvoicePrefix): self
    {
        $this->subscriptionInvoicePrefix = $subscriptionInvoicePrefix;
        
        return $this;
    }
    
    /**
     * @param string $timezone
     */
    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;
        
        return $this;
    }
    
    /**
     * @param string|null $vat
     */
    public function setVat(?string $vat): self
    {
        $this->vat = $vat;
        
        return $this;
    }
    
    /**
     * @param string|null $website
     */
    public function setWebsite(?string $website): self
    {
        $this->website = $website;
        
        return $this;
    }
    
    /**
     * @throws Exception
     */
    public static function fromArray(array $response): self
    {
        $model = new self();
        
        $model
            ->setHandle($response['handle'])
            ->setCurrency($response['currency'])
            ->setName($response['name'])
            ->setLocale($response['locale'])
            ->setTimezone($response['timezone'])
            ->setCountry($response['country'])
            ->setId($response['id'])
            ->setOrganisation($response['organisation'])
            ->setCreated(new DateTime($response['created']))
            ->setDefaultVat($response['default_vat']);
        
        if (in_array($response['state'], StateAccountEnum::getAll(), true)) {
            $model->setState($response['state']);
        }
        
        if (isset($response['address'])) {
            $model->setAddress($response['address']);
        }
        
        if (isset($response['address2'])) {
            $model->setAddress2($response['address2']);
        }
        
        if (isset($response['city'])) {
            $model->setCity($response['city']);
        }
        
        if (isset($response['email'])) {
            $model->setEmail($response['email']);
        }
        
        if (isset($response['phone'])) {
            $model->setPhone($response['phone']);
        }
        
        if (isset($response['vat'])) {
            $model->setVat($response['vat']);
        }
        
        if (isset($response['website'])) {
            $model->setWebsite($response['website']);
        }
        
        if (isset($response['logo'])) {
            $model->setLogo($response['logo']);
        }
        
        if (isset($response['postal_code'])) {
            $model->setPostalCode($response['postal_code']);
        }
        
        if (isset($response['subscription_invoice_prefix'])) {
            $model->setSubscriptionInvoicePrefix($response['subscription_invoice_prefix']);
        }
        
        return $model;
    }
}
