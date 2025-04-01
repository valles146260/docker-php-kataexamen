<?php

namespace Deg540\DockerPHPKataExamen;

class Compra
{
    private array $listaProductos = [];

    public function listarCompra(string $instruccion): string
    {
        [$accion, $producto, $cantidad] = $this->extraerInstruccion($instruccion);

        if ($this->esAnadir($accion)) {

            $this->listaProductos[$producto] = ($this->listaProductos[$producto] ?? 0) + $cantidad;

            return $this->generarLista();
        }

        if ($this->esEliminar($accion)) {

            if ($this->hayProductos($producto)) {

                unset($this->listaProductos[$producto]);

                return $this->generarLista();
            }
            return 'El producto seleccionado no existe';
        }

        if ($accion === 'vaciar') {
            $this->listaProductos = [];
            return '';
        }

        return '';
    }

    private function extraerInstruccion(string $instruccion): array
    {
        $partes = explode(' ', strtolower(trim($instruccion)));

        $accion = $partes[0];

        $producto = $partes[1] ?? '';

        $producto = strtolower($producto);

        $cantidad = isset($partes[2]) && is_numeric($partes[2]) ? (int)$partes[2] : 1;

        return [$accion, $producto, $cantidad];
    }

    public function esAnadir($accion): bool
    {
        return $accion === 'añadir';
    }

    public function generarLista(): string
    {
        if (empty($this->listaProductos)) {
            return '';
        }

        ksort($this->listaProductos);

        return $this->formatearListaString();
    }

    /**
     * @return string
     */
    public function formatearListaString(): string
    {
        return implode(', ', array_map(
            fn($producto, $cantidad) => "$producto x$cantidad",
            array_keys($this->listaProductos),
            $this->listaProductos
        ));
    }

    public function esEliminar(mixed $accion): bool
    {
        return $accion === 'eliminar';
    }

    public function hayProductos(mixed $producto): bool
    {
        return isset($this->listaProductos[$producto]);
    }
}

