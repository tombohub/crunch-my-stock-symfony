<?php

namespace App\DataProvider\DataSource\Fmp\Endpoint;

use App\DataProvider\Fmp\FmpApiClient;

class SymbolListEndpoint
{
    private const ENDPOINT = 'https://financialmodelingprep.com/api/v3/stock/list';
    public function __construct(FmpApiClient $apiClient) {}
    public function get() {}
}
