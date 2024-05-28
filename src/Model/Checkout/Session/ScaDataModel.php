<?php

namespace Billwerk\Sdk\Model\Checkout\Session;

use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasRequestApiInterface;

class ScaDataModel extends AbstractModel implements HasRequestApiInterface
{
    /**
     * Cardholder Name. If not provided information will be taken from customer or invoice addresses
     *
     * @var string|null $name
     */
    protected ?string $name = null;

    /**
     * Cardholder Email. If not provided information will be taken from customer or invoice addresses.
     * Must be RFC5322 compliant
     *
     * @var string|null $email
     */
    protected ?string $email = null;

    /**
     * ITU-E.164 phone number. See https://en.wikipedia.org/wiki/E.164
     *
     * @var PhoneModel|null $homePhone
     */
    protected ?PhoneModel $homePhone = null;

    /**
     * ITU-E.164 phone number. See https://en.wikipedia.org/wiki/E.164
     *
     * @var PhoneModel|null $mobilePhone
     */
    protected ?PhoneModel $mobilePhone = null;

    /**
     * ITU-E.164 phone number. See https://en.wikipedia.org/wiki/E.164
     *
     * @var PhoneModel|null $workPhone
     */
    protected ?PhoneModel $workPhone = null;

    /**
     * Cardholder Billing Address. If not provided it will be taken from invoice billing address or customer
     *
     * @var AddressModel|null $billingAddress
     */
    protected ?AddressModel $billingAddress = null;

    /**
     * Cardholder Shipping Address. If not provided it will be taken from invoice shipping address or customer
     *
     * @var AddressModel|null $shippingAddress
     */
    protected ?AddressModel $shippingAddress = null;

    /**
     * Indicate if Shipping Address and Billing Address are the same
     *
     * @var bool|null
     *
     */
    protected ?bool $addressMatch = null;

    /**
     * Cardholder Account Identifier. Customer id from own system. If not provided customer handle will be used
     *
     * @var string|null $accountId
     */
    protected ?string $accountId = null;

    /**
     * Optional argument to control whether the cardholder should be posed with a challenge instead of a potential
     * frictionless authentication flow. This could e.g. be used the first time a new customer makes a purchase to
     * make sure they are strongly authenticated. Two values can be used: preference - cardholder should be given
     * a challenge if issuer supports challenges, mandate - cardholder must be given a challenge and the
     * authentication should be declined if the issuer does not support challenges
     *
     * @see ChallengeIndicatorEnum
     * @var string|null $challengeIndicator
     */
    protected ?string $challengeIndicator = null;

    /**
     * Optional argument to help the issuer in determining whether to use a frictionless authentication flow.
     * The object represents the assessed level of fraud risk
     *
     * @var RiskIndicatorModel|null $riskIndicator
     */
    protected ?RiskIndicatorModel $riskIndicator = null;

    /**
     * Optional additional information about the Cardholder’s account
     *
     * @var AccountInfoModel|null $accountInfo
     */
    protected ?AccountInfoModel $accountInfo = null;

    /**
     * @return AddressModel|null
     */
    public function getBillingAddress(): ?AddressModel
    {
        return $this->billingAddress;
    }

