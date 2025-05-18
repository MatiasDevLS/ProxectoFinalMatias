<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function comprobarInicio(){
        if (empty(session('usuario_id')))
        {
            return view('index');
        }
    }
}
