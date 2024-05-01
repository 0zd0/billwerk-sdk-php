<?php

namespace Billwerk\Sdk\Model;

abstract class AbstractModel
{
    /**
     * Convert to class from json
     *
     * @param array $response response from API.
     *
     * @return self
     */
    abstract public static function fromArray(array $response): self;

    public static function getClassName(): string
    {
        return str_replace(__NAMESPACE__ . '\\', '', get_called_class());
    }
}
