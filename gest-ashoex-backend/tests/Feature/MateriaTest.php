<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Materia;
use Illuminate\Http\Response;

class MateriaTest extends TestCase
{
    use RefreshDatabase;
    public function test_index_returns_successful_response_with_data()
    {
        Materia::create([
            'codigo' => 1000001,
            'nombre' => 'Ingles I',
            'tipo' => 'regular',
            'nro_PeriodoAcademico' => 1,
        ]);
        Materia::create([
            'codigo' => 1000002,
            'nombre' => 'Logica',
            'tipo' => 'taller de titulacion',
            'nro_PeriodoAcademico' => 2,
        ]);
        $response = $this->getJson('/api/materias');
        $response->assertStatus(Response::HTTP_OK)
                ->assertJson([
                    'success' => true,
                    'error' => [],
                    'message' => 'Operación exitosa',
                    'data' => [
                        [
                            'codigo' => 1000001,
                            'nombre' => 'Ingles I',
                            'tipo' => 'regular',
                            'nro_PeriodoAcademico' => 1,
                        ],
                        [
                            'codigo' => 1000002,
                            'nombre' => 'Logica',
                            'tipo' => 'taller de titulacion',
                            'nro_PeriodoAcademico' => 2,
                        ]
                    ]
                ]);
    }
}
