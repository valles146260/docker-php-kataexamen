<?php

namespace Deg540\DockerPHPKataExamen\Test;

use Deg540\DockerPHPKataExamen\Compra;
use PHPUnit\Framework\TestCase;

class CompraTest extends TestCase
{
    /**
     * @test
     */
    public function test()
    {
        $example = new Compra();

        $result = $example->listarCompra("añadir pan");

        $this->assertEquals('pan x1', $result);
    }
}
