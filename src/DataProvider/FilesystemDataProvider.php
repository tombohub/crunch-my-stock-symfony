<?php

namespace App\DataProvider;

use App\Core\Interface\DataProviderInterface;
use RuntimeException;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\HttpKernel\KernelInterface;

class FilesystemDataProvider implements DataProviderInterface
{
    private const string DATA_FOLDER = 'data';
    public function __construct(private KernelInterface $kernel) {}

    public function getSecurities(): array
    {
        $projectDir = $this->kernel->getProjectDir();
        $dataFilePath = Path::join($projectDir, self::DATA_FOLDER);
    }

    private function getSecuritiesDataFileContent() {}
}
