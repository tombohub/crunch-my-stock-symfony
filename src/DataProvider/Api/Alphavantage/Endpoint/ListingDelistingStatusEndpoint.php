<?php

namespace App\DataProvider\Api\Alphavantage\Endpoint;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use App\DataProvider\Api\Alphavantage\Endpoint\ListingDelistingStatusResponse;

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
     * @return string data in form of csv
     *
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getActive(): string
    {
        return $this->getByStatus('active');
    }

    /**
     * Request for securities with status delisted and no longer trading on exchange market.
     *
     * @return string retrieved data in form of csv
     *
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getDelisted(): string
    {
        return $this->getByStatus('delisted');
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
        /** @var array<int, ListingDelistingStatusResponse> $data * */
        $data = $this->serializer->deserialize($content, self::RESPONSE_DTO . '[]', 'csv');

        return $data;
    }

    /**
     * Get securities by their status on market exchange.
     *
     * @param 'active'|'delisted' $status
     *
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    private function getByStatus(string $status)
    {
        $params = ['state' => $status];
        $response = $this->apiClient->get(self::BASE_URL, $params);

        return $response->getContent();
    }
}
