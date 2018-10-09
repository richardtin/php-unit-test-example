<?php

namespace Tests;

use App\HelloWorld;
use PHPUnit\Framework\TestCase;

class HelloWorldTest extends TestCase
{
    public function testSayHelloWorld()
    {
        // arrange
        $target = new HelloWorld();
        $excepted = 'Hello, world';

        // act
        $actual = $target->say();

        // assert
        $this->assertEquals($excepted, $actual);
    }
}
