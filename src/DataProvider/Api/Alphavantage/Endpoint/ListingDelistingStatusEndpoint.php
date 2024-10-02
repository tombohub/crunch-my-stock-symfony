<?php

namespace App\DataProvider\Api\Alphavantage\Endpoint;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use App\DataProvider\Api\Alphavantage\Endpoint\ListingDelistingStatusData;
use Exception;

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
     * Data class to deserialize responses into.
     *
     * @var class-string<ListingDelistingStatusData>
     */
    private const string DATA_CLASS = ListingDelistingStatusData::class;

    /**
     * Request for securities with status active on exchange market.
     *
     * @return ListingDelistingStatusData[] data
     *
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getActive(): array
    {
        return $this->getByStatus('active');
    }

    /**
     * Request for securities with status delisted and no longer trading on exchange market.
     *
     * @return ListingDelistingStatusData[] retrieved data in form of csv
     *
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getDelisted(): array
    {
        return $this->getByStatus('delisted');
    }

    /**
     * Get all securities, active and delisted together.
     *
     * @return array<int, ListingDelistingStatusData> data
     */
    public function getAll(): array
    {
        $statusActive = $this->getActive();
        $statusDelisted = $this->getDelisted();
        $data = array_merge($statusActive, $statusDelisted);

        return $data;
    }

    /**
     * Get securities by their status on market exchange.
     *
     * @param 'active'|'delisted' $status
     *
     * @return ListingDelistingStatusData[] data of endpoint
     *
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    private function getByStatus(string $status): array
    {
        $params = ['state' => $status];
        $response = $this->apiClient->get(self::BASE_URL, $params);
        $content = $response->getContent();
        $data = $this->appSerializer->csvToArrayOfObjects($content, self::DATA_CLASS);
        $errors = $this->validator->validate($data);
        if (count($errors) === 0) {
            $errorString = (string) $errors;
            throw new Exception($errorString);
        }
        return $data;
    }
}
