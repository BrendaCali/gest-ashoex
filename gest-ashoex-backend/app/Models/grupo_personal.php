<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupo_personal extends Model
{
    use HasFactory;

    protected $fillable = [
        'grupo_id',
        'personal_id'
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }


    public function personal()
    {
        return $this->belongsTo(PersonalAcademico::class);
    }
}
