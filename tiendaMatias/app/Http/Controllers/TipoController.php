<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    // Devuelve todos los tipos 
    public function GetLista()
    {
        // Control de acceso
        $check = $this->comprobarInicio();
        if ($check) {
            return $check;
        }

        $tipos = Tipo::all();
        return view('Tipos.listaTipo', compact('tipos'));
    }

    // Crea el tipo
    public function Post(Request $request)
    {
        try {
            Tipo::create($request->all());
             return redirect()->back();
        } catch (\Throwable $th) {
            return view('Tipos.gestionTipo');
        }
    }

    // Obtiene los datos del tipo
    public function GetEditarData(int $id)
    {
        // Control de acceso
        $check = $this->comprobarInicio();
        if ($check) {
            return $check;
        }

        $tipo = Tipo::find($id);

        return view('Tipos.editarTipo', compact('tipo'));
    }

    // Actualiza los datos del tipo
    public function Update(Request $request, $id)
    {

        $tipo = Tipo::findOrFail($id);
        $tipo->update($request->all());

        return view('Tipos.editarTipo', compact('tipo'));
    }

    // Borra el tipo
    public function Delete(int $id)
    {
        $tipo = Tipo::find($id);
        $tipo->delete();


        $tipos = Tipo::all();
        return view('Tipos.listaTipo', compact('tipos'));
    }

    
    // Exportaciones

    // Exporta todos los tipos al lado cliente
    public function ExportarTodo()
    {
        return $tipos = Tipo::all();
    }

    // Exporta un único tipo al lado cliente
    public function ExportarTipo(int $id)
    {

        $tipo = Tipo::find($id);

        return $tipo;
    }
}
