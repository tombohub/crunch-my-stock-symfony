<?php

namespace App\Tests\UnitTests\Lib\UrlBuilder;

use App\Lib\UrlBuilder\StringTemplate;
use PHPUnit\Framework\TestCase;

class StringTemplateTest extends TestCase
{
    public function test_getVariableNames_oneVariable()
    {
        $string = 'url.com/{stoc}';
        $stringTemplate = new StringTemplate($string);

        $actualVariableNames = $stringTemplate->getVariableNames();

        $expectedVariableNames = ['stock'];

        $this->assertEquals($expectedVariableNames, $actualVariableNames);
    }
    public function test_getVariableNames_twoVariables()
    {
        $string = 'url.com/{stock}/{date}';
        $stringTemplate = new StringTemplate($string);

        $actualVariableNames = $stringTemplate->getVariableNames();

        $expectedVariableNames = ['stock', 'date'];

        $this->assertEquals($expectedVariableNames, $actualVariableNames);
    }
}
