<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facultades = Facultad::all();
        return view('facultad',['facultades' => $facultades]);
       /*  return view('requisitosUsuarios');  */
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
            'Nombre_Facultad' => ['required', 'string', 'max:255']
        ]);
        
        $todo = new Facultad;
        $todo->Nombre_Facultad = $request->Nombre_Facultad;
        $todo->save();
    
        return redirect()->route('facultad')->with('success', 'Se ha guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facultades = Facultad::find($id);
        return view('facultadShow', ['facultades' => $facultades]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function edit(Facultad $facultad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Nombre_Facultad' => ['required', 'string', 'max:255']
        ]);
        $todo = Facultad::find($id);
        $todo->Nombre_Facultad = $request->Nombre_Facultad;
        $todo->save();
       
        return redirect()->route('facultad')->with('success', 'Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Facultad::destroy($id);
        return Redirect('facultad'); 
    }
}