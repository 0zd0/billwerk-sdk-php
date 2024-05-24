<?php

namespace Billwerk\Sdk\Model\Checkout\Session;

use Billwerk\Sdk\Model\AbstractModel;
use Billwerk\Sdk\Model\HasRequestApiInterface;

class PhoneModel extends AbstractModel implements HasRequestApiInterface
{
    /**
     * Country code (1-3 digits). See https://en.wikipedia.org/wiki/List_of_country_calling_codes
     *
     * @var string $cc
     */
    protected string $cc;

    /**
     * Subscriber number (1-12 digits)
     *
     * @var string $subscriber
     */
    protected string $subscriber;

    /**
     * @return string
     */
    public function getCc(): string
    {
        return $this->cc;
    }

    /**
     * @return string
     */
    public function getSubscriber(): string
    {
        return $this->subscriber;
    }

    /**
     * @param string $cc
     *
     * @return self
     */
    public function setCc(string $cc): self
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * @param string $subscriber
     *
     * @return self
     */
    public function setSubscriber(string $subscriber): self
    {
        $this->subscriber = $subscriber;

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

        $model->setCc($response['cc'])
            ->setSubscriber($response['subscriber']);

        return $model;
    }

    public function toApi(): array
    {
        return [
            'cc' => $this->getCc(),
            'subscriber' => $this->getSubscriber(),
        ];
    }
}
