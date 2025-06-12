<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UsuarioController;
use App\Models\Tipo;
use App\Models\Usuario;


// Devuelve al usuario a la pantalla de login
Route::get('/', function () {
    return view('index');
});


// Producto 
// Rutas de movimiento
Route::get('/gestionProductos', function () {
    return view('Productos.gestionProducto');
});

Route::get('/editarProducto', function () {
    return view('Productos.editarProducto');
});

// Acciones
Route::get('/listaProducto', [ProductoController::class, 'GetLista']);
Route::get('/registroProducto', [ProductoController::class, 'GetGestion']);
Route::post('/gestionProducto', [ProductoController::class, 'Post']);
Route::post('/editarProducto/{id}', [ProductoController::class, 'GetEditarData']);
Route::put('/editarProducto/{id}', [ProductoController::class, 'Update']);
Route::delete('/listaProducto/{id}', [ProductoController::class, 'Delete']);



// Tipo
// Rutas de movimiento
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

// Acciones
Route::post('/gestionTipo', [TipoController::class, 'Post']);
Route::post('/editarTipo/{id}', [TipoController::class, 'GetEditarData']);
Route::put('/editarTipo/{id}', [TipoController::class, 'Update']);
Route::delete('/listaTipo/{id}', [TipoController::class, 'Delete']);


// Usuario
// Rutas de movimiento
Route::get('/gestionUsuario', function () {
    return view('Usuarios.gestionUsuario');
});

Route::get('/editarUsuario', function () {
    return view('Usuarios.editarUsuario');
});

Route::get('/editarPerfil', function () {
    return view('Usuarios.editarPerfil');
});

Route::get('/listaUsuario', [UsuarioController::class, 'GetLista']);

Route::get('/registroUsuario', function () {
    return view('Usuarios.registroUsuario');
});

// Acciones
Route::post('/gestionUsuario', [UsuarioController::class, 'Post']);
Route::post('/editarUsuario/{id}', [UsuarioController::class, 'GetEditarData']);
Route::put('/editarUsuario/{id}', [UsuarioController::class, 'Update']);
Route::delete('/listaUsuario/{id}', [UsuarioController::class, 'Delete']);
Route::post('/login', [UsuarioController::class, 'Login']);
Route::get('/editarPerfil', [UsuarioController::class, 'GetPerfil']);



// Exportaciones

// Producto
Route::get('/exportarTodoProducto', [ProductoController::class,'ExportarTodo']);
Route::get('/exportarProducto/{id}', [ProductoController::class,'ExportarProducto']);
Route::get('/exportarAleatorio/{id}', [ProductoController::class,'ExportarAleatorio']);
Route::get('/exportarProductosCategoria/{id}', [ProductoController::class,'ExportarProductosCategoria']);


// Tipo
Route::get('/exportarTodoTipo', [TipoController::class,'ExportarTodo']);
Route::get('/exportarTipo/{id}', [TipoController::class,'ExportarTipo']);
