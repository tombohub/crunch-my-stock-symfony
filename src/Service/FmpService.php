<?php

namespace App\Service;

/**
 * This file contains the FmpService class, which is responsible for
 * interacting with the Financial Modeling Prep API to fetch financial data.
 */

use App\DataSource\FmpDataSource;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class FmpService
{
    private string $baseUrl = 'https://financialmodelingprep.com/api/';


    public function __construct(
        private HttpClientInterface $httpClient,
        #[Autowire(env: 'FMP_API_KEY')] private string $apiKey,
        private FmpDataSource $fmpDataSource
    ) {}

    public function getStockData()
    {
        $response = $this->httpClient->request(
            'GET',
            "https://financialmodelingprep.com/api/v3/fx/EURUSD?apikey={$this->apiKey}"
        );
        $content = $response->getContent();
        echo $this->fmpDataSource->getStocks();
    }
}
