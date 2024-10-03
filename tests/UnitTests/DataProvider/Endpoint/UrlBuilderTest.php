<?php

namespace App\Tests\UnitTests\DataProvider\Endpoint;

use App\DataProvider\Endpoint\UrlBuilder;

use PHPUnit\Framework\TestCase;

class UrlBuilderTest extends TestCase
{
    private UrlBuilder $urlBuilder;
    protected function setUp(): void
    {
        $this->urlBuilder = new UrlBuilder;
    }
    public function test_build_onePathVariable()
    {
        $urlTemplate = 'https://www.url.com/{stock}';
        $params = ['stock' => 'AAPL'];
        $actualUrl = $this->urlBuilder->build($urlTemplate, $params);

        $expectedUrl = 'https://www.url.com/AAPL';

        $this->assertEquals($expectedUrl, $actualUrl);
    }

    public function test_build_twoPathVariables()
    {
        $urlTemplate = 'https://www.url.com/{stock}/{date}';
        $params = ['stock' => 'AAPL', 'date' => '2022-03-03'];
        $actualUrl = $this->urlBuilder->build($urlTemplate, $params);

        $expectedUrl = 'https://www.url.com/AAPL/2022-03-03';

        $this->assertEquals($expectedUrl, $actualUrl);
    }

    public function test_build_oneQueryParam()
    {
        $urlTemplate =
            'https://www.url.com/';
        $params = ['stock' => 'AAPL'];
        $actualUrl = $this->urlBuilder->build($urlTemplate, $params);

        $expectedUrl = 'https://www.url.com/?stock=AAPL';

        $this->assertEquals($expectedUrl, $actualUrl);
    }
}
