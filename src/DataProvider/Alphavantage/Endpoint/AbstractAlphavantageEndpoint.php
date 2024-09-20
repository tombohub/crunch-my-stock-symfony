<?php

namespace App\DataProvider\Alphavantage\Endpoint;

use App\DataProvider\Alphavantage\AlphavantageApiClient;
use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractAlphavantageEndpoint
{
    public function __construct(protected AlphavantageApiClient $apiClient, protected SerializerInterface $serializer) {}
}
