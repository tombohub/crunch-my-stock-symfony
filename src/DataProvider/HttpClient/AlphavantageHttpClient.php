<?php

namespace App\DataProvider\HttpClient;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * This class provides an interface for making requests to the Alphavantage API using an HTTP client.
 *
 * @package App\DataProvider\Alphavantage
 */
class AlphavantageHttpClient
{
    /**
     * AlphavantageApiClient constructor.
     *
     * @param HttpClientInterface $httpClient The HTTP client used to make API requests.
     * @param string $apiKey The API key for authenticating requests to the Alphavantage API.
     */
    public function __construct(
        private HttpClientInterface $httpClient,
        #[Autowire(env: 'ALPHAVANTAGE_API_KEY')] private string $apiKey
    ) {}

    /**
     * Sends a GET request to the specified URL
     *
     * @param string $url The URL endpoint to send the GET request to.
     *
     * @return \Symfony\Contracts\HttpClient\ResponseInterface The response from the API.
     */
    public function get(string $url): ResponseInterface
    {
        $params['apikey'] = $this->apiKey;
        return $this->httpClient->request('GET', $url, ['query' => $params]);
    }
}
