<?php

namespace App\DataProvider\Endpoint;

use App\DataProvider\HttpClient\AlphavantageHttpClient;

class AlphavantageEndpoint
{
    public function __construct(protected AlphavantageHttpClient $client) {}
}
