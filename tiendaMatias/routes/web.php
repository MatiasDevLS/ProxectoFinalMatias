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


//Producto 
Route::get('/gestionProductos', function () {
    return view('Productos.gestionProducto');
});

Route::get('/editarProducto', function () {
    return view('Productos.editarProducto');
});

Route::get('/listaProducto', [ProductoController::class, 'GetLista']);

Route::get('/registroProducto', [ProductoController::class, 'GetGestion']);

Route::post('/gestionProducto', [ProductoController::class, 'Post']);

Route::post('/editarProducto/{id}', [ProductoController::class, 'GetEditarData']);

Route::put('/editarProducto/{id}', [ProductoController::class, 'Update']);

Route::delete('/listaProducto/{id}', [ProductoController::class, 'Delete']);



// Tipo
Route::get('/gestionTipo', function () {
    return view('Tipos.gestionTipo');
});

Route::get('/editarTipo', function () {
    return view('Tipos.editarTipo');
});

Route::get('/listaTipo', [TipoController::class, 'GetLista']);

Route::get('/registroTipo', function () {
    return view('Tipos.registroTipo');
});

Route::post('/gestionTipo', [TipoController::class, 'Post']);

Route::post('/editarTipo/{id}', [TipoController::class, 'GetEditarData']);

Route::put('/editarTipo/{id}', [TipoController::class, 'Update']);

Route::delete('/listaTipo/{id}', [TipoController::class, 'Delete']);

// Usuario
Route::get('/listaUsuario', [TipoController::class, 'GetLista']);



// Envia al usuario a la pantalla de inicio
Route::post('/inicio', function (Request $data) {
    $email = $data->email;
    $usuario = $data->usuario;
    $password = $data->password;

    return view('layouts.inicio');
});

