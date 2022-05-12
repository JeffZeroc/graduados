<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      

        
        $tipo = auth()->user()->rol;
        $estado = auth()->user()->estado;
        if ( $tipo == 'secretaria' && $estado == 'Habilitado') {
            return Redirect("homeSecretaria")->with('mesaje','Secretaria');
        }elseif( $tipo == 'administrador' && $estado == 'Habilitado' ){
                return Redirect('principal')->with('mesaje','Administrador');
        }elseif( $tipo == 'secretaria' && $estado == 'Inhabilitado' ){
            auth()->logout();
            return Redirect('/home');
        }elseif( $tipo == 'administrador' && $estado == 'Inhabilitado' ){
            auth()->logout();
            return Redirect('/home');
        }
        else{
            return Redirect('/home');
        }
    }


}
