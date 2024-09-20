<?php

namespace App\DataProvider\Alphavantage;

use App\DataProvider\Alphavantage\Endpoint\ListingDelistingStatusEndpoint;
use App\DataProvider\Alphavantage\Endpoint\ListingDelistingStatusResponse;

/**
 * Class AlphavantageProvider
 *
 * This class provides methods to interact with the Alphavantage API
 * to fetch securities data.
 */
class AlphavantageProvider
{
    /**
     * AlphavantageProvider constructor.
     *
     * @param ListingDelistingStatusEndpoint $listingDelistingStatusEndpoint The endpoint to fetch listing and delisting statuses.
     */
    public function __construct(private ListingDelistingStatusEndpoint $listingDelistingStatusEndpoint) {}

    /**
     * Get all securities data.
     *
     * This method fetches all securities data from the listing/delisting status endpoint.
     *
     * @return ListingDelistingStatusResponse[] An array of ListingDelistingStatusResponse objects representing the securities data.
     */
    public function getSecurities(): array
    {
        return $this->listingDelistingStatusEndpoint->getAll();
    }
}
