<?php

namespace App\Tests\UnitTests\DataProvider\Endpoint;

use App\Lib\UrlBuilder\UrlBuilder;

use PHPUnit\Framework\TestCase;

class UrlBuilderTest extends TestCase
{
    protected function setUp(): void {}
    public function test_build_onePathVariable()
    {
        $urlTemplate = 'https://www.url.com/{stock}';
        $params = ['stock' => 'AAPL'];
        $urlBuilder = new UrlBuilder($urlTemplate, $params);

        $actualUrl = $urlBuilder->build($urlTemplate, $params);

        $expectedUrl = 'https://www.url.com/AAPL';

        $this->assertEquals($expectedUrl, $actualUrl);
    }

    public function test_build_twoPathVariables()
    {
        $urlTemplate = 'https://www.url.com/{stock}/{date}';
        $params = ['stock' => 'AAPL', 'date' => '2022-03-03'];
        $urlBuilder = new UrlBuilder($urlTemplate, $params);

        $actualUrl = $urlBuilder->build($urlTemplate, $params);

        $expectedUrl = 'https://www.url.com/AAPL/2022-03-03';

        $this->assertEquals($expectedUrl, $actualUrl);
    }

    public function test_build_oneQueryParam()
    {
        $urlTemplate =
            'https://www.url.com/';
        $params = ['stock' => 'AAPL'];
        $urlBuilder = new UrlBuilder($urlTemplate, $params);

        $actualUrl = $urlBuilder->build($urlTemplate, $params);

        $expectedUrl = 'https://www.url.com/?stock=AAPL';

        $this->assertEquals($expectedUrl, $actualUrl);
    }

    public function test_getPathParams()
    {
        $urlTemplate = 'https://www.url.com/{stock}/{date}';
        $params = ['stock' => 'AAPL', 'date' => '2022-03-03', 'state' => 'active'];
        $urlBuilder = new UrlBuilder($urlTemplate, $params);

        $actualPathParams = $urlBuilder->getPathParams();

        $expectedParamsPath = ['stock' => 'AAPL', 'date' => '2022-03-03'];

        $this->assertEquals($expectedParamsPath, $actualPathParams);
    }

    public function test_getQueryParams()
    {
        $urlTemplate = 'https://www.url.com/{stock}/{date}';
        $params = ['stock' => 'AAPL', 'date' => '2022-03-03', 'state' => 'active'];
        $urlBuilder = new UrlBuilder($urlTemplate, $params);

        $actualQueryParams = $urlBuilder->getQueryParams();

        $expectedQueryParams = ['state' => 'active'];

        $this->assertEquals($expectedQueryParams, $actualQueryParams);
    }
}
