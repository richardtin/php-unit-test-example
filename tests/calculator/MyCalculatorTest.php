<?php

namespace Tests\calculator;

use App\calculator\MyCalculator;
use PHPUnit\Framework\TestCase;

class MyCalculatorTest extends TestCase
{
    private $calculator;

    protected function setUp()
    {
        parent::setUp();
        $this->calculator = new MyCalculator();
    }

    /**
     * @test
     */
    public function positive_integer_add()
    {
        $this->sumShouldBe(3, 1, 2);
    }

    public function sumShouldBe($expected, $first, $second): void
    {
        $this->assertEquals($expected, $this->calculator->add($first, $second));
    }
}
