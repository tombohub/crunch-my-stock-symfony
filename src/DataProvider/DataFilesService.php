<?php

namespace App\DataProvider;

use Symfony\Component\Filesystem\Filesystem;

/**
 * Dealing with files and folders where downloaded data is temporarly stored
 * @package App\DataProvider
 */
class DataFilesService
{
    public function __construct(private string $dataFolderPath, private Filesystem $filesystem) {}

    public function dataFolderExists()
    {
        return $this->filesystem->exists($this->dataFolderPath);
    }

    public function createDataFolder()
    {
        $this->filesystem->mkdir($this->dataFolderPath);
    }
}
