@extends('layouts.inicio')

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/registroUsuario.css') }}">

<div class="contenedor">

    <form method="POST" action="/editarUsuario/{{ $usuario->id }}">
        @csrf
        @method('PUT')
        <table>
        <tr>                   
            <td  colspan="2">
                 <div class="contenedorImagen"><img src="{{$usuario->imagenUrl }}" alt=""></div></td>
        </tr>
        <tr> <td colspan="2">
            <label for="imagenUrl">Url de la imagen:</label><br>
             <input style="width: 100%;" type="text" name="imagenUrl" value="{{ $usuario->imagenUrl }}">
            </td></tr>
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
            <td colspan="2">
                <label for="correo">Correo electrónico:</label><br>
                <input style="width: 100%;" type="email" name="correo" value="{{ $usuario->correo }}" required>
            </td>
        </tr>
        {{-- Deja la contraseña en blanco si no se va a cambiar --}}

        <tr>
            <td colspan="2">
                <label for="password">Contraseña:</label><br>
                <input style="width: 100%;" type="password" name="password" placeholder="cambiar contraseña">
            </td>
        </tr>
        <tr>
            <td><button type="submit" class="btn btn-dark">Actualizar</button></td>
        </tr>
    </table>
    </form>
</div>
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