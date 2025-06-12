<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductoDto {
    public $id;
    public $nombre;
    public $precio;
    public $imagenUrl;
    public $descripcion;
    public $tipoNombre; 
 
    public function __construct(
        ?int $id = null,
        string $nombre = '',
        float $precio = 0.0,
        string $imagenUrl = '',
        string $descripcion = '',
        string $tipoNombre = ''
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->imagenUrl = $imagenUrl;
        $this->descripcion = $descripcion;
        $this->tipoNombre = $tipoNombre;
    }

    // Método que inicializa al DTO de forma mas rápida y dinámica
    public static function fromProducto(\App\Models\Producto $producto, string $tipoNombre): self
    {
        return new self(
            $producto->id,
            $producto->nombre,
            $producto->precio,
            $producto->imagenUrl,
            $producto->descripcion,
            $tipoNombre
        );
    }
}