<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarreraControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function creacionCarrera()
    {
        $data = [
            'nombre' => 'Licenciatura en Ingeniería Eléctrica',
            'nro_semestres' => 11,
        ];

        $response = $this->postJson('/api/carreras', $data);

        $response->assertStatus(201);

        $response->assertJson([
            'success' => true,
            'data' => [
                [
                    'nombre' => 'Licenciatura en Ingeniería Eléctrica',
                    'nro_semestres' => 11,
                ]
            ],
            'error' => [],
            'message' => 'Operación exitosa'
        ]);

        $this->assertArrayHasKey('created_at', $response['data'][0]);
        $this->assertArrayHasKey('updated_at', $response['data'][0]);
        $this->assertArrayHasKey('id', $response['data'][0]);

        $this->assertDatabaseHas('carreras', [
            'nombre' => 'Licenciatura en Ingeniería Eléctrica',
            'nro_semestres' => 11,
        ]);
    }

    /** @test */
    public function erroresValidacionFormatoCorrecto()
    {
        $data = [
            'nombre' => '',
            'nro_semestres' => 13
        ];

        $response = $this->postJson('/api/carreras', $data);

        $response->assertStatus(422);

        $response->assertJson([
            'success' => false,
            'data' => [],
            'error' => [
                [
                    'status' => 422,
                    'detail' => 'El campo nombre es obligatorio.'
                ],
                [
                    'status' => 422,
                    'detail' => 'El campo nro semestres no debe ser mayor a 12.'
                ]
            ],
            'message' => 'Error',
        ]);
    }
}
