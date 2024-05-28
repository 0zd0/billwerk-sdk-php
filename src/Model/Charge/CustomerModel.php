<?php

namespace Billwerk\Sdk\Model\Charge;

use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasRequestApiInterface;
use Billwerk\Sdk\Model\MetaDataModel;

class CustomerModel extends AbstractModel implements HasRequestApiInterface
{
    /**
     * Customer email. Validated against RFC 822
     *
     * @var string|null $email
     */
    protected ?string $email = null;

    /**
     * Customer address
     *
     * @var string|null $address
     */
    protected ?string $address = null;

    /**
     * Customer address2
     *
     * @var string|null $address2
     */
    protected ?string $address2 = null;

    /**
     * Customer city
     *
     * @var string|null $city
     */
    protected ?string $city = null;

    /**
     * Customer country in ISO 3166-1 alpha-2. E.g. US
     *
     * @var string|null $country
     */
    protected ?string $country = null;

    /**
     * Customer phone number
     *
     * @var string|null $phone
     */
    protected ?string $phone = null;

    /**
     * Customer company
     *
     * @var string|null $company
     */
    protected ?string $company = null;

    /**
     * Customer vat number
     *
     * @var string|null $vat
     */
    protected ?string $vat = null;

    /**
     * Customer language
     *
     * @var string|null $language
     */
    protected ?string $language = null;

    /**
     * Per account unique handle for the customer. Max length 255 with allowable characters [a-zA-Z0-9_.-@].
     * Must be provided if generate_handle is not defined
     *
     * @var string|null $handle
     */
    protected ?string $handle = null;

    /**
     * Test flag
     *
     * @var bool|null $test
     */
    protected ?bool $test = null;

    /**
     * Custom metadata
     *
     * @var MetaDataModel[]|null $metadata
     */
    protected ?array $metadata = null;

    /**
     * Customer first name
     *
     * @var string|null $firstName
     */
    protected ?string $firstName = null;

    /**
     * Customer last name
     *
     * @var string|null $lastName
     */
    protected ?string $lastName = null;

    /**
     * Customer postal code
     *
     * @var string|null $postalCode
     */
    protected ?string $postalCode = null;

    /**
     * Debtor identifier for this customer. If set this is unique and cannot be changed anymore
     *
     * @var int|null $debtorId
     */
    protected ?int $debtorId = null;

    /**
     * Auto generate handle on the form cust-[sequence_number]
     *
     * @var bool|null $generateHandle
     */
    protected ?bool $generateHandle = null;

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
    public function getVat(): ?string
    {
        return $this->vat;
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
    public function getPhone(): ?string
    {
        return $this->phone;
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
    public function getCity(): ?string
    {
        return $this->city;
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
    public function getAddress2(): ?string
    {
        return $this->address2;
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
    public function getLastName(): ?string
    {
        return $this->lastName;
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
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return int|null
     */
    public function getDebtorId(): ?int
    {
        return $this->debtorId;
    }

    /**
     * @return bool|null
     */
    public function getTest(): ?bool
    {
        return $this->test;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @return bool|null
     */
    public function getGenerateHandle(): ?bool
    {
        return $this->generateHandle;
    }

    /**
     * @return MetaDataModel[]|null
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param bool|null $generateHandle
     *
     * @return self
     */
    public function setGenerateHandle(?bool $generateHandle): self
    {
        $this->generateHandle = $generateHandle;

        return $this;
    }

    /**
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
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
     * @param bool|null $test
     *
     * @return self
     */
    public function setTest(?bool $test): self
    {
        $this->test = $test;

        return $this;
    }

    /**
     * @param MetaDataModel[]|null $metadata
     *
     * @return self
     */
    public function setMetadata(?array $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        if (isset($response['email'])) {
            $model->setEmail($response['email']);
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

        if (isset($response['language'])) {
            $model->setLanguage($response['language']);
        }

        if (isset($response['handle'])) {
            $model->setHandle($response['handle']);
        }

        if (isset($response['test'])) {
            $model->setTest($response['test']);
        }

        if (isset($response['metadata'])) {
            $metadata = [];
            foreach ($response['metadata'] as $key => $object) {
                $metadata[] = MetaDataModel::fromObject($key, $object);
            }
            $model->setMetadata($metadata);
        }

        if (isset($response['first_name'])) {
            $model->setFirstName($response['first_name']);
        }

        if (isset($response['last_name'])) {
            $model->setLastName($response['last_name']);
        }

        if (isset($response['postal_code'])) {
            $model->setPostalCode($response['postal_code']);
        }

        if (isset($response['debtor_id'])) {
            $model->setDebtorId($response['debtor_id']);
        }

        if (isset($response['generate_handle'])) {
            $model->setGenerateHandle($response['generate_handle']);
        }

        return $model;
    }

    public function toApi(): array
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        return array_filter([
            'email' => $this->getEmail(),
            'address' => $this->getAddress(),
            'address2' => $this->getAddress2(),
            'city' => $this->getCity(),
            'country' => $this->getCountry(),
            'phone' => $this->getPhone(),
            'company' => $this->getCompany(),
            'vat' => $this->getVat(),
            'language' => $this->getLanguage(),
            'handle' => $this->getHandle(),
            'test' => $this->getTest(),
            'metadata' => $this->getMetadata() ? MetaDataModel::fromObjects($this->getMetadata()) : null,
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'postal_code' => $this->getPostalCode(),
            'debtor_id' => $this->getDebtorId(),
            'generate_handle' => $this->getGenerateHandle(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