    /**
     * @return AddressModel|null
     */
    public function getShippingAddress(): ?AddressModel
    {
        return $this->shippingAddress;
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getAccountId(): ?string
    {
        return $this->accountId;
    }

    /**
     * @return AccountInfoModel|null
     */
    public function getAccountInfo(): ?AccountInfoModel
    {
        return $this->accountInfo;
    }

    /**
     * @return bool|null
     */
    public function getAddressMatch(): ?bool
    {
        return $this->addressMatch;
    }

    /**
     * @return string|null
     */
    public function getChallengeIndicator(): ?string
    {
        return $this->challengeIndicator;
    }

    /**
     * @return PhoneModel|null
     */
    public function getHomePhone(): ?PhoneModel
    {
        return $this->homePhone;
    }

    /**
     * @return PhoneModel|null
     */
    public function getMobilePhone(): ?PhoneModel
    {
        return $this->mobilePhone;
    }

    /**
     * @return RiskIndicatorModel|null
     */
    public function getRiskIndicator(): ?RiskIndicatorModel
    {
        return $this->riskIndicator;
    }

    /**
     * @return PhoneModel|null
     */
    public function getWorkPhone(): ?PhoneModel
    {
        return $this->workPhone;
    }

    /**
     * @param AddressModel|null $billingAddress
     *
     * @return self
     */
    public function setBillingAddress(?AddressModel $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * @param AddressModel|null $shippingAddress
     *
     * @return self
     */
    public function setShippingAddress(?AddressModel $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

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
     * @param string|null $accountId
     *
     * @return self
     */
    public function setAccountId(?string $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * @param AccountInfoModel|null $accountInfo
     *
     * @return self
     */
    public function setAccountInfo(?AccountInfoModel $accountInfo): self
    {
        $this->accountInfo = $accountInfo;

        return $this;
    }

    /**
     * @param bool|null $addressMatch
     *
     * @return self
     */
    public function setAddressMatch(?bool $addressMatch): self
    {
        $this->addressMatch = $addressMatch;

        return $this;
    }

    /**
     * @param string|null $challengeIndicator
     *
     * @return self
     */
    public function setChallengeIndicator(?string $challengeIndicator): self
    {
        $this->challengeIndicator = $challengeIndicator;

        return $this;
    }

    /**
     * @param PhoneModel|null $homePhone
     *
     * @return self
     */
    public function setHomePhone(?PhoneModel $homePhone): self
    {
        $this->homePhone = $homePhone;

        return $this;
    }

    /**
     * @param PhoneModel|null $mobilePhone
     *
     * @return self
     */
    public function setMobilePhone(?PhoneModel $mobilePhone): self
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * @param RiskIndicatorModel|null $riskIndicator
     *
     * @return self
     */
    public function setRiskIndicator(?RiskIndicatorModel $riskIndicator): self
    {
        $this->riskIndicator = $riskIndicator;

        return $this;
    }

    /**
     * @param PhoneModel|null $workPhone
     *
     * @return self
     */
    public function setWorkPhone(?PhoneModel $workPhone): self
    {
        $this->workPhone = $workPhone;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        if (isset($response['name'])) {
            $model->setName($response['name']);
        }

        if (isset($response['email'])) {
            $model->setEmail($response['email']);
        }

        if (isset($response['home_phone'])) {
            $model->setHomePhone(PhoneModel::fromArray($response['home_phone']));
        }

        if (isset($response['mobile_phone'])) {
            $model->setMobilePhone(PhoneModel::fromArray($response['mobile_phone']));
        }

        if (isset($response['work_phone'])) {
            $model->setWorkPhone(PhoneModel::fromArray($response['work_phone']));
        }

        if (isset($response['billing_address'])) {
            $model->setBillingAddress(AddressModel::fromArray($response['billing_address']));
        }

        if (isset($response['shipping_address'])) {
            $model->setShippingAddress(AddressModel::fromArray($response['shipping_address']));
        }

        if (isset($response['address_match'])) {
            $model->setAddressMatch($response['address_match']);
        }

        if (isset($response['account_id'])) {
            $model->setAccountId($response['account_id']);
        }

        if (isset($response['challenge_indicator'])) {
            $model->setChallengeIndicator($response['challenge_indicator']);
        }

        if (isset($response['risk_indicator'])) {
            $model->setRiskIndicator(RiskIndicatorModel::fromArray($response['risk_indicator']));
        }

        if (isset($response['account_info'])) {
            $model->setAccountInfo(AccountInfoModel::fromArray($response['account_info']));
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'home_phone' => $this->getHomePhone() ? $this->getHomePhone()->toArray() : null,
            'mobile_phone' => $this->getMobilePhone() ? $this->getMobilePhone()->toArray() : null,
            'work_phone' => $this->getWorkPhone() ? $this->getWorkPhone()->toArray() : null,
            'billing_address' => $this->getBillingAddress() ? $this->getBillingAddress()->toArray() : null,
            'shipping_address' => $this->getShippingAddress() ? $this->getShippingAddress()->toArray() : null,
            'address_match' => $this->getAddressMatch(),
            'account_id' => $this->getAccountId(),
            'challenge_indicator' => $this->getChallengeIndicator(),
            'risk_indicator' => $this->getRiskIndicator() ? $this->getRiskIndicator()->toArray() : null,
            'account_info' => $this->getAccountInfo() ? $this->getAccountInfo()->toArray() : null,
        ], function ($value) {
            return $value !== null;
        });
    }


    public function toApi(): array
    {
        return $this->toArray();
    }
}
