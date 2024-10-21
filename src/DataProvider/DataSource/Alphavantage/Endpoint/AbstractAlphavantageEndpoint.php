<?php

namespace App\DataProvider\DataSource\Alphavantage\Endpoint;

use App\DataProvider\DataSource\Alphavantage\AlphavantageHttpClient;
use App\Serializer\AppSerializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class AbstractAlphavantageEndpoint
{
    public function __construct(protected AlphavantageHttpClient $apiClient) {}
}
