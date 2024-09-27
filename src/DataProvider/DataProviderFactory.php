<?php

namespace App\DataProvider;

use App\Core\Interface\DataProviderInterface;

/**
 * Factory class to create data provider instances based on the specified type.
 *
 * @package App\DataProvider
 */
class DataProviderFactory
{
    /**
     * DataProviderFactory constructor.
     *
     * @param ApiDataProvider $apiDataProvider The API data provider instance.
     * @param FilesystemDataProvider $filesystemDataProvider The filesystem data provider instance.
     */
    public function __construct(
        private ApiDataProvider $apiDataProvider,
        private FilesystemDataProvider $filesystemDataProvider,
    ) {}

    /**
     * Creates a data provider instance based on the specified type.
     *
     * @param string $dataProviderType The type of data provider to create ('api' or 'filesystem').
     * @return DataProviderInterface The created data provider instance.
     * @throws \InvalidArgumentException If the specified data provider type is invalid.
     *
     */
    public function create(string $dataProviderType): DataProviderInterface
    {
        return match ($dataProviderType) {
            'api' => $this->apiDataProvider,
            'filesystem' => $this->filesystemDataProvider,
            default => throw new \InvalidArgumentException("Invalid data provider type $dataProviderType. Supported types are [api, filesystem]"),
        };
    }
}
