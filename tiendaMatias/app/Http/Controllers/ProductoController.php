<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

use App\Models\ProductoDto; 
use App\Models\Tipo;
use Illuminate\Validation\ValidationException;

class ProductoController extends Controller
{

    public function GetLista()
    {
        $check = $this->comprobarInicio();
        if ($check) {
            return $check;
        }
        $tipos = Tipo::all()->keyBy('id'); // keyBy para acceso rápido
        $productos = Producto::all();

        // Guardar en array de DTOs
        $productoDtos = [];

        foreach ($productos as $producto) {
            $tipoNombre = Tipo::find($producto->idTipo)->tipo ?? 'Tipo desconocido';

            $dto = new ProductoDto();
            $dto = $dto->fromProducto($producto,$tipoNombre);
            $productoDtos[] = $dto;
        }

        return view('Productos.listaProducto', compact('productoDtos'));
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
        try {
            // 1. Validar los datos de la petición
            // Laravel automáticamente redirige hacia atrás con los errores si falla la validación
            $validatedData = $request->validate([
                'nombre' => 'required|string', 
                'precio' => 'required|numeric', 
                'imagenUrl' => 'required|string', 
                'descripcion' => 'required|string', 
                'idTipo' => 'required|numeric'

            ]);

            // Con $validatedData, solo se usan las columnas especificadas
            Producto::create($validatedData);

            
            return redirect()->back()->with('success', 'Producto creado exitosamente!');

        } catch (ValidationException $e) {

            return view('Productos.gestionProducto');

        } catch (\Throwable $th) {

            return view('Productos.gestionProducto');
        }

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


    public function ExportarTodo()
    {
        return $productos = Producto::all();
    }

    public function ExportarProducto(int $id)
    {

        $producto = Producto::find($id);


        return $producto;
    }

    
  


    public function ExportarAleatorio($id)
    {
        return $productos = Producto::where('id', '!=', $id)
            ->inRandomOrder()
            ->take(4)
            ->get();
    }

    public function ExportarProductosCategoria($id)
    {
        return $productos = Producto::where('idTipo', $id)->get();;
    }
}
