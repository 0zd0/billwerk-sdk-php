<?php

namespace Billwerk\Sdk\Model;

class AccountFundingInformationModel extends AbstractModel implements HasRequestApiInterface
{
    /**
     * The sender’s account number, i.e. an identification of the account being funded by the debit.
     * It can be an IBAN, a proprietary wallet number, a prepaid PAN, etc
     *
     * @var string|null $senderAccountNumber
     */
    protected ?string $senderAccountNumber = null;

    /**
     * Sender's reference number. You must be able to uniquely identify the sender using this number.
     * Required if the merchant account’s Business Application Identifier (BAI) is Funds Disbursement (FD)
     *
     * @var string|null $senderReference
     */
    protected ?string $senderReference = null;

    /**
     * Sender’s first name. Required only if 'sender_address' is provided
     *
     * @var string|null $senderFirstName
     */
    protected ?string $senderFirstName = null;

    /**
     * Sender’s last name. Required only if 'sender_address' is provided
     *
     * @var string|null $senderLastName
     */
    protected ?string $senderLastName = null;

    /**
     * Sender’s address (street name, house number, etc.)
     *
     * @var string|null $senderAddress
     */
    protected ?string $senderAddress = null;

    /**
     * Sender’s city
     *
     * @var string|null $senderCity
     */
    protected ?string $senderCity = null;

    /**
     * Sender’s postal code
     *
     * @var string|null $senderPostalCode
     */
    protected ?string $senderPostalCode = null;

    /**
     * Sender’s state. Required for countries US and CA
     *
     * @var string|null $senderState
     */
    protected ?string $senderState = null;

    /**
     * Sender’s country in ISO 3166-1 alpha-2
     *
     * @var string|null $senderCountry
     */
    protected ?string $senderCountry = null;

    /**
     * Sender’s date of birth in format yyyy-MM-dd
     *
     * @var string|null $senderDateOfBirth
     */
    protected ?string $senderDateOfBirth = null;

    /**
     * @return string|null
     */
    public function getSenderAccountNumber(): ?string
    {
        return $this->senderAccountNumber;
    }

    /**
     * @return string|null
     */
    public function getSenderAddress(): ?string
    {
        return $this->senderAddress;
    }

    /**
     * @return string|null
     */
    public function getSenderCity(): ?string
    {
        return $this->senderCity;
    }

    /**
     * @return string|null
     */
    public function getSenderCountry(): ?string
    {
        return $this->senderCountry;
    }

    /**
     * @return string|null
     */
    public function getSenderDateOfBirth(): ?string
    {
        return $this->senderDateOfBirth;
    }

    /**
     * @return string|null
     */
    public function getSenderFirstName(): ?string
    {
        return $this->senderFirstName;
    }

    /**
     * @return string|null
     */
    public function getSenderLastName(): ?string
    {
        return $this->senderLastName;
    }

    /**
     * @return string|null
     */
    public function getSenderPostalCode(): ?string
    {
        return $this->senderPostalCode;
    }

    /**
     * @return string|null
     */
    public function getSenderReference(): ?string
    {
        return $this->senderReference;
    }

    /**
     * @return string|null
     */
    public function getSenderState(): ?string
    {
        return $this->senderState;
    }

    /**
     * @param string|null $senderAccountNumber
     *
     * @return self
     */
    public function setSenderAccountNumber(?string $senderAccountNumber): self
    {
        $this->senderAccountNumber = $senderAccountNumber;

        return $this;
    }

    /**
     * @param string|null $senderAddress
     *
     * @return self
     */
    public function setSenderAddress(?string $senderAddress): self
    {
        $this->senderAddress = $senderAddress;

        return $this;
    }

    /**
     * @param string|null $senderCity
     *
     * @return self
     */
    public function setSenderCity(?string $senderCity): self
    {
        $this->senderCity = $senderCity;

        return $this;
    }

