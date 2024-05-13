<?php

namespace Billwerk\Sdk\Model;

use Billwerk\Sdk\Enum\WebhookEventTypeEnum;

class WebhookSettingsModel extends AbstractModel
{
    protected array $urls;
    protected ?string $username    = null;
    protected ?string $password    = null;
    protected bool $disabled;
    protected string $secret;
    protected ?array $alertEmails = null;
    protected ?int $alertCount  = null;
    /**
     * @var string[]|string|null
     */
    protected $event_types = null;

    /**
     * @return int|null
     */
    public function getAlertCount(): ?int
    {
        return $this->alertCount;
    }

    /**
     * @return array|null
     */
    public function getAlertEmails(): ?array
    {
        return $this->alertEmails;
    }

    /**
     * @return string|string[]|null
     */
    public function getEventTypes()
    {
        return $this->event_types;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * @return array
     */
    public function getUrls(): array
    {
        return $this->urls;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return bool
     */
    public function getDisabled(): bool
    {
        return $this->disabled;
    }

    /**
     * @param int|null $alertCount
     *
     * @return WebhookSettingsModel
     */
    public function setAlertCount(?int $alertCount): self
    {
        $this->alertCount = $alertCount;

        return $this;
    }

    /**
     * @param array|null $alertEmails
     *
     * @return WebhookSettingsModel
     */
    public function setAlertEmails(?array $alertEmails): self
    {
        $this->alertEmails = $alertEmails;

        return $this;
    }

    /**
     * @param bool $disabled
     *
     * @return WebhookSettingsModel
     */
    public function setDisabled(bool $disabled): self
    {
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * @param string|string[]|null $event_types
     */
    public function setEventTypes($event_types): self
    {
        $this->event_types = $event_types;

        return $this;
    }

    /**
     * @param string|null $password
     *
     * @return WebhookSettingsModel
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param string $secret
     *
     * @return WebhookSettingsModel
     */
    public function setSecret(string $secret): self
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * @param array $urls
     *
     * @return WebhookSettingsModel
     */
    public function setUrls(array $urls): self
    {
        $this->urls = $urls;

        return $this;
    }

    /**
     * @param string|null $username
     *
     * @return WebhookSettingsModel
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public static function fromArray(array $response): self
    {
        $model = new self();

        $model->setUrls($response['urls'])
              ->setDisabled($response['disabled'])
              ->setSecret($response['secret']);

        if (isset($response['username'])) {
            $model->setUsername($response['username']);
        }

        if (isset($response['password'])) {
            $model->setPassword($response['password']);
        }

        if (isset($response['alert_emails']) && is_array($response['alert_emails'])) {
            $model->setAlertEmails($response['alert_emails']);
        }

        if (isset($response['alert_count'])) {
            $model->setAlertCount($response['alert_count']);
        }

        if (isset($response['event_types'])) {
            if (
                is_array($response['event_types'])
                || is_string($response['event_types'])
            ) {
                $model->setEventTypes($response['event_types']);
            }
        }

        return $model;
    }
}
