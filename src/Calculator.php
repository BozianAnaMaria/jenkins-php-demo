<?php

namespace App;

/**
 * Simple Calculator class for demonstration
 */
class Calculator
{
    /**
     * Add two numbers
     *
     * @param float $a First number
     * @param float $b Second number
     * @return float Sum of two numbers
     */
    public function add(float $a, float $b): float
    {
        return $a + $b;
    }

    /**
     * Subtract two numbers
     *
     * @param float $a First number
     * @param float $b Second number
     * @return float Difference of two numbers
     */
    public function subtract(float $a, float $b): float
    {
        return $a - $b;
    }

    /**
     * Multiply two numbers
     *
     * @param float $a First number
     * @param float $b Second number
     * @return float Product of two numbers
     */
    public function multiply(float $a, float $b): float
    {
        return $a * $b;
    }

    /**
     * Divide two numbers
     *
     * @param float $a Dividend
     * @param float $b Divisor
     * @return float Quotient
     * @throws \InvalidArgumentException if divisor is zero
     */
    public function divide(float $a, float $b): float
    {
        if ($b == 0) {
            throw new \InvalidArgumentException("Division by zero is not allowed");
        }
        return $a / $b;
    }

    /**
     * Calculate power
     *
     * @param float $base Base number
     * @param float $exponent Exponent
     * @return float Result of base raised to exponent
     */
    public function power(float $base, float $exponent): float
    {
        return pow($base, $exponent);
    }

    /**
     * Calculate square root
     *
     * @param float $number Number to calculate square root
     * @return float Square root of the number
     * @throws \InvalidArgumentException if number is negative
     */
    public function squareRoot(float $number): float
    {
        if ($number < 0) {
            throw new \InvalidArgumentException("Cannot calculate square root of negative number");
        }
        return sqrt($number);
    }
}