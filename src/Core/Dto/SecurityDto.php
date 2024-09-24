<?php

namespace App\Core\Dto;

class SecurityDto
{
    public function __construct(
        public string $symbol,
        public string $name,
        public string $exchange,
        public string $type,
        public string $ipoDate,
        public string $delistingDate,
        public string $status,
    ) {
    }
}
