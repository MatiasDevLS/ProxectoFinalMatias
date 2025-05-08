<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagenUrl',
        'idTipo',
    ];

    protected $casts = [
        'precio' => 'decimal:2', //  2 decimales
    ];

    public function tipo(): BelongsTo
    {
        return $this->belongsTo(Tipo::class, 'idTipo');
    }
}