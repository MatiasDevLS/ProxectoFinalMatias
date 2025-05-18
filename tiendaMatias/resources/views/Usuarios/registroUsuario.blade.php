@extends('layouts.inicio')

@section('contenido')
<form method="POST" action="gestionUsuario">
    @csrf

    <input type="text" name="nombre"  >
    <input type="text" name="apellidos" >
    <input type="email" name="correo">


    <input type="password" name="password">

    <select name="rol" >
        <option value="1" >Usuario</option>
        <option value="2">Admin</option>
    </select>
        <input type="text" name="imagenUrl"  >


    <button type="submit">Actualizar</button>
</form>

@endsection