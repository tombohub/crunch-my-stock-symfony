<?php

namespace App\DataProvider\DataSource\Alphavantage;

use App\DataProvider\DataSource\Alphavantage\Endpoint\ListingDelistingStatusEndpoint;
use Doctrine\ORM\Cache\Exception\FeatureNotImplemented;

/**
 *
 * This class provides methods to interact with the Alphavantage API
 * to fetch securities data.
 */
class AlphavantageClient
{
    /**
     * AlphavantageProvider constructor.
     *
     * @param array $listingDelistingStatusEndpoint The endpoint to fetch listing and delisting statuses.
     */
    public function __construct(private ListingDelistingStatusEndpoint $listingDelistingStatusEndpoint) {}

    /**
     * Get securities by trading status.
     *
     * This method fetches trading status securities data from the listing/delisting status endpoint.
     *
     * @return ListingDelistingStatusData[] An array of ListingDelistingStatusResponse
     */
    public function getSecurities(): array
    {
        throw new FeatureNotImplemented();
    }
}
