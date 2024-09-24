<?php

namespace App\Core\Domain;

class Security
{
    public function __construct(
        public Symbol $symbol,
        public string $name,
        public Exchange $exchange,
        public SecurityType $type,
        public \DateTime $ipoDate,
        public ?\DateTime $delistingDate,
        public TradingStatus $status,
    ) {}
}
