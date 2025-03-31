<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\Example;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    private example $example;

    protected function setUp(): void
    {
        parent::setUp();

        $this->example = new Example();
    }

    /**
     * @test
     */
    public function givenTwoNumbersReturnsSum()
    {
        $this->assertEquals(3, $this->example->add("1,2"));
    }

    /**
     * @test
     */
    public function givenOneNumbersReturnsNumber()
    {
        $example = new Example();

        $result = $example->add("1");

        $this->assertEquals(1, $result);
    }

    /**
     * @test
     */
    public function givenNoneNumbersReturns0()
    {
        $example = new Example();

        $result = $example->add("");

        $this->assertEquals(0, $result);
    }

}
