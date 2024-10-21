<?php

namespace App\DataProvider\DataSource;


/**
 * Posible response data formats
 */
enum ResponseDataFormat: string
{
    case JSON = 'json';
    case CSV = 'csv';
}
