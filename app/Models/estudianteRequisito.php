<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudianteRequisito extends Model
{
    

    protected $fillable = ['estudiante_id','requisito_id','valorRequisito'];

    public function Estudiantes1()
    {
        return $this->hasOne('App\Models\Estudiante', 'id', 'estudiante_id');
    }
    public function Requisitos1()
    {
        return $this->hasOne('App\Models\Requisitos', 'id', 'requisito_id');
    }
}
