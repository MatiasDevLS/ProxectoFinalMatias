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



    public function Post(Request $request)
    {

        Producto::create($request->all());

        return 'Respuesta valida'; 
    }


    public function Get(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }



    public function Update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            // Agrega aquí más reglas de validación para otros campos
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')
                         ->with('success', 'Producto actualizado exitosamente.');
    }

    public function Delete(int $id)
    {
        $producto = Producto::find($id);
        $producto->delete();


        $productos = Producto::all();
        return view('listaProducto', compact('productos'));
    }
}

