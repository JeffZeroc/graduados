<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisitos extends Model
{
    use HasFactory;

    public function Estudiantes()
    {
        return $this->hasMany(estudianteRequisito::class);
    }
    /* public function Estudiantes() 
    {
        return $this->belongsToMany(Estudiante::class,'estudiante_requisito','requisito_id','estudiante_id');
    } */
}
