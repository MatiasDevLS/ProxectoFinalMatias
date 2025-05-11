@extends('layouts.inicio')

@section('contenido')
<div>
    <a href="registroProducto">
        <button>
            Añadir
        </button>
    </a>
</div>
<div>
    <form id="editarForm" action="editarProducto" method="post">
        <label for="id">Id:</label><br>
        @csrf
        <input type="number" id="id" name="id" @if(isset($producto)) value={{$producto->id}} @endif><br><br>
        <input type="submit" value="Buscar">

        <script>
            document.getElementById('editarForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Evita la envío normal del formulario
                const id = document.getElementById('id').value;
                const url = `/editarProducto/${id}`; // Construye la URL con el ID
                this.action = url; // Establece la acción del formulario dinámicamente
                this.submit(); // Envía el formulario
            });
        </script>
    </form>
</div>
@if(isset($producto))
<div class="form">
    <form action="" method="post">
    @csrf
    @method('PUT')
        <p>Introduzca Sus Credenciales</p>
        
        <table>
            <thead>
                <th>
                    <p>Regristro de Producto</p>
                </th>
            </thead>
            <tr>
                <td>
                    <label for="nombre">Nombre:</label><br>
                    <input type="text" id="nombre" name="nombre" @if(isset($producto->nombre)) value={{$producto->nombre}} @endif<br><br>
                </td>
                <td colspan="2">
                    <label for="descripcion">Descripcion:</label><br>
                    <textarea id="descripcion" name="descripcion">@if(isset($producto->descripcion)) {{$producto->descripcion}} @endif</textarea><br><br>
                </td>
            </tr>
            <tr>
                <td>

                    <label for="precio">Precio:</label><br>
                    <input type="number" id="precio" name="precio" @if(isset($producto->precio)) value={{$producto->precio}} @endif><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tipo">Tipo:</label><br>
                    <select type="text" id="tipo" name="idTipo">
                        @foreach ($tipos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                        @endforeach
                    </select><br><br>
                </td>
            </tr>
            <tr>
                <td>

                    <label for="imagenUrl">URL de la Imágen:</label><br>
                    <input type="text" id="imagenUrl" name="imagenUrl" @if(isset($producto->imagenUrl)) value={{$producto->imagenUrl}} @endif><br><br>
                </td>

                <td>

                    <input type="submit" value="Registrar">
                </td>
            </tr>








        </table>
    </form>

</div>
@endif
@endsection