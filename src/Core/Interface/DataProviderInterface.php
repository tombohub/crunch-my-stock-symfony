<?php

namespace App\Core\Interface;

use App\Core\Dto\SecurityDto;

interface DataProviderInterface
{
    /**
     * Get securities data.
     *
     * @return SecurityDto[]
     */
    public function getSecurities(): array;
}
