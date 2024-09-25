<?php

namespace App\DataProvider;

use App\Core\Dto\SecurityDto;
use App\Core\Interface\DataProviderInterface;
use App\DataProvider\Api\Alphavantage\AlphavantageProvider;

/**
 * 3rd party Api implementation of Data Provider.
 * @package App\DataProvider
 */
readonly class ApiProviderService implements DataProviderInterface
{
    public function __construct(private AlphavantageProvider $alphavantageProvider) {}


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
                status: $item->status
            );
            $securityDtos[] = $securityDto;
        }

        return $securityDtos;
    }
}
