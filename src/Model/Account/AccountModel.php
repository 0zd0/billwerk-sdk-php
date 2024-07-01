<?php

namespace Billwerk\Sdk\Model\Account;

use Billwerk\Sdk\Enum\AccountStateEnum;
use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasIdInterface;
use DateTime;
use Exception;

/**
 * Account
 *
 * @see https://optimize-docs.billwerk.com/reference/getcurrentaccount
 *
 * @package Billwerk\Sdk\Model
 */
class AccountModel extends AbstractModel implements HasIdInterface
{
    /**
     * Per organisation unique handle for the account
     *
     * @var string $handle
     */
    protected string $handle;

    /**
     * Currency for the account in ISO 4217 three letter alpha code
     *
     * @var string $currency
     */
    protected string $currency;

    /**
     * Account name
     *
     * @var string $name
     */
    protected string $name;

    /**
     * Account address
     *
     * @var string|null $address
     */
    protected ?string $address = null;

    /**
     * Account address2
     *
     * @var string|null $address2
     */
    protected ?string $address2 = null;

    /**
     * Account city
     *
     * @var string|null $city
     */
    protected ?string $city = null;

    /**
     * Account locale on the form 'language_country'. E.g. da_DK. Most major locales are supported
     *
     * @var string $locale
     */
    protected string $locale;

    /**
     * Account time zone ID as abbreviation or full name. E.g 'UTC' or 'Europe/Copenhagen'. See Wikipedia
     *
     * @var string $timezone
     */
    protected string $timezone;

    /**
     * Account country in ISO 3166-1 alpha-2. E.g. DK
     *
     * @var string $country
     */
    protected string $country;

    /**
     * Account email
     *
     * @var string|null $email
     */
    protected ?string $email = null;

    /**
     * Account phone
     *
     * @var string|null $phone
     */
    protected ?string $phone = null;

    /**
     * Account vat number
     *
     * @var string|null $vat
     */
    protected ?string $vat = null;

    /**
     * Account website
     *
     * @var string|null $website
     */
    protected ?string $website = null;

    /**
     * Account logo url
     *
     * @var string|null $logo
     */
    protected ?string $logo = null;

    /**
     * Account id assigned by Reepay
     *
     * @var string $id
     */
    protected string $id;

    /**
     * Organisation by subdomain
     *
     * @var string $organisation
     */
    protected string $organisation;

    /**
     * Date when the account was created. In ISO-8601 extended offset date-time format
     *
     * @var DateTime $created
     */
    protected DateTime $created;

    /**
     * Status of the account one of the following test, live, closed
     *
     * @var string $state
     */
    protected string $state;

    /**
     * Account postal code
     *
     * @var string|null $postalCode
     */
    protected ?string $postalCode = null;

    /**
     * Vat to use as default for account
     *
     * @var float $defaultVat
     */
    protected float $defaultVat;

    /**
     * Subscription invoice prefix
     *
     * @var string|null $subscriptionInvoicePrefix
     */
    protected ?string $subscriptionInvoicePrefix = null;

    /**
     * Status of the account one of the following test, live, closed
     *
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * Date when the account was created. In ISO-8601 extended offset date-time format
     *
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * Account address
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Account address2
     *
     * @return string|null
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    /**
     * Account city
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Account country in ISO 3166-1 alpha-2. E.g. DK
     *
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * Currency for the account in ISO 4217 three letter alpha code
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Vat to use as default for account
     *
     * @return float
     */
    public function getDefaultVat(): float
    {
        return $this->defaultVat;
    }

    /**
     * Account email
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     *  Per organisation unique handle for the account
     *
 * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * Account id assigned by Reepay
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Account locale on the form 'language_country'. E.g. da_DK. Most major locales are supported
     *
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * Account logo url
     *
     * @return string|null
     */
    public function getLogo(): ?string
    {
        return $this->logo;
    }

    /**
     * Account name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     *  Organisation by subdomain
 *
     * @return string
     */
    public function getOrganisation(): string
    {
        return $this->organisation;
    }

    /**
     * Account phone
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * Account postal code
     *
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * Subscription invoice prefix
     *
     * @return string|null
     */
    public function getSubscriptionInvoicePrefix(): ?string
    {
        return $this->subscriptionInvoicePrefix;
    }

