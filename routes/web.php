<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\PdfController;
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

