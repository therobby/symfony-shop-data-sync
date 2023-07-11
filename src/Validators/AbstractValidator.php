<?php

declare(strict_types=1);

namespace App\Validators;

abstract class AbstractValidator
{
    /**
     * Fetch data from array if key exists (null if not)
     * @param array<string, string> $array
     * @param string $key
     * @return string|int|null
     */
    protected function getValueIfArrayKeyExists(array $array, string $key): string|int|null
    {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }
        return null;
    }
}
