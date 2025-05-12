@extends('layouts.inicio')

@section('contenido')
<link rel="stylesheet" href="{{ asset('css/listaProducto.css') }}">
<div>
    <div class="lista">
        <table>
            <thead>
                <th>Imagen</th>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Tipo</th>
            </thead>
            @foreach ($productos as $producto)
            <tr>
                <td><img src="{{$producto->imagenUrl}}"></td>
                <td>{{$producto->id}}</td>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->precio}}€</td>
            </tr>
            @endforeach
        </table>


    </div>

    <div>
        <form id="eliminarForm" action="" method="post">
            <label for="id">Id:</label><br>
            <input type="number" id="id" name="id"><br><br>
            @csrf
            @method('DELETE')
            <input type="submit" value="Eliminar">
        </form>


        <script>
            document.getElementById('eliminarForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Evita la envío normal del formulario
                const id = document.getElementById('id').value;
                const url = `/listaProducto/${id}`; // Construye la URL con el ID
                this.action = url; // Establece la acción del formulario dinámicamente
                this.submit(); // Envía el formulario
            });
        </script>
        
    </div>

    @endsection