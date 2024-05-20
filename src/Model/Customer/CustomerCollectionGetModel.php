<?php

namespace Billwerk\Sdk\Model\Customer;

use Billwerk\Sdk\Enum\RangeEnum;
use Billwerk\Sdk\Model\AbstractCollectionQueriesModel;
use Billwerk\Sdk\Model\HasRequestApiInterface;
use Exception;

class CustomerCollectionGetModel extends AbstractCollectionQueriesModel implements HasRequestApiInterface
{
    public const RANGES = [
        RangeEnum::CREATED,
    ];

    /**
     * Customer exact handle
     *
     * @var string|null $handle
     */
    protected ?string $handle = null;

    /**
     * Customer handle prefix
     *
     * @var string|null $handlePrefix
     */
    protected ?string $handlePrefix = null;

    /**
     * Customer handle contains
     *
     * @var string|null $handleContains
     */
    protected ?string $handleContains = null;

    /**
     * Search for name contained in first name concatenated with last name
     *
     * @var string|null $name
     */
    protected ?string $name = null;

    /**
     * Customer email
     *
     * @var string|null $email
     */
    protected ?string $email = null;

    /**
     * Customer email prefix
     *
     * @var string|null $emailPrefix
     */
    protected ?string $emailPrefix = null;

    /**
     * Contained in customer first name
     *
     * @var string|null $firstName
     */
    protected ?string $firstName = null;

    /**
     * Contained in customer last name
     *
     * @var string|null $lastName
     */
    protected ?string $lastName = null;

    /**
     * Contained in customer address
     *
     * @var string|null $address
     */
    protected ?string $address = null;

    /**
     * Contained in customer address2
     *
     * @var string|null $address2
     */
    protected ?string $address2 = null;

    /**
     * Contained in customer postal code
     *
     * @var string|null $postalCode
     */
    protected ?string $postalCode = null;

    /**
     * Contained in customer city
     *
     * @var string|null $city
     */
    protected ?string $city = null;

    /**
     * Customer country in ISO 3166-1 alpha-2
     *
     * @var string|null $country
     */
    protected ?string $country = null;

    /**
     * Contained in customer phone
     *
     * @var string|null $phone
     */
    protected ?string $phone = null;

    /**
     * Contained in customer company
     *
     * @var string|null $company
     */
    protected ?string $company = null;

    /**
     * Contained in customer vat code
     *
     * @var string|null $vat
     */
    protected ?string $vat = null;

    /**
     * @var int|null $debtorId
     */
    protected ?int $debtorId = null;

    /**
     * @return string|null
     */
    public function getHandle(): ?string
    {
        return $this->handle;
    }

    /**
     * @return string|null
     */
    public function getHandlePrefix(): ?string
    {
        return $this->handlePrefix;
    }

