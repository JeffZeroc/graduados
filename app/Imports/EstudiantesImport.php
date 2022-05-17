<?php

namespace App\Imports;

use App\Models\Carrera;
use App\Models\Estudiante;
use App\Models\estudianteRequisito;
use App\Models\Periodo;
use App\Models\Requisitos;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EstudiantesImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    private $periodos;
    private $carreras;
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function __construct()
    {
        $this->periodos = Periodo::pluck('id', 'Nombre_Periodo');
        $this->carreras = Carrera::pluck('id', 'Nombre_Carrera');
        
    }
    public function model(array $row)
    {
        $estudiante = new Estudiante();
        $estudiante->cedula = $row['cedula'];
        $estudiante->fecha_nacimiento = $row['fecha_nacimiento'];
        $estudiante->edad = $row['edad'];
        $estudiante->genero = $row['genero'];
        $estudiante->convencional = $row['convencional'];
        $estudiante->etnia = $row['etnia'];
        $estudiante->nacionalidad_etnica = $row['nacionalidad_etnica'];
        $estudiante->discapacidad = $row['discapacidad'];
        $estudiante->estado_civil = $row['estado_civil'];
        $estudiante->pais = $row['pais'];
        //Agregando el nombre y apellido
        $nombrecompleto = $row['nombre'];
        $arrayNombre = explode(' ', $nombrecompleto,3);
        $estudiante->apellido_paterno =$arrayNombre[0];
        $estudiante->apellido_materno =$arrayNombre[1];
        $estudiante->nombre = $arrayNombre[2];
        $estudiante->telefono = $row['celular'];
        
        $estudiante->curso = $row['curso'];
        $estudiante->correo_institucional = $row['correo_institucional'];
        $estudiante->correo_personal = $row['correo_personal'];
        $estudiante->carrera_id = $this->carreras[$row['carrera']];  
        $estudiante->estado = 'Egresado';
        $estudiante->periodo_id = $this->periodos[$row['periodo']];
        $estudiante->save();
        
        $max = Requisitos::count();
        $reqe = Requisitos::get();
        
        // $rcount = $

        for ($i=0; $i < $max; $i++) { 
            $re = new estudianteRequisito();
            $texto = strtolower($reqe[$i]->nombreRequisito);
            $contains = Str::contains($texto, ' ');
            if ($contains == true) {
                $texto_cambiado = str_replace(" ", "_", $texto);
            }else {
                $texto_cambiado = $texto;
            }
            $re->estudiante_id = $estudiante->id;
            $re->requisito_id = $reqe[$i]->id;
            $re->valorRequisito = $row[$texto_cambiado];
            $re->save();    
                
        }
    }


    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 500;
    }

    public function rules(): array
    {
        return [
            //Unica Funciona
            'cedula' => 'string|min:10|max:10|unique:estudiantes',

            // 'cedula' => 'string|min:10|max:10',
            // '*.Cedula_Estudiante' => 'unique:estudiantes',
            
        ];
    }
}
