<?php

namespace App\DataProvider\Alphavantage\Endpoint;

/**
 * Class ListingDelistingStatusEndpoint.
 *
 * This class interacts with the Alphavantage API to fetch listing and delisting statuses.
 */
class ListingDelistingStatusEndpoint extends AbstractAlphavantageEndpoint
{
    /**
     * Base URL for listing/delisting status API endpoint.
     *
     * @var string
     */
    private const string BASE_URL = 'https://www.alphavantage.co/query?function=LISTING_STATUS';

    /**
     * DTO class to deserialize responses into.
     *
     * @var class-string<ListingDelistingStatusResponse>
     */
    private const string RESPONSE_DTO = ListingDelistingStatusResponse::class;

    /**
     * Request for securities with status active on exchange market.
     *
     * @return array<int, ListingDelistingStatusResponse> an array of DTOs representing retrieved data
     */
    public function getActive(): array
    {
        $params = ['state' => 'active'];
        $response = $this->apiClient->get(self::BASE_URL, $params);
        $content = $response->getContent();
        $data = $this->deserializeCsvArray($content);

        return $data;
    }

    /**
     * Request for securities with status delisted and no longer trading on exchange market.
     *
     * @return array<int, ListingDelistingStatusResponse> an array of DTOs representing retrieved data
     */
    public function getDelisted(): array
    {
        $params = ['state' => 'delisted'];
        $response = $this->apiClient->get(self::BASE_URL, $params);
        $content = $response->getContent();
        $data = $this->deserializeCsvArray($content);

        return $data;
    }

    /**
     * Get all securities, active and delisted together.
     *
     * @return array<int, ListingDelistingStatusResponse> data
     */
    public function getAll(): array
    {
        $statusActive = $this->getActive();
        $statusDelisted = $this->getDelisted();
        $data = array_merge($statusActive, $statusDelisted);

        return $data;
    }

    /**
     * Deserializes CSV content into an array of DTO objects.
     *
     * This method deserializes the provided CSV content into an array of objects
     * of the type defined by the `$responseDto` class.
     *
     * @param string $content the CSV content to be deserialized
     *
     * @return array<int, ListingDelistingStatusResponse> an array of deserialized DTO objects
     */
    private function deserializeCsvArray(string $content): array
    {
        /** @var array<int, ListingDelistingStatusResponse> $data */
        $data = $this->serializer->deserialize($content, self::RESPONSE_DTO.'[]', 'csv');

        return $data;
    }
}
