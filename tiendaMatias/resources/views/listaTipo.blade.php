@extends('layouts.inicio')

@section('contenido')
<div >
    <table>
    @foreach ($tipos as $tipo)
        <tr>
            <td>{{$tipo->tipo}}</td>
        </tr>
    @endforeach
    </table>
    

</div>
@endsection