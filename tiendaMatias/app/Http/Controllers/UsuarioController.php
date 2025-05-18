<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\Usuario;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class UsuarioController extends Controller
{
    public function GetLista()
    {
        $check = $this->comprobarInicio();
        if ($check) {
            return $check;
        }

        $usuarios = Usuario::all();
        return view('Usuarios.listaUsuario', compact('usuarios'));
    }


    public function Post(Request $request)
    {
        if (empty($request['imagenUrl'])) { // Imagen default
            $request['imagenUrl'] = "data:image/png;base64,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";
        }
        Usuario::create($request->all());
        return 'Creado con exito';
    }

    public function GetEditarData(int $id)
    {
        $check = $this->comprobarInicio();
        if ($check) {
            return $check;
        }

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


    public function Login(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|email',
            'password' => 'required|string',
        ]);

        $usuario = Usuario::where('correo', $request->correo)
            ->where('nombre', $request->nombre)
            ->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return back()->with('error', 'Credenciales incorrectas');
        }

        session([
            'usuario_id' => $usuario->id,
            'usuario_nombre' => $usuario->nombre,
            'usuario_rol' => $usuario->rol,
            'usuario_imagen' => $usuario->imagenUrl,
        ]);

        if ($request->recordar == 1) {
            return response() // Dura una semana
                ->view('layouts.inicio')
                ->withCookie(cookie('usuario_nombre', $usuario->nombre, 10080))
                ->withCookie(cookie('usuario_correo', $usuario->correo, 10080));
        }

        return view('layouts.inicio');
    }

    public function GetPerfil()
    {
        $check = $this->comprobarInicio();
        if ($check) {
            return $check;
        }

        $id =  session('usuario_id');

        $usuario = Usuario::find($id);

        return view('Usuarios.editarPerfil', compact('usuario'));
    }
}
