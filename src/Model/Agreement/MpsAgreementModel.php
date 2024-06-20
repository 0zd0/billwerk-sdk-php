<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Model\AbstractModel;

class MpsAgreementModel extends AbstractModel
{
    /**
     * Set of currencies supported by agreement. Each currency in ISO 4217 three letter alpha code
     *
     * @var array $currencies
     */
    protected array $currencies;

    /**
     * @var string|null $country
     */
    protected ?string $country = null;

    /**
     * @var string|null $shopName
     */
    protected ?string $shopName = null;

    /**
     * @var string|null $merchantVat
     */
    protected ?string $merchantVat = null;

    /**
     * @var string|null $providerId
     */
    protected ?string $providerId = null;

    /**
     * @var string|null $authorizationUrl
     */
    protected ?string $authorizationUrl = null;

    /**
     * @var bool|null $asyncOneOff
     */
    protected ?bool $asyncOneOff = null;

    /**
     * @return array
     */
    public function getCurrencies(): array
    {
        return $this->currencies;
    }

    /**
     * @return string|null
     */
    public function getShopName(): ?string
    {
        return $this->shopName;
    }

    /**
     * @return bool|null
     */
    public function getAsyncOneOff(): ?bool
    {
        return $this->asyncOneOff;
    }

    /**
     * @return string|null
     */
    public function getAuthorizationUrl(): ?string
    {
        return $this->authorizationUrl;
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
    public function getMerchantVat(): ?string
    {
        return $this->merchantVat;
    }

    /**
     * @return string|null
     */
    public function getProviderId(): ?string
    {
        return $this->providerId;
    }

    /**
     * @param array $currencies
     *
     * @return self
     */
    public function setCurrencies(array $currencies): self
    {
        $this->currencies = $currencies;

        return $this;
    }

    /**
     * @param string|null $shopName
     *
     * @return self
     */
    public function setShopName(?string $shopName): self
    {
        $this->shopName = $shopName;

        return $this;
    }

    /**
     * @param bool|null $asyncOneOff
     *
     * @return self
     */
    public function setAsyncOneOff(?bool $asyncOneOff): self
    {
        $this->asyncOneOff = $asyncOneOff;

        return $this;
    }

    /**
     * @param string|null $authorizationUrl
     *
     * @return self
     */
    public function setAuthorizationUrl(?string $authorizationUrl): self
    {
        $this->authorizationUrl = $authorizationUrl;

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
     * @param string|null $merchantVat
     *
     * @return self
     */
    public function setMerchantVat(?string $merchantVat): self
    {
        $this->merchantVat = $merchantVat;

        return $this;
    }

    /**
     * @param string|null $providerId
     *
     * @return self
     */
    public function setProviderId(?string $providerId): self
    {
        $this->providerId = $providerId;

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

        $model->setCurrencies($response['currencies']);

        if (isset($response['country'])) {
            $model->setCountry($response['country']);
        }

        if (isset($response['shop_name'])) {
            $model->setShopName($response['shop_name']);
        }

        if (isset($response['merchant_vat'])) {
            $model->setMerchantVat($response['merchant_vat']);
        }

        if (isset($response['provider_id'])) {
            $model->setProviderId($response['provider_id']);
        }

        if (isset($response['authorization_url'])) {
            $model->setAuthorizationUrl($response['authorization_url']);
        }

        if (isset($response['async_one_off'])) {
            $model->setAsyncOneOff($response['async_one_off']);
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
            'country' => $this->getCountry(),
            'shop_name' => $this->getShopName(),
            'merchant_vat' => $this->getMerchantVat(),
            'provider_id' => $this->getProviderId(),
            'authorization_url' => $this->getAuthorizationUrl(),
            'async_one_off' => $this->getAsyncOneOff(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