    /**
     * @return string|null
     */
    public function getHandleContains(): ?string
    {
        return $this->handleContains;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getEmailPrefix(): ?string
    {
        return $this->emailPrefix;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
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
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
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
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @return string|null
     */
    public function getVat(): ?string
    {
        return $this->vat;
    }

    /**
     * @return int|null
     */
    public function getDebtorId(): ?int
    {
        return $this->debtorId;
    }

    /**
     * @param string|null $handle
     *
     * @return self
     */
    public function setHandle(?string $handle): self
    {
        $this->handle = $handle;

        return $this;
    }

    /**
     * @param string|null $handlePrefix
     *
     * @return self
     */
    public function setHandlePrefix(?string $handlePrefix): self
    {
        $this->handlePrefix = $handlePrefix;

        return $this;
    }

    /**
     * @param string|null $handleContains
     *
     * @return self
     */
    public function setHandleContains(?string $handleContains): self
    {
        $this->handleContains = $handleContains;

        return $this;
    }

    /**
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param string|null $emailPrefix
     *
     * @return self
     */
    public function setEmailPrefix(?string $emailPrefix): self
    {
        $this->emailPrefix = $emailPrefix;

        return $this;
    }

    /**
     * @param string|null $firstName
     *
     * @return self
     */
    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @param string|null $lastName
     *
     * @return self
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @param string|null $address
     *
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @param string|null $address2
     *
     * @return self
     */
    public function setAddress2(?string $address2): self
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * @param string|null $postalCode
     *
     * @return self
     */
    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @param string|null $city
     *
     * @return self
     */
    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @param string|null $country
     *
     * @return self
     */
    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @param string|null $phone
     *
     * @return self
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @param string|null $company
     *
     * @return self
     */
    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @param string|null $vat
     *
     * @return self
     */
    public function setVat(?string $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * @param int|null $debtorId
     *
     * @return self
     */
    public function setDebtorId(?int $debtorId): self
    {
        $this->debtorId = $debtorId;

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
        $model = new static();

        $model->fromArrayDefault($response);

        if (isset($response['handle'])) {
            $model->setHandle($response['handle']);
        }

        if (isset($response['handle_prefix'])) {
            $model->setHandlePrefix($response['handle_prefix']);
        }

        if (isset($response['handle_contains'])) {
            $model->setHandleContains($response['handle_contains']);
        }

        if (isset($response['name'])) {
            $model->setName($response['name']);
        }

        if (isset($response['email'])) {
            $model->setEmail($response['email']);
        }

        if (isset($response['email_prefix'])) {
            $model->setEmailPrefix($response['email_prefix']);
        }

        if (isset($response['first_name'])) {
            $model->setFirstName($response['first_name']);
        }

        if (isset($response['last_name'])) {
            $model->setLastName($response['last_name']);
        }

        if (isset($response['address'])) {
            $model->setAddress($response['address']);
        }

        if (isset($response['address2'])) {
            $model->setAddress2($response['address2']);
        }

        if (isset($response['postal_code'])) {
            $model->setPostalCode($response['postal_code']);
        }

        if (isset($response['city'])) {
            $model->setCity($response['city']);
        }

        if (isset($response['country'])) {
            $model->setCountry($response['country']);
        }

        if (isset($response['phone'])) {
            $model->setPhone($response['phone']);
        }

        if (isset($response['company'])) {
            $model->setCompany($response['company']);
        }

        if (isset($response['vat'])) {
            $model->setVat($response['vat']);
        }

        if (isset($response['debtor_id'])) {
            $model->setDebtorId($response['debtor_id']);
        }

        return $model;
    }

    public function toApi(): array
    {
        $result = $this->toApiDefault();

        if ( ! is_null($this->getHandle())) {
            $result['handle'] = $this->getHandle();
        }

        if ( ! is_null($this->getHandlePrefix())) {
            $result['handle_prefix'] = $this->getHandlePrefix();
        }

        if ( ! is_null($this->getHandleContains())) {
            $result['handle_contains'] = $this->getHandleContains();
        }

        if ( ! is_null($this->getName())) {
            $result['name'] = $this->getName();
        }

        if ( ! is_null($this->getEmail())) {
            $result['email'] = $this->getEmail();
        }

        if ( ! is_null($this->getEmailPrefix())) {
            $result['email_prefix'] = $this->getEmailPrefix();
        }

        if ( ! is_null($this->getFirstName())) {
            $result['first_name'] = $this->getFirstName();
        }

        if ( ! is_null($this->getLastName())) {
            $result['last_name'] = $this->getLastName();
        }

        if ( ! is_null($this->getAddress())) {
            $result['address'] = $this->getAddress();
        }

        if ( ! is_null($this->getAddress2())) {
            $result['address2'] = $this->getAddress2();
        }

        if ( ! is_null($this->getPostalCode())) {
            $result['postal_code'] = $this->getPostalCode();
        }

        if ( ! is_null($this->getCity())) {
            $result['city'] = $this->getCity();
        }

        if ( ! is_null($this->getCountry())) {
            $result['country'] = $this->getCountry();
        }

        if ( ! is_null($this->getPhone())) {
            $result['phone'] = $this->getPhone();
        }

        if ( ! is_null($this->getCompany())) {
            $result['company'] = $this->getCompany();
        }

        if ( ! is_null($this->getVat())) {
            $result['vat'] = $this->getVat();
        }

        if ( ! is_null($this->getDebtorId())) {
            $result['debtor_id'] = $this->getDebtorId();
        }

        return $result;
    }
}
