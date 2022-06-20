<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;

class ExcelController extends Controller
{

    /**
     * función que muestra la vista con todos los usuarios que obtiene de la base de datos
     */
    public function index(){

        $usuarios = User::all();

        return view('excel.excel', compact('usuarios'));
    }

    /**
     * función que permite importar hojas Excel, en este caso usuarios a la base de datos (tabla users)
     */
    public function importar(Request $request){

        if($request->hasFile('excel')){ //si el archivo subido es excel

            Excel::import(new UsersImport, 'users.xlsx');

            return redirect()->route('excel.excel');

        }

    }

    /**
     * función que permite exportar una hoja Excel desde la web, en este caso los usuarios de la base de datos
     *
     * @return void
     */
    public function exportar(){

        return Excel::download(new UsersExport, 'users.xlsx');
        
    }
    
}

