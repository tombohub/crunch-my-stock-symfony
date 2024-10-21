<?php

namespace App\DataProvider\DataSource\Alphavantage\Endpoint\ListingDelistingStatus;

use Symfony\Component\Validator\Constraints as Assert;

readonly class ListingDelistingStatusData
{
    public function __construct(
        #[Assert\NotBlank()]
        public string $symbol,

        #[Assert\NotBlank()]
        public string $name,

        #[Assert\NotBlank()]
        public string $exchange,

        #[Assert\NotBlank()]
        public string $assetType,

        #[Assert\NotBlank()]
        public string $ipoDate,

        #[Assert\NotBlank()]
        public string $delistingDate,

        #[Assert\NotBlank()]
        public string $status

    ) {}
}
