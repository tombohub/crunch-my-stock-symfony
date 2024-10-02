<?php

namespace App\Core\Service;

use App\Core\Interface\DataProviderInterface;
use App\DataProvider\DataProvider;
use App\Service\DataProviderService;
use Psr\Log\LoggerInterface;

class DataImportService
{
    public function __construct(private DataProviderInterface $dataProvider, private LoggerInterface $logger) {}

    public function updateSecurities()
    {
        try {
            $this->logger->info('this is a log');
            $securitiesData = $this->dataProvider->getSecurities();
            return $securitiesData;
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit(1);
        }
    }
}
