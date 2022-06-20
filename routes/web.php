<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\LogsController;
use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'authenticate'])->name('login');

//RUTA PÁGINA DE INICIO
Route::get('inicio', function (){
    return view('inicio');
})->name('inicio');

//Route::resource('usuarios', UsuariosController::class);
//Route::resource('entradas', EntradasController::class);

//USUARIOS
Route::get('blog/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
Route::get('blog/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
Route::post('blog/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::get('blog/usuarios/{usuario}', [UsuariosController::class, 'show'])->name('usuarios.show');
Route::get('blog/usuarios{usuario}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');
Route::put('blog/usuarios/{usuario}', [UsuariosController::class, 'update'])->name('usuarios.update');
Route::get('blog/usuarios{usuario}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');

//ENTRADAS
Route::get('blog/entradas', [EntradasController::class, 'index'])->name('entradas.index');
Route::get('blog/entradas/create', [EntradasController::class, 'create'])->name('entradas.create');
Route::post('blog/entradas', [EntradasController::class, 'store'])->name('entradas.store');
Route::get('blog/entradas/{entrada}', [EntradasController::class, 'show'])->name('entradas.show');
Route::get('blog/entradas{entrada}/edit', [EntradasController::class, 'edit'])->name('entradas.edit');
Route::put('blog/entradas/{entrada}', [EntradasController::class, 'update'])->name('entradas.update');
Route::get('blog/entradas{entrada}', [EntradasController::class, 'destroy'])->name('entradas.destroy');

//PDF
Route::get('usuarios/pdf/view', [PdfController::class, 'pdfView'])->name('pdf.view');
Route::get('usuarios/pdf/convert', [PdfController::class, 'pdfGeneration'])->name('pdf.convert');

//EMAILS
Route::get('blog/contacto', function (){

    $email = new ContactoMailable;

    Mail::to('simtoclatro@gmail.com')->send($email);

    return redirect()->route('inicio');
});

//BUSCADOR
Route::get('blog/busqueda', [EntradasController::class, 'buscar'])->name('entradas.buscar');

//EXCEL
Route::get('blog/excel/view', [ExcelController::class, 'index'])->name('excel.excel');
Route::post('blog/excel/importar', [ExcelController::class, 'importar'])->name('excel.importar');
Route::get('blog/excel/exportar', [ExcelController::class, 'exportar'])->name('excel.exportar');

//LOGS
Route::get('blog/logs', [LogsController::class, 'index'])->name('logs.logs');
Route::get('blog/logs/{log}', [LogsController::class, 'destroy'])->name('logs.destroy');
Route::get('logs/view', [LogsController::class, 'pdfView'])->name('logs.view');
Route::get('logs/convert', [LogsController::class, 'pdfGeneration'])->name('logs.convert');

