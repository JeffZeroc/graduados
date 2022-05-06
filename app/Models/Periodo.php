<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    public function Estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }

    protected $fillable = [
        'Inicio_Periodo',
        'Fin_Periodo',
        'Nombre_Periodo',
    ];

}
