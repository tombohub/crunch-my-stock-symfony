<?php

namespace App\Core\Domain;

/**
 * Stock Exchanges
 */
enum Exchange: string {
    case NYSE = 'nyse';
    case NASDAQ = 'nasdaq';
}