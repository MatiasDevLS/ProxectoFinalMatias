@extends('layouts.inicio')

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/registroProducto.css') }}">
<div class="contenedor">
    <form method="POST" action="gestionUsuario">
        @csrf
        <table>
            <thead>
                <th>
                    <p>Regristro de Usuario</p>
                </th>
            </thead>
            <tr>
                <td><label for="nombre">Nombre</label><br><input type="text" name="nombre"></td>
                <td> <label for="apellidos">Apellidos</label><br><input type="text" name="apellidos"></td>
            </tr>

            <tr>
                <td colspan="2"><label for="correo">Correo Electrónico</label><br> <input style="width: 100%;" type="email" name="correo"></td>
            </tr>
            <tr>
                <td colspan="2"><label for="password">Contraseña</label><br><input style="width: 100%;" type="password" name="password"></td>
            </tr>
            <tr>
                <td> <label for="rol">Rol</label><br><select name="rol">
                        <option value="1">Usuario</option>
                        <option value="2">Admin</option>
                    </select></td>
                <td> <label for="nombre">URL de la imagen</label><br><input type="text" name="imagenUrl">
                </td>
            </tr>
            <tr>
                <td><button type="submit" class="btn btn-dark">Registrar</button></td>
            </tr>
        </table>




    </form>
</div>

@endsection