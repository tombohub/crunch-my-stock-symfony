<?php

namespace App\Lib\UrlBuilder;


class UrlBuilder
{
    /**
     * params belonging to the path portion of the url
     * @var array<string, string>
     */
    private array $pathParams;

    /**
     * params belonging to the query
     * @var array<string, string>
     */
    private array $queryParams;

    public function __construct(string $urlTemplate, array $params)
    {
        $this->pathParams = $this->filterPathParams($urlTemplate, $params);
    }
    public function build(string $urlTemplate, array $params): string
    {
        $url = $this->expandUrlPath($urlTemplate, $params);
        return $url;
    }

    public function getPathParams()
    {
        return $this->pathParams;
    }

    public function getQueryParams()
    {
        return $this->queryParams;
    }


    /**
     * Expands the url path template
     *
     * Replaces placeholders in url path portion with values from params array.
     * It replaces all occurences of placeholders.
     * Placeholder has to be inside `{}` braces.
     *
     * `url.com/{stock}` => `url.com/AAPL`
     *
     * @param string $urlTemplate url template with placeholder
     * @param array<string, string> $params params in form of associative array `['stock' => 'AAPL']`
     * @return string url with replaced placeholders
     */
    private function expandUrlPath(string $urlTemplate, array $params): string
    {
        $expandedUrlPath = $urlTemplate;
        foreach ($params as $key => $value) {
            $expandedUrlPath = str_replace('{' . $key . '}', $value, $expandedUrlPath);
        }
        return $expandedUrlPath;
    }

    private function extractQueryPortion(string $urlTemplate)
    {
        $query = parse_url($urlTemplate, PHP_URL_QUERY);
    }

    /**
     * Filters the $params array to include only the keys present in the placeholders of the $urlTemplate.
     *
     * @param string $urlTemplate URL template with placeholders
     * @param array<string, string> $params Params in the form of an associative array
     * @return array<string, string> Filtered array of key-value pairs
     */
    private function filterPathParams(string $urlTemplate, array $params): array
    {
        $placeholderNames = $this->getPlaceholderNames($urlTemplate);
        $pathParams = $this->filterArrayByKeys($params, $placeholderNames);
        return $pathParams;
    }




    /**
     * Filters an array to include only the keys present in the specified keys array.
     *
     * @param array<string, string> $array The array to be filtered
     * @param array<string> $keys The keys to filter by
     * @return array<string, string> The filtered array containing only the specified keys
     */
    private function filterArrayByKeys(array $array, array $keys)
    {
        $filteredArray = array_filter(
            $array,
            fn($key) =>
            in_array($key, $keys),
            ARRAY_FILTER_USE_KEY
        );
        return $filteredArray;
    }
}
