<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Serializer;

$encoders = [new JsonEncoder()];
$normalizers = [new ObjectNormalizer(), new ArrayDenormalizer()];

$serializer = new Serializer($normalizers, $encoders);


class A
{
    public function __construct(public string $name)
    {
    }
}

/**
 * silently fails
 */
$serializer->deserialize('{}', A::class.'[]', 'json');

/*
 * silently fails
 */
$serializer->deserialize('[]', A::class.'[]', 'json');

/**
 * errors
 */
$serializer->deserialize('[{}]', A::class.'[]', 'json');
