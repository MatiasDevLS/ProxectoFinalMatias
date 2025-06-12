<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    public function GetLista()
    {
        $check = $this->comprobarInicio();
        if ($check) {
            return $check;
        }

        $tipos = Tipo::all();
        return view('Tipos.listaTipo', compact('tipos'));
    }


    public function Post(Request $request)
    {
        try {
            Tipo::create($request->all());
             return redirect()->back();
        } catch (\Throwable $th) {
            return view('Tipos.gestionTipo');
        }
    }

    public function GetEditarData(int $id)
    {
        $check = $this->comprobarInicio();
        if ($check) {
            return $check;
        }

        $tipo = Tipo::find($id);

        return view('Tipos.editarTipo', compact('tipo'));
    }

    public function Update(Request $request, $id)
    {

        $tipo = Tipo::findOrFail($id);
        $tipo->update($request->all());

        return view('Tipos.editarTipo', compact('tipo'));
    }

    public function Delete(int $id)
    {
        $tipo = Tipo::find($id);
        $tipo->delete();


        $tipos = Tipo::all();
        return view('Tipos.listaTipo', compact('tipos'));
    }



    public function ExportarTodo()
    {
        return $tipos = Tipo::all();
    }

    public function ExportarTipo(int $id)
    {

        $tipo = Tipo::find($id);

        return $tipo;
    }
}
