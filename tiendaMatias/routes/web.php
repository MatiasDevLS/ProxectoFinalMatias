<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TipoController;

// Rutas de movimiento

// Devuelve al usuario a la pantalla de login
Route::get('/', function () {
    return view('index');
});

// Envia al usuario a la creación de productos
Route::get('/gestionProductos', function () {
    return view('registroProducto');
});

// Envia al usuario a la creación de tipo
Route::get('/gestionTipo', function () {
    return view('registroTipo');
});



// Envia al usuario a la pantalla de inicio
Route::post('/inicio', function (Request $data) {
    $email = $data->email;
    $usuario = $data->usuario;
    $password = $data->password;

    return view('layouts.inicio');
});

// Gets de listas
Route::get('/listaTipo', [TipoController::class, 'GetLista']);

// Post de creación

Route::post('/gestionProductos', [ProductoController::class, 'Post']);
Route::post('/gestionTipo', [TipoController::class, 'Post']);
