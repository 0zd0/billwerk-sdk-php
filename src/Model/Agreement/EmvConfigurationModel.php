<?php
/**
 * Configuration for enabling integration to Mastercard SCOF
 */

namespace Billwerk\Sdk\Model\Agreement;

use Billwerk\Sdk\Model\AbstractModel;

class EmvConfigurationModel extends AbstractModel
{
    /**
     * @var string $emvTokenizationStatus
     */
    protected string $emvTokenizationStatus;

    /**
     * @var string $tokenRequestorId
     */
    protected string $tokenRequestorId;

    /**
     * @var string|null $onboardingState
     */
    protected ?string $onboardingState = null;

    /**
     * @var string $cardScheme
     */
    protected string $cardScheme;

    /**
     * @return string
     */
    public function getCardScheme(): string
    {
        return $this->cardScheme;
    }

    /**
     * @return string
     */
    public function getEmvTokenizationStatus(): string
    {
        return $this->emvTokenizationStatus;
    }

    /**
     * @return string|null
     */
    public function getOnboardingState(): ?string
    {
        return $this->onboardingState;
    }

    /**
     * @return string
     */
    public function getTokenRequestorId(): string
    {
        return $this->tokenRequestorId;
    }

    /**
     * @param string $cardScheme
     *
     * @return self
     */
    public function setCardScheme(string $cardScheme): self
    {
        $this->cardScheme = $cardScheme;

        return $this;
    }

    /**
     * @param string $emvTokenizationStatus
     *
     * @return self
     */
    public function setEmvTokenizationStatus(string $emvTokenizationStatus): self
    {
        $this->emvTokenizationStatus = $emvTokenizationStatus;

        return $this;
    }

    /**
     * @param string|null $onboardingState
     *
     * @return self
     */
    public function setOnboardingState(?string $onboardingState): self
    {
        $this->onboardingState = $onboardingState;

        return $this;
    }

    /**
     * @param string $tokenRequestorId
     *
     * @return self
     */
    public function setTokenRequestorId(string $tokenRequestorId): self
    {
        $this->tokenRequestorId = $tokenRequestorId;

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
            ->setEmvTokenizationStatus($response['emvTokenizationStatus'])
            ->setTokenRequestorId($response['tokenRequestorId'])
            ->setCardScheme($response['cardScheme']);

        if (isset($response['onboardingState'])) {
            $model->setOnboardingState($response['onboardingState']);
        }

        return $model;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_filter([
            'emvTokenizationStatus' => $this->getEmvTokenizationStatus(),
            'tokenRequestorId' => $this->getTokenRequestorId(),
            'cardScheme' => $this->getCardScheme(),
            'onboardingState' => $this->getOnboardingState(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
