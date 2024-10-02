<?php

namespace App\DataProvider\Endpoint;

use App\DataProvider\Endpoint\AlphavantageEndpoint;
use App\DataProvider\Endpoint\ResponseDataFormat;
use App\DataProvider\Endpoint\ListingDelistingStatusParams;

class ListingDelistingStatusEndpoint extends AlphavantageEndpoint
{
    private const string URL_TEMPLATE = 'https://www.alphavantage.co/query?function=LISTING_STATUS';

    private const ResponseDataFormat DATA_FORMAT = ResponseDataFormat::CSV;



    public function get(string $state)
    {
        $params = http_build_query(['state' => $state]);
        $url = self::URL_TEMPLATE;
        print_r($url);
    }
}
