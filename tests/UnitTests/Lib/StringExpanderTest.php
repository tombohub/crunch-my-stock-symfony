<?php

namespace App\Tests\UnitTests\Lib;

use PHPUnit\Framework\TestCase;
use App\Lib\StringTemplateExpander\StringTemplateExpander;
use InvalidArgumentException;

/**
 * Tests for the StringExpander class.
 *
 * Partitions:
 * - Basic Replacement: Test simple placeholder replacements.
 * - Multiple Placeholders: Test templates with multiple placeholders.
 * - No Placeholders: Test templates without any placeholders.
 * - Unused Placeholders: Test mappings that contain placeholders not present in the template.
 * - Empty Template: Test an empty template string.
 * - Empty Mappings: Test with an empty mappings array.
 * - Special Characters: Test placeholders and values with special characters.
 * - Nested Placeholders: Test placeholders that might appear within other placeholders.
 * - Repeated Placeholders: Test templates with repeated placeholders.
 * - Null and Boolean Values: Test mappings with null and boolean values.
 */
class StringExpanderTest extends TestCase
{

    /**
     * Basic Replacement: Test simple placeholder replacements.
     */
    public function testBasicReplacement()
    {
        $template = "Hello, {name}!";
        $mappings = ['name' => 'John'];
        $result = StringTemplateExpander::expand($template, $mappings);
        $this->assertEquals("Hello, John!", $result);
    }

    /**
     * Multiple Placeholders: Test templates with multiple placeholders.
     */
    public function testMultiplePlaceholders()
    {
        $template = "Hello, {name}! Welcome to {place}.";
        $mappings = ['name' => 'John', 'place' => 'Wonderland'];
        $result = StringTemplateExpander::expand($template, $mappings);
        $this->assertEquals("Hello, John! Welcome to Wonderland.", $result);
    }

    /**
     * No Placeholders: Test templates without any placeholders.
     */
    public function testNoPlaceholders()
    {
        $template = "Hello, World!";
        $mappings = ['name' => 'John'];
        $result = StringTemplateExpander::expand($template, $mappings);
        $this->assertEquals("Hello, World!", $result);
    }

    /**
     * Unused Placeholders: Test mappings that contain placeholders not present in the template.
     */
    public function testUnusedPlaceholders()
    {
        $template = "Hello, {name}!";
        $mappings = ['name' => 'John', 'place' => 'Wonderland'];
        $result = StringTemplateExpander::expand($template, $mappings);
        $this->assertEquals("Hello, John!", $result);
    }

    /**
     * Empty Template: Test an empty template string.
     */
    public function testEmptyTemplate()
    {
        $template = "";
        $mappings = ['name' => 'John'];
        $result = StringTemplateExpander::expand($template, $mappings);
        $this->assertEquals("", $result);
    }

    /**
     * Empty Mappings: Test with an empty mappings array.
     */
    public function testEmptyMappings()
    {
        $template = "Hello, {name}!";
        $mappings = [];
        $result = StringTemplateExpander::expand($template, $mappings);
        $this->assertEquals("Hello, {name}!", $result);
    }

    /**
     * Special Characters: Test placeholders and values with special characters.
     */
    public function testSpecialCharacters()
    {
        $template = "Hello, {name}! Your password is {password}.";
        $mappings = ['name' => 'John', 'password' => 'P@##w0rd!'];
        $result = StringTemplateExpander::expand($template, $mappings);
        $this->assertEquals("Hello, John! Your password is P@##w0rd!.", $result);
    }

    /**
     * Nested Placeholders: Test placeholders that might appear within other placeholders.
     */
    public function testNestedPlaceholders()
    {
        $template = "Hello, {name{suffix}}!";
        $mappings = ['name{suffix}' => 'John'];
        $result = StringTemplateExpander::expand($template, $mappings);
        $this->assertEquals("Hello, John!", $result);
    }

    /**
     * Repeated Placeholders: Test templates with repeated placeholders.
     */
    public function testRepeatedPlaceholders()
    {
        $template = "{greeting}, {name}! {greeting} again, {name}!";
        $mappings = ['greeting' => 'Hello', 'name' => 'John'];
        $result = StringTemplateExpander::expand($template, $mappings);
        $this->assertEquals("Hello, John! Hello again, John!", $result);
    }

    /**
     * Null and Boolean Values: Test mappings with null and boolean values.
     */
    public function testNullAndBooleanValues()
    {
        $template = "Value is {value}.";

        // Test for null value
        $mappings = ['value' => null];
        $this->expectException(InvalidArgumentException::class);
        StringTemplateExpander::expand($template, $mappings);

        // Test for boolean true value
        $mappings = ['value' => true];
        $this->expectException(InvalidArgumentException::class);
        StringTemplateExpander::expand($template, $mappings);

        // Test for boolean false value
        $mappings = ['value' => false];
        $this->expectException(InvalidArgumentException::class);
        StringTemplateExpander::expand($template, $mappings);
    }
}
