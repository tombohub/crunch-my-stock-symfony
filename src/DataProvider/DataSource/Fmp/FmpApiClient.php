<?php

namespace App\DataProvider\DataSource\Fmp;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class FmpApiClient
 *
 * This class is responsible for interacting with the Financial Modeling Prep API.
 *
 * @package App\DataProvider\Fmp
 */
class FmpApiClient
{
    /**
     * FmpApiClient constructor.
     *
     * @param HttpClientInterface $httpClient The HTTP client interface.
     * @param string $apiKey The API key for authenticating requests.
     */
    public function __construct(
        private HttpClientInterface $httpClient,
        #[Autowire(env: 'FMP_API_KEY')] private string $apiKey,
    ) {}

    /**
     * Makes a GET request to the specified URL with the provided query parameters.
     *
     * @param string $url The URL to make the GET request to.
     * @param array $params Optional query parameters to include in the request.
     * @return \Symfony\Contracts\HttpClient\ResponseInterface The response from the HTTP request.
     */
    public function get(string $url, array $params = [])
    {
        $params['apikey'] = $this->apiKey;
        return $this->httpClient->request('GET', $url, ['query' => $params]);
    }
}
