<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Devuelve al usuario a la pantalla de login
Route::get('/', function () {
    return view('index');
});

// Envia al usuario a la pantalla de inicio
Route::post('/inicio', function (Request $data) {
    $email = $data->email;
    $usuario = $data->usuario;
    $password = $data->password;

    return view('inicio');
});
