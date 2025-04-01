<?php

namespace Deg540\DockerPHPKataExamen\Test;

use Deg540\DockerPHPKataExamen\Compra;
use PHPUnit\Framework\TestCase;

class CompraTest extends TestCase
{
    /**
     * @test
     */
    public function givenAProductWithoutQuantityReturnsProductx1()
    {
        $example = new Compra();

        $result = $example->listarCompra("añadir pan");

        $this->assertEquals('pan x1', $result);
    }

    /**
     * @test
     */
    public function givenAProductWithQuantityReturnsProductxQuantity()
    {
        $example = new Compra();

        $result = $example->listarCompra("añadir pan 4");

        $this->assertEquals('pan x4', $result);
    }

}
