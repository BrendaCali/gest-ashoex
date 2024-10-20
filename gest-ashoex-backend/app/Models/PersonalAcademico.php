<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAcademico extends Model
{
    protected $table = 'personal_academicos';
    protected $primaryKey = 'personal_academico_id';
    protected $fillable = ['nombre', 'email', 'telefono'];

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_personals', 'personal_id', 'grupo_id');
    }

    use HasFactory;
}
