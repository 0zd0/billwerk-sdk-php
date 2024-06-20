<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Enum\CardGatewayAgreementPaymentTypeEnum;
use Billwerk\Sdk\Enum\CardGatewayAgreementProviderEnum;
use Billwerk\Sdk\Model\AbstractModel;

class CardGatewayAgreementModel extends AbstractModel
{
    /**
     * Set of currencies supported by agreement. Each currency in ISO 4217 three letter alpha code.
     *
     * @var array|null $currencies
     */
    protected ?array $currencies = null;

    /**
     * Add acquirer surcharge fee if possible
     *
     * @var bool|null $surcharge
     */
    protected ?bool $surcharge = null;

    /**
     * Optional name
     *
     * @var string|null $name
     */
    protected ?string $name = null;

    /**
     * Card gateway provider type
     *
     * @see CardGatewayAgreementProviderEnum
     * @var string $provider
     */
    protected string $provider;

    /**
     * Card types supported by agreement
     *
     * @var array|null $cardTypes
     */
    protected ?array $cardTypes = null;

    /**
     * Set of supported payment types for agreement: card, applepay, googlepay, mobilepay, vipps.
     * If not defined defaults to all.
     *
     * @see CardGatewayAgreementPaymentTypeEnum
     * @var array|null $paymentTypes
     */
    protected ?array $paymentTypes = null;

    /**
     * Key value map of provider settings
     *
     * @var array|null $providerSettings
     */
    protected ?array $providerSettings = null;

    /**
     * Prioritized list of fee configuration entries
     *
     * @var array|null $feeConfiguration
     */
    protected ?array $feeConfiguration = null;

    /**
     * Use 3DSecure for non-recurring payments (if supported by provider)
     *
     * @var bool|null $threedSecure
     */
    protected ?bool $threedSecure = null;

    /**
     * Use 3DSecure for recurring payments (if supported by provider)
     *
     * @var bool|null $threedSecureRecurring
     */
    protected ?bool $threedSecureRecurring = null;

    /**
     * Use Secured By Nets for non-recurring payments (if supported by provider)
     *
     * @var bool|null $securedByNets
     */
    protected ?bool $securedByNets = null;

    /**
     * Use Secured By Nets for recurring payments (if supported by provider)
     *
 * @var bool|null $securedByNetsRecurring
     */
    protected ?bool $securedByNetsRecurring = null;

    /**
     * Default behaviour if no specific SCA handing is defined in payment sessions.
     * If enabled SCA will be required and un-enrolled cards will be declined.
     *
     * @var bool|null $defaultRequireSca
     */
    protected ?bool $defaultRequireSca = null;

    /**
     * Disallow 3D Secure status attempted which means that card issuer does not support 3D Secure so
     * authentication could not be performed. An attempted 3D Secure flow normally results in liability shift.
     *
     * @var bool|null $disallowThreedSecureAttempted
     */
    protected ?bool $disallowThreedSecureAttempted = null;

    /**
     * Use agreement for payout (if supported by provider)
     *
     * @var bool|null $payout
     */
    protected ?bool $payout = null;

    /**
     * Configuration for enabling integration to Mastercard SCOF
     *
     * @var EmvConfigurationModel|null $vtsConfiguration
     */
    protected ?EmvConfigurationModel $vtsConfiguration = null;

    /**
     * Configuration for enabling integration to Mastercard SCOF
     *
     * @var EmvConfigurationModel|null $scofConfiguration
     */
    protected ?EmvConfigurationModel $scofConfiguration = null;

    /**
     * Card gateway reference id
     *
     * @var string $gwRef
     */
    protected string $gwRef;

    /**
     * @return EmvConfigurationModel|null
     */
    public function getScofConfiguration(): ?EmvConfigurationModel
    {
        return $this->scofConfiguration;
    }

    /**
     * @return EmvConfigurationModel|null
     */
    public function getVtsConfiguration(): ?EmvConfigurationModel
    {
        return $this->vtsConfiguration;
    }

    /**
     * @return array|null
     */
    public function getCardTypes(): ?array
    {
        return $this->cardTypes;
    }

    /**
     * @return array|null
     */
    public function getCurrencies(): ?array
    {
        return $this->currencies;
    }

    /**
     * @return bool|null
     */
    public function getDefaultRequireSca(): ?bool
    {
        return $this->defaultRequireSca;
    }

