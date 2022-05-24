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
use Illuminate\Validation\Rule;

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
        $facultades = Facultad::all();
        /* return $requisitos2[0]{'nombreRequisito'}; */
        return view('tableDataSecretaria' , compact('estudiantes','estudianteRequisitos','facultades'));
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
            'cedula' => ['required','string','max:10','min:10'],
            'nombre'=> ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required'],
            'edad' => ['required', 'numeric'],
            'genero' => ['required', 'string', 'max:1'],
            'convencional'=> [ 'string', 'max:10'],
            'etnia' => ['required', 'string', 'max:255'],
            'nacionalidad_etnica' => ['string', 'max:255'],
            'discapacidad' => ['required', 'string', 'max:255'],
            'estado_civil' => ['required', 'string', 'max:255'],
            'pais' => ['required', 'string', 'max:255'],
            'telefono' => ['required','string','max:10','min:10'],
            'curso' => ['required', 'string', 'max:255'],
            'correo_institucional' => ['required', 'unique:estudiantes,Correo_InstitucionalE', 'string', 'max:255'],
            'correo_personal' => ['required','unique:estudiantes,Correo_PersonalE', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'periodo_id'  => ['required','numeric'],
            'carrera_id' => ['required','numeric'],
            
        ];

        $mensaje = [
            'cedula.required'=>'La cédula es requerida',
            'fecha_nacimiento.required'=>'La fecha es requerida',
            'pais.required'=>'El pais es requerido',
            'estado_civil.required'=>'El estado civil es requerido',
            'discapacidad.required'=>'La discapacidad es requerida',
            'nacionalidad_etnica.required'=>'La nacionalidad etnica es requerida',
            'etnia.required'=>'La etnia es requerida',
            'convencional.required'=>'El convencional es requerido',
            'genero.required'=>'El genero es requerido',
            'cedula.max'=>'La cedula debe tener 10 digitos',
            'cedula.min'=>'La cedula debe tener 10 digitos',
            'nombre.required'=>'El nombre es requerido',
            'apellido_paterno.required'=>'El apellido paterno es requerido',
            'apellido_materno.required'=>'El apellido materno es requerido',
            'telefono.required'=>'El teléfono es un campo requerido',
            'telefono.max'=>'El teléfono debe tener 10 dígitos',
            'telefono.min'=>'El teléfono debe tener 10 dígitos',
            'curso.required'=>'El nombre del curso es un campo requerido',
            'correo_institucional.required'=>'El correo institucional es un campo requerido',
            'oorreo_personal.required'=>'El correo personal es un campo requerido',
            'carrera_id.required'=>'La carrera es un campo requerido',
            'estado.required'=>'El estado es un campo requerido',
            'periodo_id.required'=>'El periodo academico es un campo requerido',
            'correo_institucional.unique'=>'El correo institucional debe ser unico',
            'oorreo_personal.unique'=>'El correo personal debe ser unico',
        ];
        

        $this->validate($request,$campos,$mensaje);

        $requisitos = Requisitos::all();
        
        $todo = new Estudiante;
        $todo->cedula = $request->cedula;
        //nombre
        $arrayNombre = explode(' ', $request->apellido_paterno);
        $todo->apellido_paterno =$arrayNombre[0];
        $todo->apellido_materno =$arrayNombre[1];
        $todo->nombre = $request->nombre;
        $todo->telefono = $request->telefono;
        $todo->curso = $request->curso;
        $todo->correo_institucional = $request->correo_institucional;
        $todo->correo_personal = $request->correo_personal;
        $todo->carrera_id = $request->carrera_id;
        $todo->estado = $request->estado;
        $todo->periodo_id = $request->periodo_id;
        $todo->edad = $request->edad;
        $todo->genero = $request->genero;
        $todo->convencional = $request->convencional;
        $todo->etnia = $request->etnia;
        $todo->nacionalidad_etnica = $request->nacionalidad_etnica;
        $todo->discapacidad = $request->discapacidad;
        $todo->estado_civil = $request->estado_civil;
        $todo->pais = $request->pais;
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
            'cedula' => [
                'required',
                Rule::unique('estudiantes')->ignore($id),
                'digits:10',
            ],
            'nombre'=> ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required'],
            'edad' => ['required', 'numeric'],
            'genero' => ['required', 'string', 'max:1'],
            'convencional'=> ['string', 'max:10'],
            'etnia' => ['required', 'string', 'max:255'],
            'nacionalidad_etnica' => ['string', 'max:255'],
            'discapacidad' => ['required', 'string', 'max:255'],
            'estado_civil' => ['required', 'string', 'max:255'],
            'pais' => ['required', 'string', 'max:255'],
            'celular' => ['required','string','max:10','min:10'],
            'curso' => ['required', 'string', 'max:255'],
            'correo_institucional' => ['required', 'string', 'max:255'],
            'Correo_personal' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'periodo_id'  => ['required','numeric'],
            'carrera_id' => ['required','numeric'],
            
        ];

        $mensaje = [
            'cedula.required'=>'La cédula es requerida',
            'fecha_nacimiento.required'=>'La fecha es requerida',
            'pais.required'=>'El pais es requerido',
            'estado_civil.required'=>'El estado civil es requerido',
            'discapacidad.required'=>'La discapacidad es requerida',
            'nacionalidad_etnica.required'=>'La nacionalidad etnica es requerida',
            'etnia.required'=>'La etnia es requerida',
            'convencional.required'=>'El convencional es requerido',
            'genero.required'=>'El genero es requerido',
            'cedula.max'=>'La cedula debe tener 10 digitos',
            'cedula.min'=>'La cedula debe tener 10 digitos',
            'nombre.required'=>'El nombre es requerido',
            'apellido_paterno.required'=>'El apellido paterno es requerido',
            'apellido_materno.required'=>'El apellido materno es requerido',
            'celular.required'=>'El teléfono es un campo requerido',
            'celular.max'=>'El teléfono debe tener 10 dígitos',
            'celular.min'=>'El teléfono debe tener 10 dígitos',
            'curso.required'=>'El nombre del curso es un campo requerido',
            'correo_institucional.required'=>'El correo institucional es un campo requerido',
            'Correo_personal.required'=>'El correo personal es un campo requerido',
            'carrera_id.required'=>'La carrera es un campo requerido',
            'estado.required'=>'El estado es un campo requerido',
            'periodo_id.required'=>'El periodo academico es un campo requerido',
        ];

        $this->validate($request,$campos,$mensaje);

        $requisitos = Requisitos::all();
        
        $todo = Estudiante::find($id);
        $todo->cedula = $request->cedula;
        //nombre
        $arrayNombre = explode(' ', $request->apellido_paterno);
        $todo->apellido_paterno =$arrayNombre[0];
        $todo->apellido_materno =$arrayNombre[1];
        $todo->nombre = $request->nombre;
        $todo->celular = $request->celular;
        $todo->curso = $request->curso;
        $todo->correo_institucional = $request->correo_institucional;
        $todo->Correo_personal = $request->Correo_personal;
        $todo->carrera_id = $request->carrera_id;
        $todo->estado = $request->estado;
        $todo->periodo_id = $request->periodo_id;
        $todo->edad = $request->edad;
        $todo->genero = $request->genero;
        $todo->convencional = $request->convencional;
        $todo->etnia = $request->etnia;
        $todo->nacionalidad_etnica = $request->nacionalidad_etnica;
        $todo->discapacidad = $request->discapacidad;
        $todo->estado_civil = $request->estado_civil;
        $todo->pais = $request->pais;
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
        return redirect()->route('tableDataSecretaria2')->with('success', 'Se ha guardado correctamente');
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
