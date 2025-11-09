<?php

namespace Tests;

use App\StringHelper;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for StringHelper class
 */
class StringHelperTest extends TestCase
{
    private StringHelper $helper;

    protected function setUp(): void
    {
        $this->helper = new StringHelper();
    }

    public function testCanReverseString(): void
    {
        $result = $this->helper->reverse("hello");
        $this->assertEquals("olleh", $result);
    }

    public function testCanReverseEmptyString(): void
    {
        $result = $this->helper->reverse("");
        $this->assertEquals("", $result);
    }

    public function testCanConvertToUpperCase(): void
    {
        $result = $this->helper->toUpperCase("hello world");
        $this->assertEquals("HELLO WORLD", $result);
    }

    public function testCanConvertToLowerCase(): void
    {
        $result = $this->helper->toLowerCase("HELLO WORLD");
        $this->assertEquals("hello world", $result);
    }

    public function testCanDetectPalindrome(): void
    {
        $this->assertTrue($this->helper->isPalindrome("racecar"));
        $this->assertTrue($this->helper->isPalindrome("A man a plan a canal Panama"));
        $this->assertTrue($this->helper->isPalindrome("Was it a car or a cat I saw"));
    }

    public function testCanDetectNonPalindrome(): void
    {
        $this->assertFalse($this->helper->isPalindrome("hello"));
        $this->assertFalse($this->helper->isPalindrome("world"));
    }

    public function testCanCountWords(): void
    {
        $result = $this->helper->wordCount("Hello world from PHP");
        $this->assertEquals(4, $result);
    }

    public function testCanCountWordsInEmptyString(): void
    {
        $result = $this->helper->wordCount("");
        $this->assertEquals(0, $result);
    }

    public function testCanTruncateString(): void
    {
        $result = $this->helper->truncate("This is a long string", 10);
        $this->assertEquals("This is a ...", $result);
    }

    public function testTruncateDoesNotAffectShortStrings(): void
    {
        $result = $this->helper->truncate("Short", 10);
        $this->assertEquals("Short", $result);
    }

    public function testCanTruncateWithCustomSuffix(): void
    {
        $result = $this->helper->truncate("This is a long string", 10, "---");
        $this->assertEquals("This is a ---", $result);
    }
}