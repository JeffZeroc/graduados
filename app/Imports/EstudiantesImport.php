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
        
        $estudiante->Nombre_Estudiante = $row['nombres'];
        $estudiante->Apellido_Estudiante = $row['apellidos'];
        $estudiante->Cedula_Estudiante = $row['cedula'];
        $estudiante->Telefono_Estudiante = $row['telefono'];
        $estudiante->Nombre_CursoE = $row['curso'];
        $estudiante->Correo_InstitucionalE = $row['correo_institucional'];
        $estudiante->Correo_PersonalE = $row['correo_personal'];
        $estudiante->Estado_Estudiante = $row['estado'];
        $estudiante->periodo_id = $this->periodos[$row['periodo']];
        $estudiante->carrera_id = $this->carreras[$row['carrera']];    
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
        return 50;
    }

    public function chunkSize(): int
    {
        return 50;
    }

    public function rules(): array
    {
        return [
            //Unica Funciona
            //'cedula' => 'string|min:10|max:10|unique:estudiantes',

            // 'cedula' => 'string|min:10|max:10',
            // '*.Cedula_Estudiante' => 'unique:estudiantes',
            
        ];
    }
}
