@extends('layouts.inicio')

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/registroUsuario.css') }}">

<div class="contenedorId">
    <form id="editarForm" action="editarUsuario" method="post">
        @csrf
        <label for="id">Id:</label><br>
        <input type="number" id="id" name="id">
        <input type="submit" class="btn btnBuscar" value="Buscar">
    </form>
</div>

@if(isset($usuario))
<div class="contenedor">
    <form method="POST" action="/editarUsuario/{{ $usuario->id }}">
        @csrf
        @method('PUT')
        <table>
            <thead>
                <tr>
                    <th>
                        <p>Editar el Usuario: {{ $usuario->nombre}}</p>
                    </th>
                </tr>
            </thead>
            <tr>
                <td>
                    <label for="nombre">Nombre:</label><br>
                    <input type="text" name="nombre" value="{{ $usuario->nombre }}" required>
                </td>
                <td>
                    <label for="apellidos">Apellidos:</label><br>
                    <input type="text" name="apellidos" value="{{ $usuario->apellidos }}" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="imagenUrl">Url de la Imagen:</label><br>
                    <input type="text" name="imagenUrl" value="{{ $usuario->imagenUrl }}">
                </td>
                <td> 
                    <label for="rol">Rol:</label><br>
                    <select name="rol">
                        <option value="1" {{ $usuario->rol == 1 ? 'selected' : '' }}>Usuario</option>
                        <option value="2" {{ $usuario->rol == 2 ? 'selected' : '' }}>Admin</option>
                    </select></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label for="correo">Correo electrónico:</label><br>
                    <input style="width: 100%;" type="email" name="correo" value="{{ $usuario->correo }}" required>

                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label for="password">Cambiar Contraseña:</label><br>
                    {{-- Dejar la contraseña en blanco si no se va a cambiar --}}
                    <input style="width: 100%;" type="password" name="password">
                </td>

            </tr>

            <tr>

                <td><button type="submit" class="btn btn-dark">Actualizar</button></td>

            </tr>
        </table>





    </form>
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('editarForm');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const id = document.getElementById('id').value;
            const url = `/editarUsuario/${id}`;
            this.action = url;
            this.submit();
        });
    });
</script>
@endsection