<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/crearUsuario', function () {
    return view('crearUsuario');
});

Route::redirect('/','/crearUsuario');
Route::view('/crearUsuarios', 'crearUsuarios')->name('crearUsuarios');

Route::redirect('/','/listaUsuario');
Route::view('/listaUsuarios', 'listaUsuarios')->name('listaUsuarios');

Route::redirect('/','/restablecerPassword');
Route::view('/restablecerPassword', 'restablecerPassword')->name('restablecerPassword');

/********  Vistas del panel de SECRETARIA ****************/
Route::redirect('/','/menuSecretaria');
Route::view('/menuSecretaria', 'menuSecretaria')->name('menuSecretaria');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
