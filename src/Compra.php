<?php

namespace Deg540\DockerPHPKataExamen;

class Compra
{
    function listarCompra(string $instruccion): string
    {
        $lista = [];

        list($instruccion, $producto, $cantidad) = $this->extraerInstruccion($instruccion);

        if($this->esAnadir($instruccion[0])) {
            return $producto . ' x' . $cantidad;
        }
        return '';
    }

    public function extraerInstruccion(string $instruccion): array
    {
        $instruccion = explode(" ", $instruccion);
        $producto = $instruccion[1];
        $cantidad = $instruccion[3] ?? 1;
        return array($instruccion, $producto, $cantidad);
    }

    public function esAnadir($instruccion): bool
    {
        return $instruccion === 'añadir';
    }

}
