<?php

namespace Tests;

use App\Calculator;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for Calculator class
 */
class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testCanAddTwoNumbers(): void
    {
        $result = $this->calculator->add(5, 3);
        $this->assertEquals(8, $result);
    }

    public function testCanAddNegativeNumbers(): void
    {
        $result = $this->calculator->add(-5, -3);
        $this->assertEquals(-8, $result);
    }

    public function testCanSubtractTwoNumbers(): void
    {
        $result = $this->calculator->subtract(10, 4);
        $this->assertEquals(6, $result);
    }

    public function testCanSubtractNegativeNumbers(): void
    {
        $result = $this->calculator->subtract(5, -3);
        $this->assertEquals(8, $result);
    }

    public function testCanMultiplyTwoNumbers(): void
    {
        $result = $this->calculator->multiply(4, 5);
        $this->assertEquals(20, $result);
    }

    public function testCanMultiplyByZero(): void
    {
        $result = $this->calculator->multiply(100, 0);
        $this->assertEquals(0, $result);
    }

    public function testCanDivideTwoNumbers(): void
    {
        $result = $this->calculator->divide(20, 4);
        $this->assertEquals(5, $result);
    }

    public function testDivisionByZeroThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Division by zero is not allowed");
        $this->calculator->divide(10, 0);
    }

    public function testCanCalculatePower(): void
    {
        $result = $this->calculator->power(2, 3);
        $this->assertEquals(8, $result);
    }

    public function testCanCalculatePowerOfZero(): void
    {
        $result = $this->calculator->power(5, 0);
        $this->assertEquals(1, $result);
    }

    public function testCanCalculateSquareRoot(): void
    {
        $result = $this->calculator->squareRoot(16);
        $this->assertEquals(4, $result);
    }

    public function testSquareRootOfZero(): void
    {
        $result = $this->calculator->squareRoot(0);
        $this->assertEquals(0, $result);
    }

    public function testSquareRootOfNegativeNumberThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Cannot calculate square root of negative number");
        $this->calculator->squareRoot(-4);
    }

    public function testCanAddFloatingPointNumbers(): void
    {
        $result = $this->calculator->add(1.5, 2.7);
        $this->assertEquals(4.2, $result, '', 0.0001);
    }

    public function testCanDivideFloatingPointNumbers(): void
    {
        $result = $this->calculator->divide(10.5, 2.5);
        $this->assertEquals(4.2, $result, '', 0.0001);
    }
}