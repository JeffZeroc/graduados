<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Requisitos;
use Illuminate\Http\Request;

class requisitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Requisitos::all();
        return view('requisitosUsuarios',['datos' => $datos]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombreRequisito' => ['required', 'string', 'max:255'],
        ]);
        $todo = new Requisitos;
        $todo->nombreRequisito = $request->nombreRequisito;
        $todo->save();
    
        return redirect()->route('requisitos')->with('success', 'Se ha guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Requerimientos = Requisitos::find($id);
        return view('requisitosUsuariosSHOW', ['Requerimientos' => $Requerimientos]); 
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
        $this->validate($request, [
            'nombreRequisito' => ['required', 'string', 'max:255'],
        ]);
        $requisito = Requisitos::find($id);
        $requisito->nombreRequisito = $request->nombreRequisito;
        $requisito->save();
       
       /*  return view('listaUsuarios',$datos);   */
        return redirect()->route('requisitos')->with('success', 'Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Requisitos::destroy($id);
        return Redirect('requisitosUsuarios'); 
    }
}