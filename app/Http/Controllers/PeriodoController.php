<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['periodos'] = Periodo::paginate(10);
        return view('periodoAcademico',$datos); 
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
            'Inicio_Periodo' => ['required', 'date'],
            'Fin_Periodo' => ['required', 'date'],
            'Nombre_Periodo' => ['required', 'string', 'max:255']
        ];

        $mensaje = [
            'Inicio_Periodo.required'=>'Establesca una fecha para INICIO del periodo académico',
            'Fin_Periodo.required'=>'Establesca una fecha para FIN del periodo',
            'Nombre_Periodo.required'=>'El nombre es un campo requerido'
        ];

        $this->validate($request,$campos,$mensaje);
       
        
        $todo = new Periodo;
        $todo->Inicio_Periodo = $request->Inicio_Periodo;
        $todo->Fin_Periodo = $request->Fin_Periodo;
        $todo->Nombre_Periodo = $request->Nombre_Periodo;
        $todo->save();
    
        return redirect()->route('periodo')->with('success', 'Se ha guardado correctamente');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $periodos = Periodo::find($id);
        return view('periodoAcademicoShow', ['periodos' => $periodos]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodo $periodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'Inicio_Periodo' => ['required', 'date'],
            'Fin_Periodo' => ['required', 'date'],
            'Nombre_Periodo' => ['required', 'string', 'max:255']
        ];

        $mensaje = [
            'Inicio_Periodo.required'=>'Establesca una fecha para INICIO del periodo académico',
            'Fin_Periodo.required'=>'Establesca una fecha para FIN del periodo',
            'Nombre_Periodo.required'=>'El nombre es un campo requerido'
        ];

        $this->validate($request,$campos,$mensaje);
        
        $todo = Periodo::find($id);
        $todo->Inicio_Periodo = $request->Inicio_Periodo;
        $todo->Fin_Periodo = $request->Fin_Periodo;
        $todo->Nombre_Periodo = $request->Nombre_Periodo;
        $todo->save();

        return redirect()->route('periodo')->with('success', 'Periodo académico fue modificado con exito');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Periodo::destroy($id);
        return Redirect('periodoAcademico'); 
    }
}
