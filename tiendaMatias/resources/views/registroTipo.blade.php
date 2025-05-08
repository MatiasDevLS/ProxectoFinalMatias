@extends('layouts.inicio')

@section('contenido')
<div class="form">
    <form action="gestionTipo" method="post">

        <p>Registrar Tipo</p>
        @csrf

        <label for="tipo">Nombre:</label><br>
        <input type="text" id="tipo" name="tipo"><br><br>


        <input type="submit" value="Registrar">

    </form>

</div>
@endsection