<?php

namespace Billwerk\Sdk\Model\Account;

use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasRequestApiInterface;

class WebhookSettingsUpdateModel extends AbstractModel implements HasRequestApiInterface
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
     * List of event types to receive. See documentation for valid event types
     *
     * @see WebhookEventTypeEnum
     * @var array|null $eventTypes
     */
    protected ?array $eventTypes = null;

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
     * @return bool|null
     */
    public function getDisabled(): ?bool
    {
        return $this->disabled;
    }

    /**
     * @return array|null
     */
    public function getEventTypes(): ?array
    {
        return $this->eventTypes;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
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
     * @param int|null $alertCount
     *
     * @return self
     */
    public function setAlertCount(?int $alertCount): self
    {
        $this->alertCount = $alertCount;

        return $this;
    }

    /**
     * @param array|null $alertEmails
     *
     * @return self
     */
    public function setAlertEmails(?array $alertEmails): self
    {
        $this->alertEmails = $alertEmails;

        return $this;
    }

    /**
     * @param bool $disabled
     *
     * @return self
     */
    public function setDisabled(bool $disabled): self
    {
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * @param array|null $eventTypes
     *
     * @return self
     */
    public function setEventTypes(?array $eventTypes): self
    {
        $this->eventTypes = $eventTypes;

        return $this;
    }

    /**
     * @param string|null $password
     *
     * @return self
     */
    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param array $urls
     *
     * @return self
     */
    public function setUrls(array $urls): self
    {
        $this->urls = $urls;

        return $this;
    }

    /**
     * @param string|null $username
     *
     * @return self
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public static function fromArray(array $response): self
    {
        $model = new self();

        $model->setUrls($response['urls']);

        if (isset($response['username'])) {
            $model->setUsername($response['username']);
        }

        if (isset($response['password'])) {
            $model->setPassword($response['password']);
        }

        $model->setDisabled($response['disabled']);

        if (isset($response['alert_emails'])) {
            $model->setAlertEmails($response['alert_emails']);
        }

        if (isset($response['alert_count'])) {
            $model->setAlertCount($response['alert_count']);
        }

        if (isset($response['event_types'])) {
            $model->setEventTypes($response['event_types']);
        }

        return $model;
    }

    public function toArray(): array
    {
        return array_filter([
            'urls' => $this->getUrls(),
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'disabled' => $this->getDisabled(),
            'alert_emails' => $this->getAlertEmails(),
            'alert_count' => $this->getAlertCount(),
            'event_types' => $this->getEventTypes(),
        ], function ($value) {
            return $value !== null;
        });
    }

    public function toApi(): array
    {
        return $this->toArray();
    }
}
