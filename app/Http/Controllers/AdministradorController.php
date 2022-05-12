<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['UsuariosAdmin'] = User::paginate(10);
        return view('listaUsuarios',$datos);  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'Hola';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $UsuariosAdmin = User::find($id);
        return view('listaUsuariosSHOW', ['UsuariosAdmin' => $UsuariosAdmin]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'rol' => ['required', 'string'],
            'estado' => ['required', 'string', 'max:255']
        ];

        $mensaje = [
            'name.required'=>'El nombre es requerido',
            'email.required'=>'El correo es requerido',
        ];

        $this->validate($request,$campos,$mensaje);

       

        $usuario = User::find($id);
        
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->rol = $request->rol;
        $usuario->estado = $request->estado;
        $usuario->save();
        $datos['UsuariosAdmin'] = User::paginate(10);
       /*  return view('listaUsuarios',$datos);   */
        return redirect()->route('inicio')->with('success', 'Usuario modificado correctamente');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return Redirect('listaUsuarios');  
    }
}
