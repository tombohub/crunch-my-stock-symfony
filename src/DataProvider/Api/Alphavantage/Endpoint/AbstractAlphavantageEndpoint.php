<?php

namespace App\DataProvider\Api\Alphavantage\Endpoint;

use App\DataProvider\Alphavantage\AlphavantageApiClient;
use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractAlphavantageEndpoint
{
    public function __construct(protected AlphavantageApiClient $apiClient, protected SerializerInterface $serializer) {}
}
