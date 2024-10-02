<?php

namespace App\DataProvider\Endpoint;

class UrlBuilder
{
    public function build(string $urlTemplate, array $params): string
    {
        $interpolated = $this->interpolateUrlPathParams($urlTemplate, $params);
        return $interpolated;
    }

    private function interpolateUrlPathParams(string $urlTemplate, array $params)
    {
        foreach ($params as $key => $value) {
            $interpolated = str_replace('{' . $key . '}', $value, $urlTemplate);
        }
        return $interpolated;
    }
}
