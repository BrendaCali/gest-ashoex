<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grupos')->insert([
             // Sistemas (8 materias)
             ['materia_id' => 1, 'nro_grupo' => 1],
             ['materia_id' => 1, 'nro_grupo' => 2],
             ['materia_id' => 2, 'nro_grupo' => 1],
             ['materia_id' => 2, 'nro_grupo' => 2],
             ['materia_id' => 3, 'nro_grupo' => 1],
             ['materia_id' => 3, 'nro_grupo' => 2],
             ['materia_id' => 4, 'nro_grupo' => 1],
             ['materia_id' => 4, 'nro_grupo' => 2],
             ['materia_id' => 5, 'nro_grupo' => 1],
             ['materia_id' => 5, 'nro_grupo' => 2],
             ['materia_id' => 6, 'nro_grupo' => 1],
             ['materia_id' => 6, 'nro_grupo' => 2],
             ['materia_id' => 7, 'nro_grupo' => 1],
             ['materia_id' => 7, 'nro_grupo' => 2],
             ['materia_id' => 8, 'nro_grupo' => 1],
             ['materia_id' => 8, 'nro_grupo' => 2],
 
             // Industrial (9 materias)
             ['materia_id' => 9, 'nro_grupo' => 1],
             ['materia_id' => 9, 'nro_grupo' => 2],
             ['materia_id' => 10, 'nro_grupo' => 1],
             ['materia_id' => 10, 'nro_grupo' => 2],
             ['materia_id' => 11, 'nro_grupo' => 1],
             ['materia_id' => 11, 'nro_grupo' => 2],
             ['materia_id' => 12, 'nro_grupo' => 1],
             ['materia_id' => 12, 'nro_grupo' => 2],
             ['materia_id' => 13, 'nro_grupo' => 1],
             ['materia_id' => 13, 'nro_grupo' => 2],
             ['materia_id' => 14, 'nro_grupo' => 1],
             ['materia_id' => 14, 'nro_grupo' => 2],
             ['materia_id' => 15, 'nro_grupo' => 1],
             ['materia_id' => 15, 'nro_grupo' => 2],
             ['materia_id' => 16, 'nro_grupo' => 1],
             ['materia_id' => 16, 'nro_grupo' => 2],
             ['materia_id' => 17, 'nro_grupo' => 1],
             ['materia_id' => 17, 'nro_grupo' => 2],
 
             // Biología (10 materias)
             ['materia_id' => 18, 'nro_grupo' => 1],
             ['materia_id' => 18, 'nro_grupo' => 2],
             ['materia_id' => 19, 'nro_grupo' => 1],
             ['materia_id' => 19, 'nro_grupo' => 2],
             ['materia_id' => 20, 'nro_grupo' => 1],
             ['materia_id' => 20, 'nro_grupo' => 2],
             ['materia_id' => 21, 'nro_grupo' => 1],
             ['materia_id' => 21, 'nro_grupo' => 2],
             ['materia_id' => 22, 'nro_grupo' => 1],
             ['materia_id' => 22, 'nro_grupo' => 2],
             ['materia_id' => 23, 'nro_grupo' => 1],
             ['materia_id' => 23, 'nro_grupo' => 2],
             ['materia_id' => 24, 'nro_grupo' => 1],
             ['materia_id' => 24, 'nro_grupo' => 2],
             ['materia_id' => 25, 'nro_grupo' => 1],
             ['materia_id' => 25, 'nro_grupo' => 2],
             ['materia_id' => 26, 'nro_grupo' => 1],
             ['materia_id' => 26, 'nro_grupo' => 2],
 
             // Informática (6 materias)
             ['materia_id' => 27, 'nro_grupo' => 1],
             ['materia_id' => 27, 'nro_grupo' => 2],
             ['materia_id' => 28, 'nro_grupo' => 1],
             ['materia_id' => 28, 'nro_grupo' => 2],
             ['materia_id' => 29, 'nro_grupo' => 1],
             ['materia_id' => 29, 'nro_grupo' => 2],
             ['materia_id' => 30, 'nro_grupo' => 1],
             ['materia_id' => 30, 'nro_grupo' => 2],
             ['materia_id' => 31, 'nro_grupo' => 1],
             ['materia_id' => 31, 'nro_grupo' => 2],
             ['materia_id' => 32, 'nro_grupo' => 1],
             ['materia_id' => 32, 'nro_grupo' => 2],
 
             // Lic. en Matemáticas (8 materias)
             ['materia_id' => 33, 'nro_grupo' => 1],
             ['materia_id' => 33, 'nro_grupo' => 2],
             ['materia_id' => 34, 'nro_grupo' => 1],
             ['materia_id' => 34, 'nro_grupo' => 2],
             ['materia_id' => 35, 'nro_grupo' => 1],
             ['materia_id' => 35, 'nro_grupo' => 2],
             ['materia_id' => 36, 'nro_grupo' => 1],
             ['materia_id' => 36, 'nro_grupo' => 2],
             ['materia_id' => 37, 'nro_grupo' => 1],
             ['materia_id' => 37, 'nro_grupo' => 2],
             ['materia_id' => 38, 'nro_grupo' => 1],
             ['materia_id' => 38, 'nro_grupo' => 2],
             ['materia_id' => 39, 'nro_grupo' => 1],
             ['materia_id' => 39, 'nro_grupo' => 2],
             ['materia_id' => 40, 'nro_grupo' => 1],
             ['materia_id' => 40, 'nro_grupo' => 2],
        ]);
    }
}
