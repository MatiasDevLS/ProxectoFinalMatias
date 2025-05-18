@extends('layouts.inicio')

@section('contenido')
<div >
    <table>
    @foreach ($usuarios as $usuario)
        <tr>
            <td>{{$usuario->password}}</td>
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
                event.preventDefault(); 
                const id = document.getElementById('id').value;
                const url = `/listaUsuario/${id}`; 
                this.action = url; 
                this.submit();
            });
        </script>
        
    </div>

@endsection