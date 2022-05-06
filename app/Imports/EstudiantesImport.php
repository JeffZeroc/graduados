<?php

namespace App\Imports;

use App\Models\Carrera;
use App\Models\Estudiante;
use App\Models\Periodo;
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
        return new Estudiante([
            'Nombre_Estudiante' => $row['nombres'],
            'Apellido_Estudiante' => $row['apellidos'],
            'Cedula_Estudiante' => $row['cedula'],
            'Telefono_Estudiante'=> $row['telefono'],
            'Nombre_CursoE'=> $row['curso'],
            'Correo_InstitucionalE'=> $row['correo_institucional'],
            'Correo_PersonalE'=> $row['correo_personal'],
            'Estado_Estudiante'=> $row['estado'],
            'periodo_id'=> $this->periodos[$row['periodo']],
            'carrera_id'=> $this->carreras[$row['carrera']],

            //Idea
            // foreach ($requisitos as $r ) {
            //    estudiantes_requisitos
            //     'id_requisito' => $this->periodos[$row[$r]],
            //     'id_estudiante'
            //     'valor'
            // }
            
        ]);
        
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
            '*.Cedula_Estudiante' => [
                'unique:estudiantes',
            ]            
        ];
    }
}
