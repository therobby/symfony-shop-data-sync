<?php

declare(strict_types=1);

namespace App\Serializer;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

class JsonSerializer implements Serializer
{
    /**
     * Prepares data to return in JsonResponse
     */
    public static function serialize(mixed $data): mixed
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new SymfonySerializer($normalizers, $encoders);
        return json_decode($serializer->serialize($data, 'json'));
    }
}
