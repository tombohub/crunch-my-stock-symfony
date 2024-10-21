<?php

namespace App\DataProvider\DataSource\Alphavantage\Endpoint;

use App\DataProvider\DataSource\Alphavantage\Endpoint\AbstractAlphavantageEndpoint;

class ListingDelistingStatusEndpoint extends AbstractAlphavantageEndpoint
{
    private const string URL_TEMPLATE = 'https://www.alphavantage.co/query?function=LISTING_STATUS';


    public function get(array $params)
    {
        $params = http_build_query($params);
        $url = self::URL_TEMPLATE;
        print_r($url);
    }
}
