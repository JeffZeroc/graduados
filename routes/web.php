<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\SecretariaController;
use Illuminate\Support\Facades\Auth;
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


Route::get('crearUsuario', function () {
    return view('crearUsuario');
});
Route::get('listaUsuarios', function () {
    return view('listaUsuarios');
});
Route::get('restablecerPassword', function () {
    return view('restablecerPassword');
});
Route::get('homeSecretaria', function () {
    return view('homeSecretaria');
});

Route::get('registrodatoss', function () {
    return view('registroDatos');
});
Route::get('principal', function () {
    return view('home');
});
Route::get('listagraduados', function () {
    return view('tableDataSecretaria');
});

/* Route::redirect('/','/crearUsuario');
Route::view('/crearUsuarios', 'crearUsuarios')->name('crearUsuarios');

Route::redirect('/','/listaUsuario');
Route::view('/listaUsuarios', 'listaUsuarios')->name('listaUsuarios');

Route::redirect('/','/restablecerPassword');
Route::view('/restablecerPassword', 'restablecerPassword')->name('restablecerPassword'); */

/********  Vistas del panel de SECRETARIA ****************/
Route::redirect('/','/registroDatos');
Route::view('/registroDatos', 'registroDatos')->name('registroDatos');

Route::redirect('/','/tableDataSecretaria');
Route::view('/tableDataSecretaria', 'tableDataSecretaria')->name('tableDataSecretaria');

route::resource('administrador',AdministradorController::class);
route::resource('secretaria',SecretariaController::class);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
