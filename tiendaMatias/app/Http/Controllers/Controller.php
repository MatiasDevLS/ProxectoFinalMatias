<?php

namespace App\Http\Controllers;

abstract class Controller
{
    // Comando que comprueba si el usuario inició sesión a partir de la id del usuario alojada en la sesión
    public function comprobarInicio(){
        if (empty(session('usuario_id')))
        {
            return view('index');
        }
    }
}
