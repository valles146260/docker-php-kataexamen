<?php

namespace Deg540\DockerPHPKataExamen;

class Compra
{
    private array $listaProductos = [];

    public function listarCompra(string $instruccion): string
    {

        [$accion, $producto, $cantidad] = $this->extraerInstruccion($instruccion);

        if ($this->esAnadir($accion)) {
            $producto = strtolower($producto);
            $cantidad = $cantidad ?? 1;

            $this->listaProductos[$producto] = ($this->listaProductos[$producto] ?? 0) + $cantidad;

            if (empty($this->listaProductos)) {
                return '';
            }

            ksort($this->listaProductos);

            return implode(', ', array_map(
                fn($producto, $cantidad) => "$producto x$cantidad",
                array_keys($this->listaProductos),
                $this->listaProductos
            ));
        }

        return '';
    }

    private function extraerInstruccion(string $instruccion): array
    {
        $partes = explode(' ', strtolower(trim($instruccion)));
        $accion = $partes[0];
        $producto = $partes[1] ?? '';
        $cantidad = isset($partes[2]) && is_numeric($partes[2]) ? (int)$partes[2] : 1;

        return [$accion, $producto, $cantidad];
    }

    public function esAnadir($accion): bool
    {
        return $accion === 'añadir';
    }
}

