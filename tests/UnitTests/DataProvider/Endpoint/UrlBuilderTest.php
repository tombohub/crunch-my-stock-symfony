<?php

namespace App\Tests\UnitTests\DataProvider\Endpoint;

use App\DataProvider\Endpoint\UrlBuilder;

use PHPUnit\Framework\TestCase;
use ReflectionClass;

class UrlBuilderTest extends TestCase
{
    public function test()
    {
        $urlBuilder = new UrlBuilder;
        $urlTemplate = 'https://www.url.com/{stock}';
        $params = ['stock' => 'AAPL'];
        $actualUrl = $urlBuilder->build($urlTemplate, $params);

        $expectedUrl = 'https://www.url.com/AAPL';

        $this->assertEquals($expectedUrl, $actualUrl);
    }
}
