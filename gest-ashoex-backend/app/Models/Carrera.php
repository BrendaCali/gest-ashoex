<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materia;

class Carrera extends Model
{
    protected $fillable = ['nombre', 'nro_semestres'];

    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'curriculas', 'carrera_id', 'materia_id');
    }

    use HasFactory;
}
