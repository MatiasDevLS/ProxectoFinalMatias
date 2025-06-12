<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

use App\Models\ProductoDto;
use App\Models\Tipo;
use Illuminate\Validation\ValidationException;

class ProductoController extends Controller
{
    // Devuelve todos los productos con el nombre de su tipo
    public function GetLista()
    {
        // Control de acceso
        $check = $this->comprobarInicio();
        if ($check) {
            return $check;
        }
        $tipos = Tipo::all()->keyBy('id'); 
        $productos = Producto::all();

        // Guarda en array los DTOs
        $productoDtos = [];

        foreach ($productos as $producto) {
            $tipoNombre = Tipo::find($producto->idTipo)->tipo ?? 'Tipo desconocido';

            $dto = new ProductoDto();
            $dto = $dto->fromProducto($producto, $tipoNombre); // Pasa al constructor los datos del producto + el nombre del tipo
            $productoDtos[] = $dto;
        }

        return view('Productos.listaProducto', compact('productoDtos'));
    }

    // Envia los tipos al registro de productos
    public function GetGestion()
    {
        // Control de acceso
        $check = $this->comprobarInicio();
        if ($check) {
            return $check;
        }

        $tipos = Tipo::all();
        return view('Productos.registroProducto', compact('tipos'));
    }

    // En el apartado de edición de productos, devuelve el producto los tipos para escoger y el tipo del producto
    public function GetEditarData(int $id)
    {
        // Control de acceso
        $check = $this->comprobarInicio();
        if ($check) {
            return $check;
        }

        $producto = Producto::find($id);
        $tipo = Tipo::find($producto->idTipo);
        $tipos = Tipo::all();
        return view('Productos.editarProducto', compact('tipos', 'tipo', 'producto'));
    }

    // Crea el producto
    public function Post(Request $request)
    {
        try {
            // Valida los datos de la petición
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

    // Actualiza el producto
    public function Update(Request $request, $id)
    {

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());


        $tipo = Tipo::find($producto->idTipo);
        $tipos = Tipo::all();

        return view('Productos.editarProducto', compact('tipos', 'tipo', 'producto'));
    }

    // Borra el producto
    public function Delete(int $id)
    {
        $producto = Producto::find($id);
        $producto->delete();


        $productos = Producto::all();
        return view('Productos.listaProducto', compact('productos'));
    }

    
    // Exportaciones

    // Exporta todos los productos al cliente
    public function ExportarTodo()
    {
        return $productos = Producto::all();
    }

    // Exporta un único producto al cliente
    public function ExportarProducto(int $id)
    {

        $producto = Producto::find($id);


        return $producto;
    }




    // Exporta 4 productos aleatorios al cliente
    public function ExportarAleatorio($id)
    {
        return $productos = Producto::where('id', '!=', $id)
            ->inRandomOrder()
            ->take(4)
            ->get();
    }

    // Exporta todos los productos pertenecientes a un tipo
    public function ExportarProductosCategoria($id)
    {
        return $productos = Producto::where('idTipo', $id)->get();;
    }
}
