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
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $tipo = auth()->user()->rol;
        $estado = auth()->user()->estado;
        // if ( $tipo == 'secretaria' && $estado == 'Habilitado') {
        //     return Redirect("homeSecretaria")->with('mesaje','Secretaria');
        // }elseif( $tipo == 'administrador' && $estado == 'Habilitado' ){
        //         return Redirect('principal')->with('mesaje','Administrador');
        // }
        // else{
        //     return Redirect('/home');
        // }

        return $tipo;
    }


}
