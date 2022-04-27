<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Http\Controllers\Controller;
use App\Models\Facultad;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Facultad::with('carreras')->get();
        return view('carrera' , compact('usuarios'));
        /* $carreras = Carrera::all();
        return view('carrera',['carreras' => $carreras]); */
    }
    public function index2()
    {
        return view('crearUsuario');  
    }
    public function index3()
    {
        return view('restablecerPassword');  
    }
   
    public function index5()
    {
        return view('tableDataSecretaria');  
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'CODIGO_EJECUTAR' => ['required','numeric','digits:5'],
            'Nombre_Carrera' => ['required', 'string', 'max:255'],
            'Codigo_Carrera' => ['required','unique:carreras,Codigo_Carrera','numeric','digits:5'],
            'Duracion_Carrera' => ['required','numeric','digits:1'],
            'Estado_Carrera' => ['required', 'string', 'max:255'],
            'facultad_id' => ['required']
        ];

        $mensaje = [
            'CODIGO_EJECUTAR.required'=>'El codigo es requerido',
            'CODIGO_EJECUTAR.digits'=>'El codigo debe tener cinco digitos',
            'Nombre_Carrera.required'=>'LLene el nombre de forma correcta',
            'Codigo_Carrera.required'=>'El codigo de carrera es requerido',
            'Codigo_Carrera.digits'=>'El codigo debe tener cinco digitos',
            'Duracion_Carrera.required'=>'Ingrese los semestres que corresponde la carrera',
            'Estado_Carrera.required'=>'Ingrese el estado de forma correcta',
            'facultad_id.required'=>'Ingrese la facultad'
        ];

        $this->validate($request,$campos,$mensaje);

        $todo = new Carrera;
        $todo->CODIGO_EJECUTAR = $request->CODIGO_EJECUTAR;
        $todo->Nombre_Carrera = $request->Nombre_Carrera;
        $todo->Codigo_Carrera = $request->Codigo_Carrera;
        $todo->Duracion_Carrera = $request->Duracion_Carrera;
        $todo->Estado_Carrera = $request->Estado_Carrera;
        $todo->facultad_id = $request->facultad_id;
        $todo->save();
    
        return redirect()->route('carrera')->with('success', 'Se ha guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carreras = Carrera::find($id);
        $usuarios = Facultad::with('carreras')->get();
        return view('carreraShow' , compact('usuarios'), ['carreras' => $carreras]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'CODIGO_EJECUTAR' => ['required','numeric','digits:5'],
            'Nombre_Carrera' => ['required', 'string', 'max:255'],
            'Codigo_Carrera' => ['required','numeric','digits:5'],
            'Duracion_Carrera' => ['required','numeric','digits:1'],
            'Estado_Carrera' => ['required', 'string', 'max:255'],
            'facultad_id' => ['required']
        ];

        $mensaje = [
            'CODIGO_EJECUTAR.required'=>'El codigo es requerido',
            'CODIGO_EJECUTAR.digits'=>'El codigo debe tener cinco digitos',
            'Nombre_Carrera.required'=>'LLene el nombre de forma correcta',
            'Codigo_Carrera.required'=>'El codigo de carrera es requerido',
            'Codigo_Carrera.digits'=>'El codigo debe tener cinco digitos',
            'Duracion_Carrera.required'=>'Ingrese los semestres que corresponde la carrera',
            'Estado_Carrera.required'=>'Ingrese el estado de forma correcta',
            'facultad_id.required'=>'Ingrese la facultad'
        ];

        $this->validate($request,$campos,$mensaje);
        
        $todo = Carrera::find($id);
        $todo->CODIGO_EJECUTAR = $request->CODIGO_EJECUTAR;
        $todo->Nombre_Carrera = $request->Nombre_Carrera;
        $todo->Codigo_Carrera = $request->Codigo_Carrera;
        $todo->Duracion_Carrera = $request->Duracion_Carrera;
        $todo->Estado_Carrera = $request->Estado_Carrera;
        $todo->facultad_id = $request->facultad_id;
        $todo->save();
    
        return redirect()->route('carrera')->with('success', 'Se ha guardado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        //
    }
}
