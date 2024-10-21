<?php

namespace App\Core\Service\ImportSecurities;

use App\Core\Service\ImportSecurities\SecurityDto;

/**
 * Defines the contract for a data provider that supplies security data.
 */
interface SecuritiesDataProviderInterface
{
    /**
     * Retrieves security data.
     *
     * @return SecurityDto The data transfer object containing security information.
     */
    public function getData(): SecurityDto;
}
