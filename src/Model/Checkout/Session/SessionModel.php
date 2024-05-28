<?php

namespace Billwerk\Sdk\Model\Checkout\Session;

use Billwerk\Sdk\Model\AbstractModel;

class SessionModel extends AbstractModel
{
    /**
     * Session id
     *
     * @var string $id
     */
    protected string $id;

    /**
     * Session url
     *
     * @var string $url
     */
    protected string $url;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $url
     *
     * @return self
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

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
            ->setId($response['id'])
            ->setUrl($response['url']);

        return $model;
    }

    public function toArray(): array
    {
        $fields = [
            'id' => $this->getId(),
            'url' => $this->getUrl(),
        ];

        return array_filter($fields, function ($value) {
            return $value !== null;
        });
    }
}
