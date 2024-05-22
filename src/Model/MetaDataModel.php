<?php

namespace Billwerk\Sdk\Model;

/**
 * Custom metadata
 */
class MetaDataModel extends AbstractModel
{
    /**
     * @var string $key
     */
    protected string $key;

    /**
     * @var MetaDataValueModel[] $value
     */
    protected array $value;

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return MetaDataValueModel[]
     */
    public function getValue(): array
    {
        return $this->value;
    }

    /**
     * @param string $key
     *
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @param MetaDataValueModel[] $value
     *
     * @return self
     */
    public function setValue(array $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param string $key
     * @param array $object
     *
     * @return self
     */
    public static function fromObject(string $key, array $object): self
    {
        $model = new self();
        $metadataValues = [];
        foreach ($object as $valueKey => $item) {
            $metadataValues[] = (new MetaDataValueModel())
                ->setKey($valueKey)
                ->setValue($item);
        }
        $model->setKey($key)
              ->setValue($metadataValues);
        return $model;
    }

    public static function fromArray(array $response): self
    {
        return new self();
    }
}
