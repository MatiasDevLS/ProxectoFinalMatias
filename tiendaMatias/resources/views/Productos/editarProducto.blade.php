@extends('layouts.inicio')

@section('contenido')

<div>
    <form id="editarForm" action="editarProducto" method="post">
        @csrf
        <label for="id">Id:</label><br>
        <input type="number" id="id" name="id" value="{{ $producto->id ?? '' }}"><br><br>
        <input type="submit" value="Buscar">
    </form>
</div>

@if(isset($producto))
<div class="form">
    <form action="/editarProducto/{{ $producto->id }}" method="post">
        @csrf
        @method('PUT')
        <table>
            <thead>
                <tr><th><p>Editar el Producto: {{ $producto->nombre}}</p></th></tr>
            </thead>
            <tr>
                <td>
                    <label for="nombre">Nombre:</label><br>
                    <input type="text" id="nombre" name="nombre" value="{{ $producto->nombre ?? '' }}"><br><br>
                </td>
                <td colspan="2">
                    <label for="descripcion">Descripción:</label><br>
                    <textarea id="descripcion" name="descripcion">{{ $producto->descripcion ?? '' }}</textarea><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="precio">Precio:</label><br>
                    <input type="number" id="precio" name="precio" value="{{ $producto->precio ?? '' }}"><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tipo">Tipo:</label><br>
                    <select id="tipo" name="idTipo">
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->id }}" {{ $tipo->id == $producto->idTipo ? 'selected' : '' }}>
                                {{ $tipo->tipo }}
                            </option>
                        @endforeach
                    </select><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="imagenUrl">URL de la Imagen:</label><br>
                    <input type="text" id="imagenUrl" name="imagenUrl" value="{{ $producto->imagenUrl ?? '' }}"><br><br>
                </td>
                <td>
                    <input type="submit" value="Registrar">
                </td>
            </tr>
        </table>
    </form>
</div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('editarForm');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const id = document.getElementById('id').value;
        const url = `/editarProducto/${id}`;
        this.action = url;
        this.submit();
    });
});
</script>
@endsection