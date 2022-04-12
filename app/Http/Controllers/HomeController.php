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
        if ( $tipo == 'secretaria' ) {
            return Redirect("homeSecretaria")->with('mesaje','Secretaria');
        }elseif( $tipo == 'administrador' ){
                return Redirect('principal')->with('mesaje','Administrador');
        }
    }


}
