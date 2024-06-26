<?php

namespace Billwerk\Sdk\Model;

class AddressModel extends AbstractModel implements HasRequestApiInterface
{
    /**
     * Company name
     *
     * @var string|null $company
     */
    protected ?string $company = null;

    /**
     * Company vat number
     *
     * @var string|null $vat
     */
    protected ?string $vat = null;

    /**
     * Attention
     *
     * @var string|null $attention
     */
    protected ?string $attention = null;

    /**
     * Address line 1
     *
     * @var string|null $address
     */
    protected ?string $address = null;

    /**
     * Address line 2
     *
     * @var string|null $address2
     */
    protected ?string $address2 = null;

    /**
     * City
     *
     * @var string|null $city
     */
    protected ?string $city = null;

    /**
     * Country in ISO 3166-1 alpha-2
     *
     * @var string|null $country
     */
    protected ?string $country = null;

    /**
     * Email
     *
     * @var string|null $email
     */
    protected ?string $email = null;

    /**
     * Phone number
     *
     * @var string|null $phone
     */
    protected ?string $phone = null;

    /**
     * First name
     *
     * @var string|null $firstName
     */
    protected ?string $firstName = null;

    /**
     * Last name
     *
     * @var string|null $lastName
     */
    protected ?string $lastName = null;

    /**
     * Postal code
     *
     * @var string|null $postalCode
     */
    protected ?string $postalCode = null;

    /**
     * State or province. Should be in country subdivision code defined in ISO 3166-2
     *
     * @var string|null $stateOrProvince
     */
    protected ?string $stateOrProvince = null;

    /**
     * Company vat number
     *
     * @return string|null
     */
    public function getVat(): ?string
    {
        return $this->vat;
    }

    /**
     * Postal code
     *
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * Phone number
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * Email
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Country in ISO 3166-1 alpha-2
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Address line 2
     *
     * @return string|null
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    /**
     * Address line 1
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * City
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Attention
     *
     * @return string|null
     */
    public function getAttention(): ?string
    {
        return $this->attention;
    }

    /**
     * Company name
     *
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * First name
     *
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Last name
     *
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * State or province. Should be in country subdivision code defined in ISO 3166-2
     *
     * @return string|null
     */
    public function getStateOrProvince(): ?string
    {
        return $this->stateOrProvince;
    }

    /**
     * Company vat number
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
     * Postal code
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
     * Phone number
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
     * Email
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
     * Country in ISO 3166-1 alpha-2
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
     * City
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
     * Address line 2
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
     * Address line 1
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
     * Attention
     *
     * @param string|null $attention
     *
     * @return self
     */
    public function setAttention(?string $attention): self
    {
        $this->attention = $attention;

        return $this;
    }

    /**
     * Company name
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
     * First name
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
     * Last name
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
     * State or province. Should be in country subdivision code defined in ISO 3166-2
     *
     * @param string|null $stateOrProvince
     *
     * @return self
     */
    public function setStateOrProvince(?string $stateOrProvince): self
    {
        $this->stateOrProvince = $stateOrProvince;

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

        if (isset($response['company'])) {
            $model->setCompany($response['company']);
        }

        if (isset($response['vat'])) {
            $model->setVat($response['vat']);
        }

        if (isset($response['attention'])) {
            $model->setAttention($response['attention']);
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

        if (isset($response['email'])) {
            $model->setEmail($response['email']);
        }

        if (isset($response['phone'])) {
            $model->setPhone($response['phone']);
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

        if (isset($response['state_or_province'])) {
            $model->setStateOrProvince($response['state_or_province']);
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
            'company' => $this->getCompany(),
            'vat' => $this->getVat(),
            'attention' => $this->getAttention(),
            'address' => $this->getAddress(),
            'address2' => $this->getAddress2(),
            'city' => $this->getCity(),
            'country' => $this->getCountry(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'postal_code' => $this->getPostalCode(),
            'state_or_province' => $this->getStateOrProvince(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
