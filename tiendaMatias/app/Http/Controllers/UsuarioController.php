<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    public function GetLista()
    {
        $tipos = Tipo::all();
        return view('Tipos.listaTipo', compact('tipos'));
    }


    public function Post(Request $request)
    {
        Tipo::create($request->all());
        return 'Creado con exito';
    }

      public function GetEditarData(int $id)
    {
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
}
