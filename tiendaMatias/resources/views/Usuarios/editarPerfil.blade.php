@extends('layouts.inicio')

@section('contenido')


 <img src="{{$usuario->imagenUrl }}" width="30" height="30" alt="">
<form method="POST" action="/editarUsuario/{{ $usuario->id }}">
    @csrf
    @method('PUT') 

    <input type="text" name="nombre" value="{{ $usuario->nombre }}" required>
    <input type="text" name="apellidos" value="{{ $usuario->apellidos }}" required>
    <input type="email" name="correo" value="{{ $usuario->correo }}" required>

    {{-- Deja la contraseña en blanco si no se va a cambiar --}}
    <input type="password" name="password" placeholder="cambiar contraseña">

            <input type="text" name="imagenUrl"  value="{{ $usuario->imagenUrl }}" >

    <button type="submit">Actualizar</button>
</form>

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