<?php

namespace App\Serializer;


use Symfony\Component\Serializer\SerializerInterface;

/**
 * Custom serializer wrapper for the whole app
 */
class AppSerializer
{

    public function __construct(private SerializerInterface $serializer) {}
    public function csvToArrayOfObjects(string $csv, string $objectType)
    {
        return $this->serializer->deserialize($csv, $objectType . '[]', 'csv');
    }

    public function jsonToArrayOfObjects(string $json, string $objectType)
    {
        return $this->serializer->deserialize($json, $objectType . '[]', 'json');
    }
}
