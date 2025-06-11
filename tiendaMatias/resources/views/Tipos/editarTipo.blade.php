@extends('layouts.inicio')

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/registroTipo.css') }}">

<div class="contenedorId">
<div>
    <form id="editarForm" action="editarTipo" method="post">
        @csrf
        <label for="id">Id:</label><br>
        <input type="number" id="id" name="id" value="{{ $tipo->id ?? '' }}">
        <input type="submit" class="btn btnBuscar" value="Buscar">
    </form>
</div>
</div>

@if(isset($tipo))
<div class="contenedor">

<div class="form">
        <form action="/editarTipo/{{ $tipo->id }}" method="post">
        <p><b>Registrar Tipo: {{ $tipo->tipo}}</b></p>
        @csrf
        @method('PUT')
        <label for="tipo">Nombre:</label><br>
        <input type="text" id="tipo" name="tipo" value="{{$tipo->tipo}}"><br><br>


        <td><button type="submit" class="btn btn-dark">Actualizar</button></td>

    </form>
</div>
</div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('editarForm');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const id = document.getElementById('id').value;
        const url = `/editarTipo/${id}`;
        this.action = url;
        this.submit();
    });
});
</script>
@endsection