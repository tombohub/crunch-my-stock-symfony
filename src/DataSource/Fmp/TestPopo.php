<?php

namespace App\DataSource\Fmp;

class TestPopo
{
    public function __construct(

        public string $symbol,
        public string $name,
        public string $currency,
        public string $stockExchange,
        public string $exchangeShortName
    ) {}
}
