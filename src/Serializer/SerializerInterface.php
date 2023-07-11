<?php

declare(strict_types=1);

namespace App\Serializer;

interface Serializer
{
    public static function serialize(mixed $value): mixed;
}
