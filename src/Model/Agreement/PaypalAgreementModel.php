<?php

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Model\AbstractModel;

class PaypalAgreementModel extends AbstractModel
{
    /**
     * @var bool|null $test
     */
    protected ?bool $test = null;

    /**
     * PayPal agreement version
     *
     * @var int|null $version
     */
    protected ?int $version = null;

    /**
     * PayPal client id
     *
     * @var string $clientId
     */
    protected string $clientId;

    /**
     * PayPal client secret
     *
     * @var string $clientSecret
     */
    protected string $clientSecret;

    /**
     * PayPal onboarding URL
     *
     * @var string|null $actionUrl
     */
    protected ?string $actionUrl = null;

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
    public function getActionUrl(): ?string
    {
        return $this->actionUrl;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * @return int|null
     */
    public function getVersion(): ?int
    {
        return $this->version;
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
     * @param string|null $actionUrl
     *
     * @return self
     */
    public function setActionUrl(?string $actionUrl): self
    {
        $this->actionUrl = $actionUrl;

        return $this;
    }

    /**
     * @param string $clientId
     *
     * @return self
     */
    public function setClientId(string $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * @param string $clientSecret
     *
     * @return self
     */
    public function setClientSecret(string $clientSecret): self
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * @param int|null $version
     *
     * @return self
     */
    public function setVersion(?int $version): self
    {
        $this->version = $version;

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
            ->setClientId($response['client_id'])
            ->setClientSecret($response['client_secret']);

        if (isset($response['test'])) {
            $model->setTest($response['test']);
        }

        if (isset($response['version'])) {
            $model->setVersion($response['version']);
        }

        if (isset($response['action_url'])) {
            $model->setActionUrl($response['action_url']);
        }

        return $model;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_filter([
            'client_id' => $this->getClientId(),
            'client_secret' => $this->getClientSecret(),
            'test' => $this->getTest(),
            'version' => $this->getVersion(),
            'action_url' => $this->getActionUrl(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
