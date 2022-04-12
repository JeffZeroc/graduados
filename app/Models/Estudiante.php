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

    public function Requisitos()
    {
        return $this->belongsTo(Requisitos::class);
    }
}
