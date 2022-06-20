<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas = Entrada::sortable()->paginate(3); 

        return view('entradas.listarEntradas', compact('entradas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entradas.insertEntradas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //validación de los campos
        $request->validate([
            'titulo' => ['required', 'max:50'],
            'descripcion' => ['required'],
            'imagen' => ['required', 'image']
        ]);
        
        $entrada = new Entrada();

        $entrada->usuario_id = 1;
        $entrada->categoria_id = 2;
        $entrada->titulo = $request->titulo;
        $entrada->descripcion = $request->descripcion;
        $imgNombre = $request->imagen->getClientOriginalName();
        $request->imagen->move('blog/imagenes', $imgNombre);
        $entrada->imagen = $imgNombre;
        

        $entrada->save();

        //Inserción de la acción en la tabla logs
        $accion = ['accion' => 'Registro de nueva entrada: '.$entrada->titulo,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()];
        DB::table('logs')->insert($accion);

        return redirect()->route('entradas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrada = Entrada::findorFail($id);

        return view('entradas.listarEntrada', compact('entrada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrada = Entrada::findorFail($id);
        
        return view('entradas.editEntrada', compact('entrada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $datosNuevos, $entrada)
    {   
        //validación de los campos
        $datosNuevos->validate([
            'titulo' => ['required', 'max:50'],
            'descripcion' => ['required'],
            'imagen' => ['required', 'image']
        ]);

        $entrada = Entrada::findorFail($entrada);

        $entrada->titulo = $datosNuevos->titulo;
        $entrada->descripcion = $datosNuevos->descripcion;
        $imgNomNueva = $datosNuevos->imagen->getClientOriginalName();
        $datosNuevos->imagen->move('blog/imagenes', $imgNomNueva);
        $entrada->imagen = $imgNomNueva;

        $entrada->save();

        //Inserción de la acción en la tabla logs
        $accion = ['accion' => 'Edición de datos de la entrada: '.$entrada->titulo,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()];
        DB::table('logs')->insert($accion);

        return redirect()->route('entradas.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entrada = Entrada::findorFail($id);
        $entrada->delete();

        //Inserción de la acción en la tabla logs
        $accion = ['accion' => 'Eliminada la entrada: '.$entrada->titulo,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()];
        DB::table('logs')->insert($accion);

        return redirect()->route('entradas.index');
    }

    /**
     * función para buscar registros (entradas) en una barra de búsqueda
     */
    public function buscar(){

        $busqueda = $_GET['buscar'];
        $resultado = Entrada::where('titulo','LIKE','%'.$busqueda.'%')->get();

        return view('entradas.resultadoBusqueda', compact('resultado'));
    }
}
