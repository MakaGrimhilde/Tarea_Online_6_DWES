<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsuariosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(3);

        return view('usuarios.listarUsuarios', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.insertUsuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionRequest $datos)
    {
        $usuario = new User();

        $usuario->nick = $datos->nick;
        $usuario->nombre = $datos->nombre;
        $usuario->apellidos = $datos->apellidos;
        $usuario->email = $datos->email;
        $usuario->password = Hash::make($datos->password);
        $imgNombre = $datos->imagen->getClientOriginalName();
        $datos->imagen->move('blog/imagenes', $imgNombre);
        $usuario->imagen = $imgNombre;

        $usuario->save();

        //Inserción de la acción en la tabla logs
        $accion = ['accion' => 'Registro de nuevo usuario: '.$usuario->nick,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()];
        DB::table('logs')->insert($accion);

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findorFail($id);

        return view('usuarios.listarUsuario', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findorFail($id);

        return view('usuarios.editUsuario', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $datosNuevos, $usuario)
    {
        $datosNuevos->validate([
            'nick' => ['max:20', 'required'],
            'email' => ['email', 'required'],
            'imagen' => ['required', 'image']
        ]);

        $usuario = User::findorFail($usuario);

        $usuario->nick = $datosNuevos->nick;
        $usuario->email = $datosNuevos->email;
        $imgNomNueva = $datosNuevos->imagen->getClientOriginalName();
        $datosNuevos->imagen->move('blog/imagenes', $imgNomNueva);
        $usuario->imagen = $imgNomNueva;

        $usuario->save();

        //Inserción de la acción en la tabla logs
        $accion = ['accion' => 'Edición de datos del usuario: '.$usuario->nick,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()];
        DB::table('logs')->insert($accion);

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findorFail($id);
        $usuario->delete();

        //Inserción de la acción en la tabla logs
        $accion = ['accion' => 'Eliminado el usuario: '.$usuario->nick,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()];
        DB::table('logs')->insert($accion);

        return redirect()->route('usuarios.index');
    }

}
