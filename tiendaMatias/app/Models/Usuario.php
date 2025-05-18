<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends model
{
    use HasFactory
    ;
    protected $table = 'usuarios'; // Si no usas el nombre por defecto "users"

    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'password',
        'rol',
        'imagenUrl'
    ];

    protected $hidden = [
        'password',
    ];


    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}