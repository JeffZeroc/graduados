<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facultad;

class Carrera extends Model
{
    use HasFactory;

    public function facultade()
    {
        return $this->belongsTo(Facultad::class);
    }

    public function Estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }
}
