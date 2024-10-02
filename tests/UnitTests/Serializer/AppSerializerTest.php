<?php

namespace App\Tests\Serializer;

use App\Serializer\AppSerializer;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Serializer\SerializerInterface;

class AppSerializerTest extends KernelTestCase
{
    private AppSerializer $appSerializer;

    protected function setUp(): void
    {
        $container = static::getContainer();
        $serializer = $container->get(SerializerInterface::class);
        $this->appSerializer = new AppSerializer($serializer);
    }

    public function testCsvToArrayOfObjects()
    {
        $csv = '';
        $deserialized = $this->appSerializer->csvToArrayOfObjects($csv, Dto::class);
        $this->assertCount(3, [1, 2, 3]);
    }
}

readonly class Dto
{
    public function __construct(public string $name, public int $age) {}
}
