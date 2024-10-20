<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPersonal extends Model
{
    protected $table = 'tipo_personals'; 
    protected $primaryKey = 'ptipo_personal_id';
    protected $fillable = ['nombre', 'carga_horaria'];

    function personalAcademico()
    {
        return $this->hasMany(PersonalAcademico::class);
    }

    use HasFactory;
}
