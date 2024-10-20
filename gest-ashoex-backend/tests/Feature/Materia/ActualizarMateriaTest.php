<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Materia;
use Illuminate\Http\Response;

class ActualizarMateriaTest extends TestCase
{
    use RefreshDatabase;

    public function test_actualizar_materia_devuelve_respuesta_exitosa_con_datos_actualizados()
{
    // Crea una materia en la base de datos
    $materia = Materia::create([
        'codigo' => 1000001,
        'nombre' => 'Ingles I',
        'tipo' => 'regular',
        'nro_PeriodoAcademico' => 1,
    ]);

    // Datos actualizados para la materia
    $updatedData = [
        'codigo' => 1000001,
        'nombre' => 'Ingles Avanzado',
        'tipo' => 'regular',
        'nro_PeriodoAcademico' => 2,
    ];

    // Envía la solicitud PUT para actualizar la materia
    $response = $this->putJson('/api/materiasUpdate/' . $materia->id, $updatedData);

    // Verifica que la respuesta sea exitosa
    $response->assertStatus(Response::HTTP_OK)
        ->assertJson([
            'success' => true,
            'error' => [],
            'message' => 'Operación exitosa',
            'data' => [
                [
                    'id' => $materia->id,
                    'nombre' => 'Ingles Avanzado',
                    'descripcion' => 'Materia actualizada.', // Coincide con el cambio realizado
                ],
            ],
        ]);

    // Verifica que la materia se haya actualizado en la base de datos
    $this->assertDatabaseHas('materias', [
        'id' => $materia->id,
        'nombre' => 'Ingles Avanzado',
        'tipo' => 'regular',
        'nro_PeriodoAcademico' => 2,
    ]);
}
}
