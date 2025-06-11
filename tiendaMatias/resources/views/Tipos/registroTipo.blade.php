@extends('layouts.inicio')

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/registroTipo.css') }}">
<div class="contenedor">

<div class="form">
    <form action="gestionTipo" method="post">

        <p><b>Registro de Tipo</b></p>
        @csrf

        <label for="tipo">Nombre:</label><br>
        <input type="text" id="tipo" name="tipo"><br><br>

        <button type="submit" class="btn btn-dark">Registrar</button>


    </form>

</div>
</div>
@endsection