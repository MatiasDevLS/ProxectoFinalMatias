@extends('layouts.inicio')

@section('contenido')
        <div>
        <a href="editarProducto">
            <button>
                Editar
            </button>
        </a>
    </div>
<div class="form">
    <form action="gestionProducto" method="post">

        <p>Introduzca Sus Credenciales</p>
        @csrf
        <table>
            <thead>
                <th>
                    <p>Regristro de Producto</p>
                </th>
            </thead>
            <tr>
                <td>
                    <label for="nombre">Nombre:</label><br>
                    <input type="text" id="nombre" name="nombre"><br><br>
                </td>
                <td colspan="2">
                    <label for="descripcion">Descripcion:</label><br>
                    <textarea id="descripcion" name="descripcion"></textarea><br><br>
                </td>
            </tr>
            <tr>
                <td>

                    <label for="precio">Precio:</label><br>
                    <input type="number" id="precio" name="precio"><br><br>
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
                    <input type="text" id="imagenUrl" name="imagenUrl"><br><br>
                </td>

                <td>

                    <input type="submit" value="Registrar">
                </td>
            </tr>








        </table>
    </form>

</div>
@endsection