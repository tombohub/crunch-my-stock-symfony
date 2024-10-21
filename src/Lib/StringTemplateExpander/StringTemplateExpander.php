<?php

namespace App\Lib\StringTemplateExpander;

use InvalidArgumentException;

class StringTemplateExpander
{
    private const LEFT_DELIMITER = '{';
    private const RIGHT_DELIMITER = '}';

    private string $template;

    /**
     * @var array<int, string>
     */
    private array $mapping;

    private function __construct(string $template, array $mapping)
    {
        $this->template = $template;
        $this->mapping = $mapping;
    }

    private function instanceExpand(): string
    {
        foreach ($this->mapping as $placeholder => $value) {
            if (is_string($value)) {
                $this->template = str_replace(self::LEFT_DELIMITER . $placeholder . self::RIGHT_DELIMITER, $value, $this->template);
            } else {
                throw new InvalidArgumentException("value:$value of key:$placeholder is not a string");
            }
        }
        return $this->template;
    }

    public static function expand(string $template, array $mapping)
    {

        return (new StringTemplateExpander($template, $mapping))->instanceExpand($template);
    }
}
