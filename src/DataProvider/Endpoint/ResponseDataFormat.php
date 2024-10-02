<?php

namespace App\DataProvider\Endpoint;


/**
 * Posible response data formats
 */
enum ResponseDataFormat: string
{
    case JSON = 'json';
    case CSV = 'csv';
}
