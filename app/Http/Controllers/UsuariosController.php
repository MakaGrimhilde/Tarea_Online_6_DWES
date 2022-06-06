<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    public function mostrarNuevo(){

        return view('usuarios.insertUsuario');
    }

    public function insert(Request $datos){

        $usuario = new Usuario();

        $usuario->nick = $datos->nick;
        $usuario->nombre = $datos->nombre;
        $usuario->apellidos = $datos->apellidos;
        $usuario->email = $datos->email;
        $usuario->password = sha1($datos->password);
        $imgNombre = $datos->imagen->getClientOriginalName();
        $datos->imagen->move('imagenes', $imgNombre);
        $usuario->imagen = $imgNombre;

        $usuario->save();

        return redirect()->route('usuarios.mostrarUsuarios');

    }

    public function mostrarUsuarios(){

        $usuarios = Usuario::paginate(3);

        return view('usuarios.listarUsuarios', compact('usuarios'));
    }

    public function mostrarUsuario($id){

        $usuario = Usuario::findorFail($id);

        return view('usuarios.listarUsuario', compact('usuario'));
    }

    public function edit($id){

        $usuario = Usuario::findorFail($id);

        return view('usuarios.editUsuario', compact('usuario'));

    }

    public function update(Usuario $usuario, Request $datosNuevos){

        $usuario->nick = $datosNuevos->nick;
        $usuario->password = sha1($datosNuevos->password);
        $usuario->email = $datosNuevos->email;
        $imgNomNueva = $datosNuevos->imagen->getClientOriginalName();
        $datosNuevos->imagen->move('imagenes', $imgNomNueva);
        $usuario->imagen = $imgNomNueva;

        $usuario->save();
        return redirect()->route('usuarios.mostrarUsuarios');

    }

    public function destroy($id){

        $usuario = Usuario::findorFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.mostrarUsuarios');
        
    }
}
