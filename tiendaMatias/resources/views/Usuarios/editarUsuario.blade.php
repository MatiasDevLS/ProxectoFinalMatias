@extends('layouts.inicio')

@section('contenido')
<div>
    <a href="registroProducto">
        <button>Añadir</button>
    </a>
</div>

<div>
    <form id="editarForm" action="editarUsuario" method="post">
        @csrf
        <label for="id">Id:</label><br>
        <input type="number" id="id" name="id"><br><br>
        <input type="submit" value="Buscar">
    </form>
</div>

@if(isset($usuario))
<form method="POST" action="/editarUsuario/{{ $usuario->id }}">
    @csrf
    @method('PUT') 

    <input type="text" name="nombre" value="{{ $usuario->nombre }}" required>
    <input type="text" name="apellidos" value="{{ $usuario->apellidos }}" required>
    <input type="email" name="correo" value="{{ $usuario->correo }}" required>

    {{-- Deja la contraseña en blanco si no se va a cambiar --}}
    <input type="password" name="password" placeholder="cambiar contraseña">

    <select name="rol" >
        <option value="1" {{ $usuario->rol == 1 ? 'selected' : '' }}>Usuario</option>
        <option value="2" {{ $usuario->rol == 2 ? 'selected' : '' }}>Admin</option>
    </select>
            <input type="text" name="imagenUrl"  >

    <button type="submit">Actualizar</button>
</form>
@endif

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('editarForm');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const id = document.getElementById('id').value;
        const url = `/editarUsuario/${id}`;
        this.action = url;
        this.submit();
    });
});
</script>
@endsection