<?php

namespace App\Tests\IntegrationTests\DataProvider\HttpClient;

use App\DataProvider\HttpClient\AlphavantageHttpClient;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AlphavantageHttpClientTest extends KernelTestCase
{
    private HttpClientInterface $symfonyClient;

    protected function setUp(): void
    {
        $container = static::getContainer();
        $this->symfonyClient = $container->get(HttpClientInterface::class);
    }

    public function test_get_returns200status()
    {
        $url = 'https://www.alphavantage.co/query?function=LISTING_STATUS';
        $client = new AlphavantageHttpClient($this->symfonyClient, 'demo');
        $response = $client->get($url);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_get_whenApiKeyWrong_returns200StatusCode()
    {
        $url = 'https://www.alphavantage.co/query?function=LISTING_STATUS';
        $client = new AlphavantageHttpClient($this->symfonyClient, 'wrong key');
        $response = $client->get($url);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_get_wrongParam_returns200StatusCode()
    {
        $url = 'https://www.alphavantage.co/query?function=SOMEWRONGPARAM';
        $client = new AlphavantageHttpClient($this->symfonyClient, 'demo');
        $response = $client->get($url);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
