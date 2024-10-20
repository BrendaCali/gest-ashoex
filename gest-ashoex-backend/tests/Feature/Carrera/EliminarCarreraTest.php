<?php

namespace Tests\Feature\Carrera;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;   
use App\Models\Carrera;
use Tests\TestCase;

class EliminarCarreraTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    
    public function test_delete_returns_successful(): void
    {
        $carrera = Carrera::create([
                'nombre' => 'Ingenieria en Electromecanica',
                'nro_semestres' => 8,
            
        ]);
        $response = $this->delete("/api/carreras/{$carrera->id}");
        $response->assertStatus(Response::HTTP_OK)
                ->assertJson([
                    'success' => true,
                    'error' => [],
                    'message' => 'Operación exitosa',
                    'data' => []
        ]);
    }

    public function test_delete_returns_error(): void
    {
        
        $response = $this->delete("/api/carreras/1");
        $response->assertStatus(Response::HTTP_NOT_FOUND)
                ->assertJson([
                    'success' => false,
                    'error' => [[
                        'code'=>404,
                        'detail'=>'el id proporcionado no esta relacionado con una carrera'
                    ]],
                    'message' => 'Error',
                    'data' => []
        ]);
    }
}
