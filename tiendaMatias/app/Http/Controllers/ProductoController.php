<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Tipo;

class ProductoController extends Controller
{

    public function GetLista()
    {
        $productos = Producto::all();
        return view('listaProducto', compact('productos'));
    }

    public function GetGestion()
    {
        $tipos = Tipo::all();
        return view('registroProducto', compact('tipos'));
    }
    

    public function GetEditarData(int $id)
    {
        $producto = Producto::find($id);
        $tipo = Tipo::find($producto->idTipo);
        $tipos = Tipo::all();
        return view('editarProducto', compact('tipos','tipo','producto'));
    }
    




    public function Post(Request $request)
    {

        Producto::create($request->all());

        return 'Respuesta valida'; 
    }


    public function Get(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }



    public function Update(Producto $producto)
    {

        $producto->update();
        $tipo = Tipo::find($producto->idTipo);
        $tipos = Tipo::all();

        return view('editarProducto', compact('tipos','tipo','producto'));
    }

    public function Delete(int $id)
    {
        $producto = Producto::find($id);
        $producto->delete();


        $productos = Producto::all();
        return view('listaProducto', compact('productos'));
    }
}