    /**
     * @return bool|null
     */
    public function getDisallowThreedSecureAttempted(): ?bool
    {
        return $this->disallowThreedSecureAttempted;
    }

    /**
     * @return array|null
     */
    public function getFeeConfiguration(): ?array
    {
        return $this->feeConfiguration;
    }

    /**
     * @return string
     */
    public function getGwRef(): string
    {
        return $this->gwRef;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }



    /**
     * @return array|null
     */
    public function getPaymentTypes(): ?array
    {
        return $this->paymentTypes;
    }

    /**
     * @return bool|null
     */
    public function getPayout(): ?bool
    {
        return $this->payout;
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * @return array|null
     */
    public function getProviderSettings(): ?array
    {
        return $this->providerSettings;
    }

    /**
     * @return bool|null
     */
    public function getSecuredByNets(): ?bool
    {
        return $this->securedByNets;
    }

    /**
     * @return bool|null
     */
    public function getSecuredByNetsRecurring(): ?bool
    {
        return $this->securedByNetsRecurring;
    }

    /**
     * @return bool|null
     */
    public function getSurcharge(): ?bool
    {
        return $this->surcharge;
    }

    /**
     * @return bool|null
     */
    public function getThreedSecure(): ?bool
    {
        return $this->threedSecure;
    }

    /**
     * @return bool|null
     */
    public function getThreedSecureRecurring(): ?bool
    {
        return $this->threedSecureRecurring;
    }

    /**
     * @param array|null $cardTypes
     *
     * @return self
     */
    public function setCardTypes(?array $cardTypes): self
    {
        $this->cardTypes = $cardTypes;

        return $this;
    }

    /**
     * @param array|null $currencies
     *
     * @return self
     */
    public function setCurrencies(?array $currencies): self
    {
        $this->currencies = $currencies;

        return $this;
    }

    /**
     * @param bool|null $defaultRequireSca
     *
     * @return self
     */
    public function setDefaultRequireSca(?bool $defaultRequireSca): self
    {
        $this->defaultRequireSca = $defaultRequireSca;

        return $this;
    }

    /**
     * @param bool|null $disallowThreedSecureAttempted
     *
     * @return self
     */
    public function setDisallowThreedSecureAttempted(?bool $disallowThreedSecureAttempted): self
    {
        $this->disallowThreedSecureAttempted = $disallowThreedSecureAttempted;

        return $this;
    }

    /**
     * @param array|null $feeConfiguration
     *
     * @return self
     */
    public function setFeeConfiguration(?array $feeConfiguration): self
    {
        $this->feeConfiguration = $feeConfiguration;

        return $this;
    }

    /**
     * @param string $gwRef
     *
     * @return self
     */
    public function setGwRef(string $gwRef): self
    {
        $this->gwRef = $gwRef;

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
     * @param array|null $paymentTypes
     *
     * @return self
     */
    public function setPaymentTypes(?array $paymentTypes): self
    {
        $this->paymentTypes = $paymentTypes;

        return $this;
    }

    /**
     * @param bool|null $payout
     *
     * @return self
     */
    public function setPayout(?bool $payout): self
    {
        $this->payout = $payout;

        return $this;
    }

    /**
     * @param string $provider
     *
     * @return self
     */
    public function setProvider(string $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * @param array|null $providerSettings
     *
     * @return self
     */
    public function setProviderSettings(?array $providerSettings): self
    {
        $this->providerSettings = $providerSettings;

        return $this;
    }

    /**
     * @param EmvConfigurationModel|null $scofConfiguration
     *
     * @return self
     */
    public function setScofConfiguration(?EmvConfigurationModel $scofConfiguration): self
    {
        $this->scofConfiguration = $scofConfiguration;

        return $this;
    }

    /**
     * @param bool|null $securedByNets
     *
     * @return self
     */
    public function setSecuredByNets(?bool $securedByNets): self
    {
        $this->securedByNets = $securedByNets;

        return $this;
    }

    /**
     * @param bool|null $securedByNetsRecurring
     *
     * @return self
     */
    public function setSecuredByNetsRecurring(?bool $securedByNetsRecurring): self
    {
        $this->securedByNetsRecurring = $securedByNetsRecurring;

        return $this;
    }

    /**
     * @param bool|null $surcharge
     *
     * @return self
     */
    public function setSurcharge(?bool $surcharge): self
    {
        $this->surcharge = $surcharge;

        return $this;
    }

    /**
     * @param bool|null $threedSecure
     *
     * @return self
     */
    public function setThreedSecure(?bool $threedSecure): self
    {
        $this->threedSecure = $threedSecure;

        return $this;
    }

    /**
     * @param bool|null $threedSecureRecurring
     *
     * @return self
     */
    public function setThreedSecureRecurring(?bool $threedSecureRecurring): self
    {
        $this->threedSecureRecurring = $threedSecureRecurring;

        return $this;
    }

    /**
     * @param EmvConfigurationModel|null $vtsConfiguration
     *
     * @return self
     */
    public function setVtsConfiguration(?EmvConfigurationModel $vtsConfiguration): self
    {
        $this->vtsConfiguration = $vtsConfiguration;

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

        $model
            ->setProvider($response['provider'])
            ->setGwRef($response['gw_ref']);

        if (isset($response['currencies'])) {
            $model->setCurrencies($response['currencies']);
        }

        if (isset($response['provider'])
            && in_array($response['provider'], CardGatewayAgreementProviderEnum::getAll(), true)) {
            $model->setProvider($response['provider']);
        }

        if (isset($response['surcharge'])) {
            $model->setSurcharge($response['surcharge']);
        }

        if (isset($response['name'])) {
            $model->setName($response['name']);
        }

        if (isset($response['card_types'])) {
            $model->setCardTypes($response['card_types']);
        }

        if (isset($response['payment_types'])) {
            $model->setPaymentTypes($response['payment_types']);
        }

        if (isset($response['provider_settings'])) {
            $model->setProviderSettings($response['provider_settings']);
        }

        if (isset($response['fee_configuration'])) {
            $model->setFeeConfiguration($response['fee_configuration']);
        }

        if (isset($response['threed_secure'])) {
            $model->setThreedSecure($response['threed_secure']);
        }

        if (isset($response['threed_secure_recurring'])) {
            $model->setThreedSecureRecurring($response['threed_secure_recurring']);
        }

        if (isset($response['secured_by_nets'])) {
            $model->setSecuredByNets($response['secured_by_nets']);
        }

        if (isset($response['secured_by_nets_recurring'])) {
            $model->setSecuredByNetsRecurring($response['secured_by_nets_recurring']);
        }

        if (isset($response['default_require_sca'])) {
            $model->setDefaultRequireSca($response['default_require_sca']);
        }

        if (isset($response['disallow_threed_secure_attempted'])) {
            $model->setDisallowThreedSecureAttempted($response['disallow_threed_secure_attempted']);
        }

        if (isset($response['payout'])) {
            $model->setPayout($response['payout']);
        }

        if (isset($response['vts_configuration'])) {
            $model->setVtsConfiguration(EmvConfigurationModel::fromArray($response['vts_configuration']));
        }

        if (isset($response['scof_configuration'])) {
            $model->setScofConfiguration(EmvConfigurationModel::fromArray($response['scof_configuration']));
        }

        return $model;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_filter([
            'currencies' => $this->getCurrencies(),
            'surcharge' => $this->getSurcharge(),
            'name' => $this->getName(),
            'provider' => $this->getProvider(),
            'card_types' => $this->getCardTypes(),
            'payment_types' => $this->getPaymentTypes(),
            'provider_settings' => $this->getProviderSettings(),
            'fee_configuration' => $this->getFeeConfiguration(),
            'threed_secure' => $this->getThreedSecure(),
            'threed_secure_recurring' => $this->getThreedSecureRecurring(),
            'secured_by_nets' => $this->getSecuredByNets(),
            'secured_by_nets_recurring' => $this->getSecuredByNetsRecurring(),
            'default_require_sca' => $this->getDefaultRequireSca(),
            'disallow_threed_secure_attempted' => $this->getDisallowThreedSecureAttempted(),
            'payout' => $this->getPayout(),
            'vts_configuration' => $this->getVtsConfiguration() ? $this->getVtsConfiguration()->toArray() : null,
            'scof_configuration' => $this->getScofConfiguration() ? $this->getScofConfiguration()->toArray() : null,
            'gw_ref' => $this->getGwRef(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
