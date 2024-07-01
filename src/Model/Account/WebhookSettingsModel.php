<?php

namespace Billwerk\Sdk\Model\Account;

use Billwerk\Sdk\Enum\WebhookEventTypeEnum;
use Billwerk\Sdk\Model\AbstractModel;

class WebhookSettingsModel extends AbstractModel
{
    /**
     * Webhook urls
     *
     * @var array $urls
     */
    protected array $urls;

    /**
     * Optional HTTP Basic Auth username
     *
     * @var string|null $username
     */
    protected ?string $username = null;

    /**
     * Optional HTTP Basic Auth password
     *
     * @var string|null $password
     */
    protected ?string $password = null;

    /**
     * Webhook disabled
     *
     * @var bool $disabled
     */
    protected bool $disabled;

    /**
     * Webhook secret used for signature
     *
     * @var string $secret
     */
    protected string $secret;

    /**
     * Optional list of emails to send alert to if webhook fails
     *
     * @var array|null $alertEmails
     */
    protected ?array $alertEmails = null;

    /**
     * Number of requests to perform before alert email is sent, must be greater than or equal to four (1 hour)
     *
     * @var int|null $alertCount
     */
    protected ?int $alertCount = null;

    /**
     * List of event types to receive. See https://optimize-docs.billwerk.com/reference/event for valid event types
     *
     * @see WebhookEventTypeEnum
     * @var string[]|string|null
     */
    protected $eventTypes = null;

    /**
     * Number of requests to perform before alert email is sent, must be greater than or equal to four (1 hour)
     *
     * @return int|null
     */
    public function getAlertCount(): ?int
    {
        return $this->alertCount;
    }

    /**
     * Optional list of emails to send alert to if webhook fails
     *
     * @return array|null
     */
    public function getAlertEmails(): ?array
    {
        return $this->alertEmails;
    }

    /**
     *  List of event types to receive. See https://optimize-docs.billwerk.com/reference/event for valid event types
     *
     * @see WebhookEventTypeEnum
     * @return string|string[]|null
     */
    public function getEventTypes()
    {
        return $this->eventTypes;
    }

    /**
     * Optional HTTP Basic Auth password
     *
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Webhook secret used for signature
     *
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * Webhook urls
     *
     * @return array
     */
    public function getUrls(): array
    {
        return $this->urls;
    }

    /**
     * Optional HTTP Basic Auth username
     *
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Webhook disabled
     *
     * @return bool
     */
    public function getDisabled(): bool
    {
        return $this->disabled;
    }

    /**
     * Number of requests to perform before alert email is sent, must be greater than or equal to four (1 hour)
     *
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
     * Optional list of emails to send alert to if webhook fails
     *
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
     * Webhook disabled
     *
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
     *  List of event types to receive. See https://optimize-docs.billwerk.com/reference/event for valid event types
     *
     * @see WebhookEventTypeEnum
     *
     * @param string|string[]|null $eventTypes
     */
    public function setEventTypes($eventTypes): self
    {
        $this->eventTypes = $eventTypes;

        return $this;
    }

    /**
     * Optional HTTP Basic Auth password
     *
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
     * Webhook secret used for signature
     *
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
     * Webhook urls
     *
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
     * Optional HTTP Basic Auth username
     *
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

    public function toArray(): array
    {
        return array_filter([
            'urls' => $this->getUrls(),
            'disabled' => $this->getDisabled(),
            'secret' => $this->getSecret(),
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'alert_emails' => $this->getAlertEmails(),
            'alert_count' => $this->getAlertCount(),
            'event_types' => $this->getEventTypes(),
        ], function ($value) {
            return $value !== null;
        });
    }
}
