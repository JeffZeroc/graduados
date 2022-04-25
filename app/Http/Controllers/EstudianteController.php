<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\Facultad;
use App\Models\Periodo;
use App\Models\Requisitos;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facultades = Facultad::all();
        $periodos = Periodo::all();
        $carreras = Carrera::all();
        $requisitos = Requisitos::all();
     /*    $requisitos = Requisitos::with('Estudiantes')->get();
        return view('registroDatos' , compact('requisitos'),['requisitos1' => $requisitos1]);  */
        return view('registroDatos' ,['requisitos' => $requisitos, 'carreras' => $carreras, 'periodos' => $periodos, 'facultades' => $facultades]);
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
            'Cedula_Estudiante' => ['required','numeric','digits:10'],
            'Nombre_Estudiante' => ['required', 'string', 'max:255'],
            'Apellido_Estudiante' => ['required', 'string', 'max:255'],
            'Telefono_Estudiante' => ['required','numeric','digits:10'],
            'Nombre_CursoE' => ['required', 'string', 'max:255'],
            'Correo_InstitucionalE' => ['required', 'string', 'max:255'],
            'Correo_PersonalE' => ['required', 'string', 'max:255'],
            'Correo_PersonalE' => ['required', 'string', 'max:255'],
            'carrera_id' => ['required','numeric','digits:1'],
            'Estado_Estudiante' => ['required', 'string', 'max:255'],
            'valorRequisito' => ['required','numeric','digits:1'],
            'Nombre_Periodo' => ['required', 'string', 'max:255']
        ]);
        
        $todo = new Estudiante;
        $todo->Cedula_Estudiante = $request->Cedula_Estudiante;
        $todo->Nombre_Estudiante = $request->Nombre_Estudiante;
        $todo->Apellido_Estudiante = $request->Apellido_Estudiante;
        $todo->Telefono_Estudiante = $request->Telefono_Estudiante;
        $todo->Nombre_CursoE = $request->Nombre_CursoE;
        $todo->Correo_InstitucionalE = $request->Correo_InstitucionalE;
        $todo->Correo_PersonalE = $request->Correo_PersonalE;
        $todo->carrera_id = $request->carrera_id;
        $todo->Estado_Estudiante = $request->Estado_Estudiante;
        $todo->newPivot->valorRequisito = $request->valorRequisito;
        $todo->save();
    
        return redirect()->route('registrodatos')->with('success', 'Se ha guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        //
    }
}
