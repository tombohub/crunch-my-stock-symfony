<?php

namespace App\DataSource\Fmp;

class FmpApiService
{
    public function __construct(private FmpApiClient $apiClient) {}
    public function test()
    {
        $response = $this->apiClient->get('https://financialmodelingprep.com/api/v3/symbol/available-indexes');
        $content = $response->getContent();
        return $content;
    }
}
