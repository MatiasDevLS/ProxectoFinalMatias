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


// Envia al usuario a la creación de tipo
Route::get('/gestionTipo', function () {
    return view('registroTipo');
});

Route::get('/gestionProductos', function () {
    return view('gestionProducto');
});

Route::get('/editarProducto', function () {
    return view('editarProducto');
});

// Envia al usuario a la pantalla de inicio
Route::post('/inicio', function (Request $data) {
    $email = $data->email;
    $usuario = $data->usuario;
    $password = $data->password;

    return view('layouts.inicio');
});

// Listas
Route::get('/listaProducto', [ProductoController::class, 'GetLista']);
Route::get('/listaTipo', [TipoController::class, 'GetLista']);


// Creaciones
Route::get('/registroProducto', [ProductoController::class, 'GetGestion']);



//  Posts
Route::post('/gestionTipo', [TipoController::class, 'Post']);
Route::post('/Creaciones', [ProductoController::class, 'Post']);

Route::post('/editarProducto/{id}', [ProductoController::class, 'GetEditarData']);

// Put
Route::put('/editarProducto/{id}', [ProductoController::class, 'Update']);

// Deletes
Route::delete('/listaProducto/{id}', [ProductoController::class, 'Delete']);