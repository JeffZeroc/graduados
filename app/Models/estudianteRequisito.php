<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudianteRequisito extends Model
{
    use HasFactory;

    public function Estudiantes1()
    {
        return $this->belongsTo(Estudiante::class);
    }
    public function Requisitos1()
    {
        return $this->belongsTo(Requisitos::class);
    }
}
