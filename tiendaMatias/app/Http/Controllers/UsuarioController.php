<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    public function GetLista()
    {
        $usuarios = Usuario::all();
        return view('Usuarios.listaUsuario', compact('usuarios'));
    }


    public function Post(Request $request)
    {
        Usuario::create($request->all());
        return 'Creado con exito';
    }

    public function GetEditarData(int $id)
    {
        $usuario = Usuario::find($id);

        return view('Usuarios.editarUsuario', compact('usuario'));
    }

    public function Update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $data = $request->all();


        // Encriptar la contraseña solo si fue enviada
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // No actualizar si está vacía
        }

        // Actualizar con los datos filtrados
        $usuario->update($data);

        return 'Actualizado con éxito';
    }

    public function Delete(int $id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();


        $usuarios = Usuario::all();
        return view('Usuarios.listaUsuario', compact('usuarios'));
    }
}