    /**
     * @param string|null $senderCountry
     *
     * @return self
     */
    public function setSenderCountry(?string $senderCountry): self
    {
        $this->senderCountry = $senderCountry;

        return $this;
    }

    /**
     * @param string|null $senderDateOfBirth
     *
     * @return self
     */
    public function setSenderDateOfBirth(?string $senderDateOfBirth): self
    {
        $this->senderDateOfBirth = $senderDateOfBirth;

        return $this;
    }

    /**
     * @param string|null $senderFirstName
     *
     * @return self
     */
    public function setSenderFirstName(?string $senderFirstName): self
    {
        $this->senderFirstName = $senderFirstName;

        return $this;
    }

    /**
     * @param string|null $senderLastName
     *
     * @return self
     */
    public function setSenderLastName(?string $senderLastName): self
    {
        $this->senderLastName = $senderLastName;

        return $this;
    }

    /**
     * @param string|null $senderPostalCode
     *
     * @return self
     */
    public function setSenderPostalCode(?string $senderPostalCode): self
    {
        $this->senderPostalCode = $senderPostalCode;

        return $this;
    }

    /**
     * @param string|null $senderReference
     *
     * @return self
     */
    public function setSenderReference(?string $senderReference): self
    {
        $this->senderReference = $senderReference;

        return $this;
    }

    /**
     * @param string|null $senderState
     *
     * @return self
     */
    public function setSenderState(?string $senderState): self
    {
        $this->senderState = $senderState;

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

        if (isset($response['sender_account_number'])) {
            $model->setSenderAccountNumber($response['sender_account_number']);
        }

        if (isset($response['sender_reference'])) {
            $model->setSenderReference($response['sender_reference']);
        }

        if (isset($response['sender_first_name'])) {
            $model->setSenderFirstName($response['sender_first_name']);
        }

        if (isset($response['sender_last_name'])) {
            $model->setSenderLastName($response['sender_last_name']);
        }

        if (isset($response['sender_address'])) {
            $model->setSenderAddress($response['sender_address']);
        }

        if (isset($response['sender_city'])) {
            $model->setSenderCity($response['sender_city']);
        }

        if (isset($response['sender_postal_code'])) {
            $model->setSenderPostalCode($response['sender_postal_code']);
        }

        if (isset($response['sender_state'])) {
            $model->setSenderState($response['sender_state']);
        }

        if (isset($response['sender_country'])) {
            $model->setSenderCountry($response['sender_country']);
        }

        if (isset($response['sender_date_of_birth'])) {
            $model->setSenderDateOfBirth($response['sender_date_of_birth']);
        }

        return $model;
    }

    public function toApi(): array
    {
        $result = [];

        if ( ! is_null($this->getSenderAccountNumber())) {
            $result['sender_account_number'] = $this->getSenderAccountNumber();
        }

        if ( ! is_null($this->getSenderReference())) {
            $result['sender_reference'] = $this->getSenderReference();
        }

        if ( ! is_null($this->getSenderFirstName())) {
            $result['sender_first_name'] = $this->getSenderFirstName();
        }

        if ( ! is_null($this->getSenderLastName())) {
            $result['sender_last_name'] = $this->getSenderLastName();
        }

        if ( ! is_null($this->getSenderAddress())) {
            $result['sender_address'] = $this->getSenderAddress();
        }

        if ( ! is_null($this->getSenderCity())) {
            $result['sender_city'] = $this->getSenderCity();
        }

        if ( ! is_null($this->getSenderPostalCode())) {
            $result['sender_postal_code'] = $this->getSenderPostalCode();
        }

        if ( ! is_null($this->getSenderState())) {
            $result['sender_state'] = $this->getSenderState();
        }

        if ( ! is_null($this->getSenderCountry())) {
            $result['sender_country'] = $this->getSenderCountry();
        }

        if ( ! is_null($this->getSenderDateOfBirth())) {
            $result['sender_date_of_birth'] = $this->getSenderDateOfBirth();
        }

        return $result;
    }
}
