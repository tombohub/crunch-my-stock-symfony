<?php

namespace App\DataProvider\Endpoint;

/**
 * Type of url param to use for endpoint urls
 */
enum ParamType
{
    /**
     * param located in path portion of url,
     * `api/v1/stocks/{param}`
     */
    case PATH;

    /**
     * param located in query portion of url,
     * `...AAPL?date={param}`
     */
    case QUERY;
}
