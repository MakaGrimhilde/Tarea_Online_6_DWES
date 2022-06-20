<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PdfController extends Controller
{
    public function pdfView(){

        $usuarios = User::all();

        return view('pdf.pdf_view', compact('usuarios'));
    }

    public function pdfGeneration(){

        $usuarios = User::all();

        $pdf_view = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->
        loadView('pdf.pdf_convert', compact('usuarios'))->setOptions(['defaultFont' => 'sans-serif']);
        
        //Inserción de la acción en la tabla logs
        $accion = ['accion' => 'Descarga PDF',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()];
        DB::table('logs')->insert($accion);
        
        return $pdf_view->download('descarga.pdf');

    }
}
