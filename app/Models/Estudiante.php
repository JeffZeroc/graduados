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
        'Cedula_Estudiante',
        'Nombre_Estudiante',
        'Apellido_Estudiante',
        'Telefono_Estudiante',
        'Nombre_CursoE',
        'Correo_InstitucionalE',
        'Correo_PersonalE',
        'Estado_Estudiante',
        'periodo_id',
        'carrera_id',
    ];

}
