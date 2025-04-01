<?php

namespace Deg540\DockerPHPKataExamen\Test;

use Deg540\DockerPHPKataExamen\Compra;
use PHPUnit\Framework\TestCase;

class CompraTest extends TestCase
{
    private compra $compra;

    protected function setUp(): void
    {
        parent::setUp();

        $this->compra = new Compra();
    }

    /**
     * @test
     */
    public function dadoUnProductoSinCantidadDevuelveProductox1()
    {
        $this->assertEquals('pan x1', $this->compra->listarCompra("añadir Pan"));
    }

    /**
     * @test
     */
    public function dadoUnProductoConCantidadDevuelveProductoConCantidad()
    {
        $this->assertEquals('pan x4', $this->compra->listarCompra("añadir Pan 4"));
    }

    /**
     * @test
     */
    public function dadoUnaListaConUnProductoEliminaProducto()
    {
        $this->assertEquals('pan x1', $this->compra->listarCompra("añadir Pan"));

        $this->assertEquals('', $this->compra->listarCompra("eliminar pan"));
    }

    /**
     * @test
     */
    public function dadoUnaListaConVariosProductoEliminaProducto()
    {
        $this->assertEquals('pan x1', $this->compra->listarCompra("añadir Pan"));

        $this->assertEquals('leche x4, pan x1', $this->compra->listarCompra("añadir leche 4"));

        $this->assertEquals('leche x4', $this->compra->listarCompra("eliminar pan"));
    }

    /**
     * @test
     */
    public function vaciar()
    {
        $this->assertEquals('', $this->compra->listarCompra("vaciar"));
    }


}
