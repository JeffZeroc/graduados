<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\requisitoController;
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

route::get('crearUsuario',[App\Http\Controllers\CarreraController::class,'index2'])->name('crearUsuario');
route::get('restablecerPassword',[App\Http\Controllers\CarreraController::class,'index3'])->name('restablecercontraAdmin');

/* route::get('tableDataSecretaria',[App\Http\Controllers\CarreraController::class,'index5'])->name('tableDataSecretaria2');
 */

/* Route::get('listaUsuarios', function () {
    return view('listaUsuarios');
}); */
/* Route::get('restablecerPassword', function () {
    return view('restablecerPassword');
}); */
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

route::get('listaUsuarios',[App\Http\Controllers\AdministradorController::class,'index'])->name('inicio');
route::delete('listaUsuarios/{id}',[App\Http\Controllers\AdministradorController::class,'destroy']);
route::resource('secretaria',SecretariaController::class);
route::get('listaUsuarios/{id}',[App\Http\Controllers\AdministradorController::class,'show'])->name('usuario-show');
route::patch('listaUsuariosSHOW/{id}',[App\Http\Controllers\AdministradorController::class,'update'])->name('usuario-save');

route::get('requisitosUsuarios',[App\Http\Controllers\requisitoController::class,'index'])->name('requisitos');
route::post('requisitosUsuarios',[App\Http\Controllers\requisitoController::class,'store'])->name('requisitos_save');
route::delete('requisitosUsuarios/{id}',[App\Http\Controllers\requisitoController::class,'destroy'])->name('requerimientos-delete');
route::get('requisitosUsuarios/{id}',[App\Http\Controllers\requisitoController::class,'show'])->name('requerimientos-show');
route::patch('requisitosUsuariosShow/{id}',[App\Http\Controllers\requisitoController::class,'update'])->name('requerimientos-update');

route::get('periodoAcademico',[App\Http\Controllers\PeriodoController::class,'index'])->name('periodo');
route::post('periodoAcademico',[App\Http\Controllers\PeriodoController::class,'store'])->name('periodo_save');
route::delete('periodoAcademico/{id}',[App\Http\Controllers\PeriodoController::class,'destroy'])->name('periodo-delete');
route::get('periodoAcademico/{id}',[App\Http\Controllers\PeriodoController::class,'show'])->name('periodo-show');
route::patch('periodoAcademico/{id}',[App\Http\Controllers\PeriodoController::class,'update'])->name('periodo_update');

route::get('facultad',[App\Http\Controllers\FacultadController::class,'index'])->name('facultad');
route::post('facultad',[App\Http\Controllers\FacultadController::class,'store'])->name('facultad_save');
route::delete('facultad/{id}',[App\Http\Controllers\FacultadController::class,'destroy'])->name('facultad-delete');
route::get('facultad/{id}',[App\Http\Controllers\FacultadController::class,'show'])->name('facultad-show');
route::patch('facultad/{id}',[App\Http\Controllers\FacultadController::class,'update'])->name('facultad_update');

route::get('carrera',[App\Http\Controllers\CarreraController::class,'index'])->name('carrera');
route::post('carrera',[App\Http\Controllers\CarreraController::class,'store'])->name('carrera_save');
route::get('carrera/{id}',[App\Http\Controllers\CarreraController::class,'show'])->name('carrera-show');
route::patch('carrera/{id}',[App\Http\Controllers\CarreraController::class,'update'])->name('carrera_update');

route::get('registroDatos',[App\Http\Controllers\EstudianteController::class,'index'])->name('registrodatos');


route::post('crearUsuario',[RegisterController::class,'register']);/* ESTÁ EN UN VEREMOS  */
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
