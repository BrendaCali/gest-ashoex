<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('carreras')->insert([
            [
                'nombre' => 'Ingeniería de Sistemas',
                'nro_semestres' => 10,
            ],
            [
                'nombre' => 'Ingeniería Industrial',
                'nro_semestres' => 10,
            ],
            [
                'nombre' => 'Biologia',
                'nro_semestres' => 12,
            ],
            [
                'nombre' => 'Ingenieria en Informatica',
                'nro_semestres' => 8,
            ],
            [
                'nombre' => 'Licenciatura en Matematicas',
                'nro_semestres' => 8,
            ],
        ]);
    }
}

