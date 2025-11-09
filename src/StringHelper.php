<?php

namespace App;

/**
 * String manipulation helper class
 */
class StringHelper
{
    /**
     * Reverse a string
     *
     * @param string $str Input string
     * @return string Reversed string
     */
    public function reverse(string $str): string
    {
        return strrev($str);
    }

    /**
     * Convert string to uppercase
     *
     * @param string $str Input string
     * @return string Uppercase string
     */
    public function toUpperCase(string $str): string
    {
        return strtoupper($str);
    }

    /**
     * Convert string to lowercase
     *
     * @param string $str Input string
     * @return string Lowercase string
     */
    public function toLowerCase(string $str): string
    {
        return strtolower($str);
    }

    /**
     * Check if string is palindrome
     *
     * @param string $str Input string
     * @return bool True if palindrome, false otherwise
     */
    public function isPalindrome(string $str): bool
    {
        $cleaned = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $str));
        return $cleaned === strrev($cleaned);
    }

    /**
     * Count words in string
     *
     * @param string $str Input string
     * @return int Number of words
     */
    public function wordCount(string $str): int
    {
        return str_word_count($str);
    }

    /**
     * Truncate string to specified length
     *
     * @param string $str Input string
     * @param int $length Maximum length
     * @param string $suffix Suffix to append
     * @return string Truncated string
     */
    public function truncate(string $str, int $length, string $suffix = '...'): string
    {
        if (strlen($str) <= $length) {
            return $str;
        }
        return substr($str, 0, $length) . $suffix;
    }
}