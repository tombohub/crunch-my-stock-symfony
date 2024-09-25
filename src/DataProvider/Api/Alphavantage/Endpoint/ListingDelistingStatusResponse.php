<?php

namespace App\DataProvider\Api\Alphavantage\Endpoint;

readonly class ListingDelistingStatusResponse
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $exchange,
        public string $assetType,
        public string $ipoDate,
        public string $delistingDate,
        public string $status

    ) {}
}
