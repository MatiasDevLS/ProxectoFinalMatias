@extends('layouts.inicio')

@section('contenido')
<div class="form">
    <form action="gestionProductos" method="post">

        <p>Registrar Tipo</p>
        @csrf

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br><br>


        <input type="submit" value="Registrar">

    </form>

</div>
@endsection