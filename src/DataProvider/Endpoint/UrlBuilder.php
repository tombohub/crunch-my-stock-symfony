<?php

namespace App\DataProvider\Endpoint;


class UrlBuilder
{
    public function build(string $urlTemplate, array $params): string
    {
        $url = $this->expandUrlPath($urlTemplate, $params);
        return $url;
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
     * @param array $params params in form of associative array `['stock' => 'AAPL']`
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
}
