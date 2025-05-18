<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Tipo;

class ProductoController extends Controller
{

    public function GetLista()
    {
        $check = $this->comprobarInicio();
        if ($check) {
            return $check;
        }
        $productos = Producto::all();
        return view('Productos.listaProducto', compact('productos'));
    }

    public function GetGestion()
    {
        $check = $this->comprobarInicio();
        if ($check) {
            return $check;
        }

        $tipos = Tipo::all();
        return view('Productos.registroProducto', compact('tipos'));
    }


    public function GetEditarData(int $id)
    {
        $check = $this->comprobarInicio();
        if ($check) {
            return $check;
        }
        $producto = Producto::find($id);
        $tipo = Tipo::find($producto->idTipo);
        $tipos = Tipo::all();
        return view('Productos.editarProducto', compact('tipos', 'tipo', 'producto'));
    }
    public function Post(Request $request)
    {

        Producto::create($request->all());

        return 'Respuesta valida';
    }

    public function Update(Request $request, $id)
    {

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());


        $tipo = Tipo::find($producto->idTipo);
        $tipos = Tipo::all();

        return view('Productos.editarProducto', compact('tipos', 'tipo', 'producto'));
    }

    public function Delete(int $id)
    {
        $producto = Producto::find($id);
        $producto->delete();


        $productos = Producto::all();
        return view('Productos.listaProducto', compact('productos'));
    }
}
