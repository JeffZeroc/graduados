<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\EstudiantesImport;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function importForm()
    {
        return view('import');
    }

    public function import(Request $request)
    {
        $file = $request->file('import_file');
               
        try {
            Excel::import(new EstudiantesImport, $file);
            return redirect()->route('tableDataSecretaria2')->with('success', 'Productos importados exitosamente');
        } catch (\Throwable $th) {
            return redirect()->route('tableDataSecretaria2')->with('error', 'Ocurrio un error en la importación. Asegurese que el archivo poseea todos los campos necesarios y la base de datos tenga los datos necesarios');
        }
    }
}
