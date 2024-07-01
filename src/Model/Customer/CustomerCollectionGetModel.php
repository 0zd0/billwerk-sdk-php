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
     * Contained in customer debtor id
     *
     * @var int|null $debtorId
     */
    protected ?int $debtorId = null;

    /**
     * Customer exact handle
     *
     * @return string|null
     */
    public function getHandle(): ?string
    {
        return $this->handle;
    }

    /**
     * Customer handle prefix
     *
     * @return string|null
     */
    public function getHandlePrefix(): ?string
    {
        return $this->handlePrefix;
    }

    /**
     * Customer handle contains
     *
     * @return string|null
     */
    public function getHandleContains(): ?string
    {
        return $this->handleContains;
    }

    /**
     * Search for name contained in first name concatenated with last name
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Customer email
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Customer email prefix
     *
     * @return string|null
     */
    public function getEmailPrefix(): ?string
    {
        return $this->emailPrefix;
    }

    /**
     * Contained in customer first name
     *
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Contained in customer last name
     *
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Contained in customer address
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Contained in customer address2
     *
     * @return string|null
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    /**
     * Contained in customer postal code
     *
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * Contained in customer city
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Customer country in ISO 3166-1 alpha-2
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Contained in customer phone
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * Contained in customer company
     *
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * Contained in customer vat code
     *
     * @return string|null
     */
    public function getVat(): ?string
    {
        return $this->vat;
    }

    /**
     * Contained in customer debtor id
     *
     * @return int|null
     */
    public function getDebtorId(): ?int
    {
        return $this->debtorId;
    }

    /**
     * Customer exact handle
     *
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
     * Customer handle prefix
     *
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
     * Customer handle contains
     *
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
     * Search for name contained in first name concatenated with last name
     *
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
     * Customer email
     *
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
     * Customer email prefix
     *
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
     * Contained in customer first name
     *
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
     * Contained in customer last name
     *
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
     * Contained in customer address
     *
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
     * Contained in customer address2
     *
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
     * Contained in customer postal code
     *
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
     * Contained in customer city
     *
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
     * Customer country in ISO 3166-1 alpha-2
     *
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
     * Contained in customer phone
     *
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
     * Contained in customer company
     *
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
     * Contained in customer vat code
     *
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
     * Contained in customer debtor id
     *
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

    public function toArray(): array
    {
        return array_filter(array_merge($this->toArrayDefault(), [
            'handle' => $this->getHandle(),
            'handle_prefix' => $this->getHandlePrefix(),
            'handle_contains' => $this->getHandleContains(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'email_prefix' => $this->getEmailPrefix(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'address' => $this->getAddress(),
            'address2' => $this->getAddress2(),
            'postal_code' => $this->getPostalCode(),
            'city' => $this->getCity(),
            'country' => $this->getCountry(),
            'phone' => $this->getPhone(),
            'company' => $this->getCompany(),
            'vat' => $this->getVat(),
            'debtor_id' => $this->getDebtorId(),
        ]), function ($value) {
            return $value !== null;
        });
    }

    public function toApi(): array
    {
        return $this->toArray();
    }
}
