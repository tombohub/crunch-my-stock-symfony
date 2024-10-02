<?php

namespace App\DataProvider\Api\Alphavantage\Endpoint;

use App\DataProvider\Api\Alphavantage\AlphavantageHttpClient;
use App\Serializer\AppSerializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class AbstractAlphavantageEndpoint
{
    public function __construct(protected AlphavantageHttpClient $apiClient, protected AppSerializer $appSerializer, protected ValidatorInterface $validator) {}
}
