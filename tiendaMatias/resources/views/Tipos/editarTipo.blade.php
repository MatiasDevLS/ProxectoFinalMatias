@extends('layouts.inicio')

@section('contenido')
<div>
    <a href="registroTipo">
        <button>Añadir</button>
    </a>
</div>

<div>
    <form id="editarForm" action="editarTipo" method="post">
        @csrf
        <label for="id">Id:</label><br>
        <input type="number" id="id" name="id" value="{{ $tipo->id ?? '' }}"><br><br>
        <input type="submit" value="Buscar">
    </form>
</div>

@if(isset($tipo))
<div class="form">
        <form action="/editarTipo/{{ $tipo->id }}" method="post">
        <p>Registrar Tipo: {{ $tipo->tipo}}</p>
        @csrf
        @method('PUT')
        <label for="tipo">Nombre:</label><br>
        <input type="text" id="tipo" name="tipo" value="{{$tipo->tipo}}"><br><br>


        <input type="submit" value="Registrar">

    </form>
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