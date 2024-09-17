<?php

namespace App\DataSource\Fmp;

use App\DataSource\Fmp\TestPopo;
use Symfony\Component\Serializer\SerializerInterface;

class FmpApiService
{
    public function __construct(private FmpApiClient $apiClient, private SerializerInterface $serializer) {}
    public function test()
    {
        $response = $this->apiClient->get('https://financialmodelingprep.com/api/v3/symbol/available-indexes');
        $content = $response->getContent();
        $obj = $this->deserializeJson(json: $content, type: TestPopo::class, isArray: true);
        return $obj;
    }

    /**
     * Deserializes a JSON string into an object or an array of objects.
     *
     * This method uses Symfony's Serializer to convert a JSON string into a PHP object
     * of the specified type. If the $isArray flag is set to true, the JSON is
     * deserialized into an array of objects of the specified type.
     *
     * @param string $json The JSON string to deserialize.
     * @param string $type The fully qualified class name of the object type to deserialize into.
     * @param bool $isArray (optional) Set to true if the JSON represents an array of objects. Defaults to false.
     *
     * @return mixed The deserialized object or array of objects.
     */
    private function deserializeJson(string $json, string $type, bool $isArray = false)
    {
        $type = $isArray ? $type . '[]' : $type;
        return $this->serializer->deserialize(data: $json, type: $type, format: 'json');
    }
}
