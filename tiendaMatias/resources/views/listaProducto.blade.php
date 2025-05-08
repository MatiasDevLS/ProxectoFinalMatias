@extends('layouts.inicio')

@section('contenido')
<div >
    <table>
    @foreach ($productos as $producto)
        <tr>
            <td>{{$producto}}</td>
        </tr>
    @endforeach
    </table>
    

</div>
@endsection