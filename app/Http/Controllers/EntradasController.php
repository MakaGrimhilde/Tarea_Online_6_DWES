<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradasController extends Controller
{
    public function mostrarNueva(){

        return "awiwi";
    }

    public function mostrarEntradas(){

        $entradas = Entrada::paginate(3);

        return view('entradas.listarEntradas', compact('entradas'));
    }
}
