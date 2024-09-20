<?php

namespace App\Service;

use App\Core\Dto\SecurityDto;
use App\Core\Interface\DataProviderInterface;
use App\DataProvider\Alphavantage\AlphavantageProvider;

readonly class DataProviderService implements DataProviderInterface
{
    public function __construct(private AlphavantageProvider $alphavantageProvider)
    {
    }


    /**
     *
     * @return SecurityDto[]
     */
    public function getSecurities(): array
    {
        $responseData = $this->alphavantageProvider->getSecurities();
        $securityDtos = [];
        foreach ($responseData as $item) {
            $securityDto = new SecurityDto(
                symbol: $item->symbol,
                name: $item->name,
                exchange: $item->exchange,
                type: $item->assetType,
                ipoDate: $item->ipoDate,
                delistingDate: $item->delistingDate,
                status: $item->status);
            $securityDtos[] = $securityDto;
        }

        return $securityDtos;
    }
}
