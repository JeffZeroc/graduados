<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisitos extends Model
{
    use HasFactory;

    public function estudianteRequisito()
    {
        return $this->hasMany('App\Models\estudianteRequisito', 'requisito_id', 'id');
    }

    protected $fillable = [
        'nombreRequisito',
    ];
    /* public function Estudiantes() 
    {
        return $this->belongsToMany(Estudiante::class,'estudiante_requisito','requisito_id','estudiante_id');
    } */
}
