<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    public function Periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function Carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
    
    public function estudianteRequisito()
    {
        return $this->hasMany('App\Models\estudianteRequisito', 'estudiante_id', 'id');
    }

    protected $fillable = [
        'cedula' ,
            'nombre',
            'apellido_paterno' ,
            'apellido_materno' ,
            'fecha_nacimiento' ,
            'edad' ,
            'genero' ,
            'convencional',
            'etnia',
            'nacionalidad_etnica' ,
            'discapacidad' ,
            'estado_civil',
            'pais',
            'telefono',
            'curso',
            'correo_institucional',
            'correo_personal',
            'estado' ,
            'periodo_id',
            'carrera_id',
    ];

}
