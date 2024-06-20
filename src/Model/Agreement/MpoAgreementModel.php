<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Model\AbstractModel;

class MpoAgreementModel extends AbstractModel
{
    /**
     * @var string|null $shopName
     */
    protected ?string $shopName = null;

    /**
     * @var string|null $shopLogoUrl
     */
    protected ?string $shopLogoUrl = null;

    /**
     * @var int|null $merchantCategoryCode
     */
    protected ?int $merchantCategoryCode = null;

    /**
     * @var string|null $vat
     */
    protected ?string $vat = null;

    /**
     * @var int|null $minimumUserAge
     */
    protected ?int $minimumUserAge = null;

    /**
     * @return int|null
     */
    public function getMerchantCategoryCode(): ?int
    {
        return $this->merchantCategoryCode;
    }

    /**
     * @return int|null
     */
    public function getMinimumUserAge(): ?int
    {
        return $this->minimumUserAge;
    }

    /**
     * @return string|null
     */
    public function getShopLogoUrl(): ?string
    {
        return $this->shopLogoUrl;
    }

    /**
     * @return string|null
     */
    public function getShopName(): ?string
    {
        return $this->shopName;
    }

    /**
     * @return string|null
     */
    public function getVat(): ?string
    {
        return $this->vat;
    }

    /**
     * @param int|null $merchantCategoryCode
     *
     * @return self
     */
    public function setMerchantCategoryCode(?int $merchantCategoryCode): self
    {
        $this->merchantCategoryCode = $merchantCategoryCode;

        return $this;
    }

    /**
     * @param int|null $minimumUserAge
     *
     * @return self
     */
    public function setMinimumUserAge(?int $minimumUserAge): self
    {
        $this->minimumUserAge = $minimumUserAge;

        return $this;
    }

    /**
     * @param string|null $shopLogoUrl
     *
     * @return self
     */
    public function setShopLogoUrl(?string $shopLogoUrl): self
    {
        $this->shopLogoUrl = $shopLogoUrl;

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
     * @param array $response
     *
     * @return self
     */
    public static function fromArray(array $response): self
    {
        $model = new self();

        if (isset($response['shopName'])) {
            $model->setShopName($response['shopName']);
        }

        if (isset($response['merchantCategoryCode'])) {
            $model->setMerchantCategoryCode($response['merchantCategoryCode']);
        }

        if (isset($response['vat'])) {
            $model->setVat($response['vat']);
        }

        if (isset($response['shopLogoUrl'])) {
            $model->setShopLogoUrl($response['shopLogoUrl']);
        }

        if (isset($response['minimumUserAge'])) {
            $model->setMinimumUserAge($response['minimumUserAge']);
        }

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_filter([
            'shopName' => $this->getShopName(),
            'shopLogoUrl' => $this->getShopLogoUrl(),
            'merchantCategoryCode' => $this->getMerchantCategoryCode(),
            'vat' => $this->getVat(),
            'minimumUserAge' => $this->getMinimumUserAge(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
