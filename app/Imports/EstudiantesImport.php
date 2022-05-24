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

        $estudiante->curso = $row['curso'];
        if ($estudiante->curso == '9 A' || $estudiante->curso == '9 B' || $estudiante->curso == '8 A' || $estudiante->curso == '8 B') {
            $estudiante->cedula = $row['cedula'];
            $estudiante->fecha_nacimiento = $row['fecha_nacimiento'];
            if ($estudiante->fecha_nacimiento == '') {
                $estudiante->fecha_nacimiento = null;
            }
            $estudiante->edad = $row['edad'];
            if ($estudiante->edad == '') {
                $estudiante->edad = 'No Especificad@';
            }
            $estudiante->genero = $row['genero'];
            if ($estudiante->genero == '') {
                $estudiante->genero = 'No Especificad@';
            }
            $estudiante->convencional = $row['convencional'];
            if ($estudiante->convencional == '' || strlen($estudiante->convencional) < 9) {
                $estudiante->convencional = 'No Especificad@';
            }
            $estudiante->etnia = $row['etnia'];
            if ($estudiante->etnia == '') {
                $estudiante->etnia = 'No Especificad@';
            }
            $estudiante->nacionalidad_etnica = $row['nacionalidad_etnica'];
            if ($estudiante->nacionalidad_etnica == '') {
                $estudiante->nacionalidad_etnica = 'No Especificad@';
            }
            $estudiante->discapacidad = $row['discapacidad'];
            if ($estudiante->discapacidad == '') {
                $estudiante->discapacidad = 'No Especificad@';
            }
            $estudiante->estado_civil = $row['estado_civil'];
            if ($estudiante->estado_civil == '') {
                $estudiante->estado_civil = 'No Especificad@';
            }
            $estudiante->pais = $row['pais'];
            if ($estudiante->pais == '') {
                $estudiante->pais = 'No Especificad@';
            }
            //Agregando el nombre y apellido
            $nombrecompleto = $row['nombre'];
            $arrayNombre = explode(' ', $nombrecompleto, 3);
            $estudiante->apellido_paterno = $arrayNombre[0];
            $estudiante->apellido_materno = $arrayNombre[1];
            $estudiante->nombre = $arrayNombre[2];
            $estudiante->celular = $row['celular'];
            if ($estudiante->celular == '' || strlen($estudiante->celular) < 10) {
                $estudiante->celular = 'No Especificad@';
            }

            $estudiante->correo_institucional = $row['correo_institucional'];
            if ($estudiante->correo_institucional == '') {
                $estudiante->correo_institucional = 'No Especificad@';
            }
            $estudiante->Correo_personal = $row['correo_personal'];
            if ($estudiante->Correo_personal == '') {
                $estudiante->Correo_personal = 'No Especificad@';
            }
            $estudiante->carrera_id = $this->carreras[$row['carrera']];
            $estudiante->estado = $row['estado'];
            if ($estudiante->estado == '') {
                $estudiante->estado = 'Egresado';
            }
            $estudiante->periodo_id = $this->periodos[$row['periodo']];
            $estudiante->save();

            $max = Requisitos::where('estado', 'Activo')->count();
            $reqe = Requisitos::where('estado', 'Activo')->get();

            // $rcount = $

            for ($i = 0; $i < $max; $i++) {
                $re = new estudianteRequisito();
                $texto = strtolower($reqe[$i]->nombreRequisito);
                $contains = Str::contains($texto, ' ');
                if ($contains == true) {
                    $texto_cambiado = str_replace(" ", "_", $texto);
                } else {
                    $texto_cambiado = $texto;
                }
                $re->estudiante_id = $estudiante->id;
                $re->requisito_id = $reqe[$i]->id;
                $re->valorRequisito = $row[$texto_cambiado];
                $re->save();
            }
        }
    }


    public function batchSize(): int
    {
        return 5000;
    }

    public function chunkSize(): int
    {
        return 5000;
    }

    public function rules(): array
    {
        return [
            //Unica Funciona
            'cedula' => 'string|min:10|max:10|unique:estudiantes',




        ];
    }
}
