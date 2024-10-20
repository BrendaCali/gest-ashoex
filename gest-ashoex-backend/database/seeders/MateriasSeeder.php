<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materias = [
            //Ingeniería en Sistemas
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Fisica General', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Algebra I', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Introduccion a la Programacion', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Elem. de Programacion y Estr. de Datos', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Taller de Ingenieria de Software', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Gestion de Calidad de Software', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Proyecto Final', 'tipo' => 'taller de titulacion', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Ingenieria Economica', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ////Ingenieria Industrial
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Quimica General', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Fisica Basica I', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Calculo I', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Computacion I', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Industria Lacteas', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Gestion y Calidad Ambiental', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Mantenimiento Industrial', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Practica Empresarial', 'tipo' => 'taller de titulacion', 'nro_PeriodoAcademico' => 1],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Taller Tesis II', 'tipo' => 'taller de titulacion', 'nro_PeriodoAcademico' => 3],
            //Biologia
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Ingles', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Quimica General', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Biologia General', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 4],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Biologia Celular y Molecular', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Biofisica', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Tesis', 'tipo' => 'taller de titulacion', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Taxonomia Vegetal', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Sistematica de Mamiferos', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Bioestadistica II', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Inmunoparasitologia', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            //Informatica
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Ingles I', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Logica', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],  
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Taller de Progamacion de Bajo Nivel', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Taller de Grado II', 'tipo' => 'taller de titulacion', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Generacion de Software', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Web Semanticas', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            //Lic en Matematicas
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Ingles I', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Geometria', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Teoria Axiomatica de Conjuntos', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Analisis Funcional', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Algebra Lineal Avanzada', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 2],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Modelaje y Simulacion', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Optimizacion', 'tipo' => 'regular', 'nro_PeriodoAcademico' => 3],
            ['codigo' => $this->codigoSISMateria(),'nombre' => 'Trabajo de Grado', 'tipo' => 'taller de titulacion', 'nro_PeriodoAcademico' => 2],    
        ];

        
        DB::table('materias')->insert($materias);
    }

    private function codigoSISMateria(): int
    {
        do {
            $codigo = rand(1000000, 9999999);
        }
        while (DB::table('materias')->where('codigo', $codigo)->exists());
        return $codigo;
    }
}
