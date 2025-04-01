<?php

namespace Deg540\DockerPHPKataExamen;

class Compra
{
    function listarCompra(string $instruccion): string
    {
        $lista = [];

        $instruccion = explode(" ", $instruccion);
        $producto = $instruccion[1];
        $cantidad = $instruccion[3] ?? 1;


        if($instruccion[0] === 'añadir') {
            return $producto . ' x' . $cantidad;
        }
        return '';
    }

}
