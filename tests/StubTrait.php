<?php

namespace Billwerk\Sdk\Test;

use Exception;

trait StubTrait
{
    public static string $prefixJsonRequired = 'required';
    public static string $prefixJsonAll      = 'all';

    /**
     * @throws Exception
     */
    public static function getStubJsonModelWithRequiredFields(string $name): array
    {
        return self::getJsonFile($name, self::$prefixJsonRequired);
    }

    /**
     * @throws Exception
     */
    public static function getStubJsonModelWithAllFields(string $name): array
    {
        return self::getJsonFile($name, self::$prefixJsonAll);
    }

    /**
     * @throws Exception
     */
    public static function getJsonFile(string $name, string $prefix): array
    {
        $path = __DIR__ . "/../stubs/json/$name.$prefix.json";

        $modelData = file_get_contents($path);
        if ($modelData === false) {
            throw new Exception("Unable to load JSON model: $path");
        }

        $model = json_decode($modelData, true);
        if ($model === null) {
            throw new Exception("Invalid JSON in model: $path");
        }

        return $model;
    }
}
