<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    public function GetLista()
    {
        $tipos = Tipo::all();
        return view('listaTipo', compact('tipos'));
    }


    public function Post(Request $request)
    {


        Tipo::create($request->all());

        return 'Creado con exito';
    }


    public function Get(Tipo $tipo)
    {
        return view('tipos.show', compact('tipo'));
    }



    public function Update(Request $request, Tipo $tipo)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:tipos,nombre,' . $tipo->id,
            'descripcion' => 'nullable|string',
            // Agrega aquí más reglas de validación para otros campos
        ]);

        $tipo->update($request->all());

        return redirect()->route('tipos.index')
                         ->with('success', 'Tipo actualizado exitosamente.');
    }

    public function Delete(Tipo $tipo)
    {
        $tipo->delete();

        return redirect()->route('tipos.index')
                         ->with('success', 'Tipo eliminado exitosamente.');
    }
}
