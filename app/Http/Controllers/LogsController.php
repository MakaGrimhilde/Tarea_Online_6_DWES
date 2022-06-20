<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class LogsController extends Controller
{   
    
    public function index(){

        $logs = Log::paginate(10);

        return view('logs.logView', compact('logs'));
    }


    public function destroy($id){

        $log = Log::findorFail($id);
        $log->delete();

        return redirect()->route('logs.logs');
    }

    public function pdfView(){

        $logs = Log::all();

        return view('logs.logPdfView', compact('logs'));
    }

    public function pdfGeneration(){

        $logs = Log::all();

        $pdf_view = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->
        loadView('logs.logPdfConvert', compact('logs'))->setOptions(['defaultFont' => 'sans-serif']);
        
        return $pdf_view->download('descarga_logs.pdf');

    }
}
