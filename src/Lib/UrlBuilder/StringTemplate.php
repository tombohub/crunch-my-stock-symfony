<?php

namespace App\Lib\UrlBuilder;

class StringTemplate
{

    /**
     * Array of placeholder variable names `{stock} -> ['stock']`
     * @var array<string>
     */
    private array $variableNames;
    public function __construct(string $template)
    {
        $this->variableNames = $this->parseVariableNames($template);
    }
    public function getVariableNames()
    {
        return $this->variableNames;
    }

    /**
     * Extracts the names of the placeholders in the string template.
     * Placeholders are inside curly braces => `{stock}`
     *
     * @param string $template string template with placeholders
     * @return array<string> Array of placeholder names
     */
    private function parseVariableNames(string $template): array
    {
        preg_match_all('/\{(\w+)\}/', $template, $matches);
        return $matches[1];
    }
}
