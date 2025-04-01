<?php

namespace Deg540\DockerPHPKataExamen\Test;

use Deg540\DockerPHPKataExamen\Compra;
use PHPUnit\Framework\TestCase;

class CompraTest extends TestCase
{
    /**
     * @test
     */
    public function dadoUnProductoSinCantidadDevuelveProductox1()
    {
        $compra = new Compra();

        $result = $compra->listarCompra("añadir pan");

        $this->assertEquals('pan x1', $result);
    }

    /**
     * @test
     */
    public function dadoUnProductoConCantidadDevuelveProductoConCantidad()
    {
        $compra = new Compra();

        $result = $compra->listarCompra("añadir Pan 4");

        $this->assertEquals('pan x4', $result);
    }

    /**
     * @test
     */
    public function removerProducto()
    {
        $compra = new Compra();

        $compra->listarCompra("añadir pan");
        $compra->listarCompra("añadir leche 3");

        $result = $compra->listarCompra("eliminar pan");

        $this->assertEquals('leche x3', $result);
    }


}
