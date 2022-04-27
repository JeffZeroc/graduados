<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\estudianteRequisito;
use App\Models\Facultad;
use App\Models\Periodo;
use App\Models\Requisitos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function index2()
    {
        $estudianteRequisitos = estudianteRequisito::get();
        $estudiantes = Estudiante::get();
        /* return $requisitos2[0]{'nombreRequisito'}; */
        return view('tableDataSecretaria' , compact('estudiantes','estudianteRequisitos'));
        //return $estudiantes;
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

        $campos = [
            'Cedula_Estudiante' => ['required','numeric','digits:10'],
            'Nombre_Estudiante' => ['required', 'string', 'max:255'],
            'Apellido_Estudiante' => ['required', 'string', 'max:255'],
            'Telefono_Estudiante' => ['required','numeric','digits:10'],
            'Nombre_CursoE' => ['required', 'string', 'max:255'],
            'Correo_InstitucionalE' => ['required', 'unique:estudiantes,Correo_InstitucionalE', 'string', 'max:255'],
            'Correo_PersonalE' => ['required','unique:estudiantes,Correo_PersonalE', 'string', 'max:255'],
            'carrera_id' => ['required','numeric'],
            'Estado_Estudiante' => ['required', 'string', 'max:255'],
            'periodo_id' => ['required','numeric']
        ];

        $mensaje = [
            'Cedula_Estudiante.required'=>'La cédula es requerida',
            'Cedula_Estudiante.digits'=>'La cedula debe tener 10 digitos',
            'Nombre_Estudiante.required'=>'El nombre es requerido',
            'Apellido_Estudiante.required'=>'El apellido es requerido',
            'Telefono_Estudiante.required'=>'El teléfono es un campo requerido',
            'Telefono_Estudiante.digits'=>'El teléfono debe tener 10 dígitos',
            'Nombre_CursoE.required'=>'El nombre del curso es un campo requerido',
            'Correo_InstitucionalE.required'=>'El correo institucional es un campo requerido',
            'Correo_InstitucionalE.unique'=>'El correo institucional debe ser unico',
            'Correo_PersonalE.required'=>'El correo personal es un campo requerido',
            'Correo_PersonalE.unique'=>'El correo personal debe ser unico',
            'carrera_id.required'=>'La carrera es un campo requerido',
            'Estado_Estudiante.required'=>'El estado es un campo requerido',
            'periodo_id.required'=>'El periodo academico es un campo requerido',
        ];

        $this->validate($request,$campos,$mensaje);

        $requisitos = Requisitos::all();
        
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
        $todo->periodo_id = $request->periodo_id;
        $todo->save();

        $idAreaRecienGuardada = $todo->id;

        $num = 0;
        foreach($requisitos as $requisito){
            $todo2 = new estudianteRequisito; 
            $todo2->estudiante_id = $idAreaRecienGuardada;
            $todo2->requisito_id = $requisito->id;
            $todo2->valorRequisito = $request->requisito_id[$num];
            $num++;
            $todo2->save();
        }
        return redirect()->route('registrodatos')->with('success', 'Se ha guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
        $pivote = estudianteRequisito::find($id);
        $estudiantes = Estudiante::find($id);
        $facultades = Facultad::all();
        $periodos = Periodo::all();
        $carreras = Carrera::all();
        $requisitos = Requisitos::all();
     /*    $requisitos = Requisitos::with('Estudiantes')->get();
        return view('registroDatos' , compact('requisitos'),['requisitos1' => $requisitos1]);  */
        return view('registroDatosShow' ,['requisitos' => $requisitos, 'carreras' => $carreras, 'periodos' => $periodos, 'facultades' => $facultades, 'estudiantes' => $estudiantes, 'pivote' => $pivote]);
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
    public function update(Request $request, $id)
    {
        $campos = [
            'Cedula_Estudiante' => ['required','numeric','digits:10'],
            'Nombre_Estudiante' => ['required', 'string', 'max:255'],
            'Apellido_Estudiante' => ['required', 'string', 'max:255'],
            'Telefono_Estudiante' => ['required','numeric','digits:10'],
            'Nombre_CursoE' => ['required', 'string', 'max:255'],
            'Correo_InstitucionalE' => ['required', 'string', 'max:255'],
            'Correo_PersonalE' => ['required', 'string', 'max:255'],
            'carrera_id' => ['required','numeric'],
            'Estado_Estudiante' => ['required', 'string', 'max:255'],
            'periodo_id' => ['required','numeric']
        ];

        $mensaje = [
            'Cedula_Estudiante.required'=>'La cédula es requerida',
            'Cedula_Estudiante.digits'=>'La cedula debe tener 10 digitos',
            'Nombre_Estudiante.required'=>'El nombre es requerido',
            'Apellido_Estudiante.required'=>'El apellido es requerido',
            'Telefono_Estudiante.required'=>'El teléfono es un campo requerido',
            'Telefono_Estudiante.digits'=>'El teléfono debe tener 10 dígitos',
            'Nombre_CursoE.required'=>'El nombre del curso es un campo requerido',
            'Correo_InstitucionalE.required'=>'El correo institucional es un campo requerido',
            'Correo_PersonalE.required'=>'El correo personal es un campo requerido',
            'carrera_id.required'=>'La carrera es un campo requerido',
            'Estado_Estudiante.required'=>'El estado es un campo requerido',
            'periodo_id.required'=>'El periodo academico es un campo requerido',
        ];

        $this->validate($request,$campos,$mensaje);

        $requisitos = Requisitos::all();
        
        $todo = Estudiante::find($id);
        $todo->Cedula_Estudiante = $request->Cedula_Estudiante;
        $todo->Nombre_Estudiante = $request->Nombre_Estudiante;
        $todo->Apellido_Estudiante = $request->Apellido_Estudiante;
        $todo->Telefono_Estudiante = $request->Telefono_Estudiante;
        $todo->Nombre_CursoE = $request->Nombre_CursoE;
        $todo->Correo_InstitucionalE = $request->Correo_InstitucionalE;
        $todo->Correo_PersonalE = $request->Correo_PersonalE;
        $todo->carrera_id = $request->carrera_id;
        $todo->Estado_Estudiante = $request->Estado_Estudiante;
        $todo->periodo_id = $request->periodo_id;
        $todo->save();

        $todo2 = estudianteRequisito::all();
        
        $nume = 0;
        foreach($todo2 as $re){
            if($re->estudiante_id == $id){
                foreach ($requisitos as $requisito ) {
                    if ($re->requisito_id == $requisito->id) {
                        $re->valorRequisito = $request->requisito_id[$nume];
                    }
                }
                $nume++;
                $re->save();
            }
        }
        //return $todo2;
        return redirect()->route('registrodatos')->with('success', 'Se ha guardado correctamente');
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
