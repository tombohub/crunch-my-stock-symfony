<?php

namespace App\DataProvider;

use App\Core\Service\ImportSecurities\SecuritiesDataProviderInterface;
use App\Core\Service\ImportSecurities\SecurityDto;
use App\DataProvider\DataSource\Alphavantage\AlphavantageClient;
use Exception;

class SecuritiesDataProvider implements SecuritiesDataProviderInterface
{
    public function __construct(private AlphavantageClient $alphavantageProvider) {}

    /** {@inheritdoc} */
    public function getData(): SecurityDto
    {
        echo "getting securities data. not implemented";
        throw new Exception("Data provider not implemented");
    }
}
