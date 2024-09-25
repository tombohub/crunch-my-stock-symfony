<?php

namespace App\DataProvider;

use App\Core\Dto\SecurityDto;
use App\Core\Interface\DataProviderInterface;
use App\DataProvider\Api\Alphavantage\AlphavantageProvider;

/**
 * Class ApiProviderService
 *
 * Implementation of DataProviderInterface that fetches securities data from a third-party API.
 *
 *
 * @package App\DataProvider
 */
readonly class ApiProviderService implements DataProviderInterface
{
    /**
     * ApiProviderService constructor.
     *
     * @param AlphavantageProvider $alphavantageProvider The provider to fetch securities data from the Alphavantage API.
     */
    public function __construct(private AlphavantageProvider $alphavantageProvider) {}

    /**
     * Retrieves securities data from the Alphavantage API and maps it to an array of SecurityDto objects.
     *
     * @return SecurityDto[] An array of SecurityDto instances containing securities data.
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