    /**
     * Account time zone ID as abbreviation or full name. E.g 'UTC' or 'Europe/Copenhagen'. See Wikipedia
     *
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * Account vat number
     *
     * @return string|null
     */
    public function getVat(): ?string
    {
        return $this->vat;
    }

    /**
     * Account website
     *
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * Status of the account one of the following test, live, closed
     *
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * Account id assigned by Reepay
     *
     * @param string $id
     *
     * @return AccountModel
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Date when the account was created. In ISO-8601 extended offset date-time format
     *
     * @param DateTime $created
     *
     * @return AccountModel
     */
    public function setCreated(DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Account address
     *
     * @param string|null $address
     *
     * @return AccountModel
     */
    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Account address2
     *
     * @param string|null $address2
     *
     * @return AccountModel
     */
    public function setAddress2(?string $address2): self
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Account city
     *
     * @param string|null $city
     *
     * @return AccountModel
     */
    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Account country in ISO 3166-1 alpha-2. E.g. DK
     *
     * @param string $country
     *
     * @return AccountModel
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Currency for the account in ISO 4217 three letter alpha code
     *
     * @param string $currency
     *
     * @return AccountModel
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Vat to use as default for account
     *
     * @param float $defaultVat
     *
     * @return AccountModel
     */
    public function setDefaultVat(float $defaultVat): self
    {
        $this->defaultVat = $defaultVat;

        return $this;
    }

    /**
     * Account email
     *
     * @param string|null $email
     *
     * @return AccountModel
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Per organisation unique handle for the account
     *
     * @param string $handle
     *
     * @return AccountModel
     */
    public function setHandle(string $handle): self
    {
        $this->handle = $handle;

        return $this;
    }

    /**
     * Account locale on the form 'language_country'. E.g. da_DK. Most major locales are supported
     *
     * @param string $locale
     *
     * @return AccountModel
     */
    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Account logo url
     *
     * @param string|null $logo
     *
     * @return AccountModel
     */
    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Account name
     *
     * @param string $name
     *
     * @return AccountModel
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     *  Organisation by subdomain
     *
     * @param string $organisation
     *
     * @return AccountModel
     */
    public function setOrganisation(string $organisation): self
    {
        $this->organisation = $organisation;

        return $this;
    }

    /**
     * Account phone
     *
     * @param string|null $phone
     *
     * @return AccountModel
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Account postal code
     *
     * @param string|null $postalCode
     *
     * @return AccountModel
     */
    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Subscription invoice prefix
     *
     * @param string|null $subscriptionInvoicePrefix
     *
     * @return AccountModel
     */
    public function setSubscriptionInvoicePrefix(?string $subscriptionInvoicePrefix): self
    {
        $this->subscriptionInvoicePrefix = $subscriptionInvoicePrefix;

        return $this;
    }

    /**
     * Account time zone ID as abbreviation or full name. E.g 'UTC' or 'Europe/Copenhagen'. See Wikipedia
     *
     * @param string $timezone
     *
     * @return AccountModel
     */
    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Account vat number
     *
     * @param string|null $vat
     *
     * @return AccountModel
     */
    public function setVat(?string $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * Account website
     *
     * @param string|null $website
     *
     * @return AccountModel
     */
    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @param array $response
     *
     * @return self
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

        if (in_array($response['state'], AccountStateEnum::getAll(), true)) {
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

    public function toArray(): array
    {
        $data = [
            'handle' => $this->getHandle(),
            'currency' => $this->getCurrency(),
            'name' => $this->getName(),
            'locale' => $this->getLocale(),
            'timezone' => $this->getTimezone(),
            'country' => $this->getCountry(),
            'id' => $this->getId(),
            'organisation' => $this->getOrganisation(),
            'created' => $this->getCreated() ? $this->getCreated()->format('Y-m-d\TH:i:s.v') : null,
            'default_vat' => $this->getDefaultVat(),
            'state' => $this->getState(),
            'address' => $this->getAddress(),
            'address2' => $this->getAddress2(),
            'city' => $this->getCity(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'vat' => $this->getVat(),
            'website' => $this->getWebsite(),
            'logo' => $this->getLogo(),
            'postal_code' => $this->getPostalCode(),
            'subscription_invoice_prefix' => $this->getSubscriptionInvoicePrefix(),
        ];

        return array_filter($data, function ($value) {
            return $value !== null;
        });
    }
}
