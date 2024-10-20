<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurriculaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('curriculas')->insert([
            // Ingeniería de Sistemas
            ['carrera_id' => 1, 'materia_id' => 1, 'nivel' => 2, 'electiva' => false],
            ['carrera_id' => 1, 'materia_id' => 2, 'nivel' => 3, 'electiva' => false],
            ['carrera_id' => 1, 'materia_id' => 3, 'nivel' => 3, 'electiva' => false],
            ['carrera_id' => 1, 'materia_id' => 4, 'nivel' => 3, 'electiva' => false],
            ['carrera_id' => 1, 'materia_id' => 5, 'nivel' => 2, 'electiva' => false],
            ['carrera_id' => 1, 'materia_id' => 6, 'nivel' => 2, 'electiva' => false],
            ['carrera_id' => 1, 'materia_id' => 7, 'nivel' => 2, 'electiva' => true],  
            ['carrera_id' => 1, 'materia_id' => 8, 'nivel' => 3, 'electiva' => false],

            // Ingeniería Industrial
            ['carrera_id' => 2, 'materia_id' => 9, 'nivel' => 3, 'electiva' => false],
            ['carrera_id' => 2, 'materia_id' => 10, 'nivel' => 3, 'electiva' => false],
            ['carrera_id' => 2, 'materia_id' => 11, 'nivel' => 3, 'electiva' => false],
            ['carrera_id' => 2, 'materia_id' => 12, 'nivel' => 3, 'electiva' => false],
            ['carrera_id' => 2, 'materia_id' => 13, 'nivel' => 3, 'electiva' => false],
            ['carrera_id' => 2, 'materia_id' => 14, 'nivel' => 3, 'electiva' => false],
            ['carrera_id' => 2, 'materia_id' => 15, 'nivel' => 2, 'electiva' => false],
            ['carrera_id' => 2, 'materia_id' => 16, 'nivel' => 1, 'electiva' => true],  
            ['carrera_id' => 2, 'materia_id' => 17, 'nivel' => 3, 'electiva' => true], 

            // Biología
            ['carrera_id' => 3, 'materia_id' => 18, 'nivel' => 2, 'electiva' => false],
            ['carrera_id' => 3, 'materia_id' => 19, 'nivel' => 2, 'electiva' => false],
            ['carrera_id' => 3, 'materia_id' => 20, 'nivel' => 4, 'electiva' => false],
            ['carrera_id' => 3, 'materia_id' => 21, 'nivel' => 2, 'electiva' => false],
            ['carrera_id' => 3, 'materia_id' => 22, 'nivel' => 2, 'electiva' => false],
            ['carrera_id' => 3, 'materia_id' => 23, 'nivel' => 2, 'electiva' => true],   
            ['carrera_id' => 3, 'materia_id' => 24, 'nivel' => 2, 'electiva' => false],
            ['carrera_id' => 3, 'materia_id' => 25, 'nivel' => 3, 'electiva' => false],
            ['carrera_id' => 3, 'materia_id' => 26, 'nivel' => 2, 'electiva' => false],
            ['carrera_id' => 3, 'materia_id' => 27, 'nivel' => 2, 'electiva' => false],

            // Ingeniería en Informática
            ['carrera_id' => 4, 'materia_id' => 28, 'nivel' => 2, 'electiva' => false], 
            ['carrera_id' => 4, 'materia_id' => 29, 'nivel' => 3, 'electiva' => false],  
            ['carrera_id' => 4, 'materia_id' => 30, 'nivel' => 3, 'electiva' => false],  
            ['carrera_id' => 4, 'materia_id' => 31, 'nivel' => 2, 'electiva' => true],   
            ['carrera_id' => 4, 'materia_id' => 32, 'nivel' => 3, 'electiva' => false], 
            ['carrera_id' => 4, 'materia_id' => 33, 'nivel' => 2, 'electiva' => false],  

            // Licenciatura en Matemáticas
            ['carrera_id' => 5, 'materia_id' => 34, 'nivel' => 2, 'electiva' => false], 
            ['carrera_id' => 5, 'materia_id' => 35, 'nivel' => 3, 'electiva' => false],  
            ['carrera_id' => 5, 'materia_id' => 36, 'nivel' => 3, 'electiva' => false],  
            ['carrera_id' => 5, 'materia_id' => 37, 'nivel' => 3, 'electiva' => false],  
            ['carrera_id' => 5, 'materia_id' => 38, 'nivel' => 2, 'electiva' => false],  
            ['carrera_id' => 5, 'materia_id' => 39, 'nivel' => 3, 'electiva' => false],  
            ['carrera_id' => 5, 'materia_id' => 40, 'nivel' => 3, 'electiva' => false],  
            ['carrera_id' => 5, 'materia_id' => 41, 'nivel' => 2, 'electiva' => true],  
        ]);
    }
}
