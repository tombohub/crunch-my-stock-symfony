<?php

namespace App\Tests\DataProvider\Endpoint;

use PHPUnit\Framework\TestCase;
use App\DataProvider\Endpoint\ListingDelistingStatusEndpoint;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ListingDelistingStatusEndpointTest extends KernelTestCase
{
    public function testGetMethod()
    {
        $endpoint = self::getContainer()->get(ListingDelistingStatusEndpoint::class);
        $endpoint->get();
    }
}
