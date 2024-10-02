<?php

namespace App\Tests\DataProvider;

use App\DataProvider\DataFilesService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

class DataFilesServiceTest extends KernelTestCase
{
    private DataFilesService $dataFilesService;
    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();
        $filesystem = $container->get(Filesystem::class);

        $projectDir = $kernel->getProjectDir();
        $tempDir = Path::join($projectDir, 'var', 'tmp', 'data');
        $this->dataFilesService = new DataFilesService($tempDir, $filesystem);
    }


    public function testDataFolderExists(): void

    {
        $this->assertTrue($this->dataFilesService->dataFolderExists());
    }
}
