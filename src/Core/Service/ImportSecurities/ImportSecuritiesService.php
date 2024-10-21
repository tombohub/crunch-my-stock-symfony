<?php

namespace App\Core\Service\ImportSecurities;

class ImportSecuritiesService
{
    public function __construct(private SecuritiesDataProviderInterface $dataProvider) {}
    public function run()
    {
        $this->dataProvider->getData();
    }
}
