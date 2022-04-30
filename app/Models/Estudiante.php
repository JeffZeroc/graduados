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
        return $this->belongsTo('App\Models\estudianteRequisito', 'estudiante_id', 'id');
    }



    /* public function Requisitos()
    {
        return $this->belongsToMany(Carrera::class,'estudiante_requisito','estudiante_id','requisito_id');
    } */

    public function Requisitos()
    {
        return $this->hasMany(estudianteRequisito::class);
    }
}
