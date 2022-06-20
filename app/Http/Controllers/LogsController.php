<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class LogsController extends Controller
{   
    /**
     * función index que obtiene todos los registros de la tabla logs y devuelve la vista en la que se visualizarán
     *
     * @return void
     */
    public function index(){

        $logs = Log::paginate(10);

        return view('logs.logView', compact('logs'));
    }

    /**
     * función que elimina un registro de la tabla logs en cuestión según su id
     *
     * @param int $id
     * @return void
     */
    public function destroy($id){

        $log = Log::findorFail($id);
        $log->delete();

        return redirect()->route('logs.logs');
    }

    /**
     * función que obtiene todos los registros de la tabla para mostrarlos en la vista para el pdf
     *
     * @return void
     */
    public function pdfView(){

        $logs = Log::all();

        return view('logs.logPdfView', compact('logs'));
    }

    /**
     * función que obtiene los registros de la tabla y genera con ellos un pdf mediante la librería DomPDF
     *
     * @return void
     */
    public function pdfGeneration(){

        $logs = Log::all();

        $pdf_view = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->
        loadView('logs.logPdfConvert', compact('logs'))->setOptions(['defaultFont' => 'sans-serif']);
        
        return $pdf_view->download('descarga_logs.pdf');

    }
}
