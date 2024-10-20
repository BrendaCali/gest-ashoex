<?php

namespace Tests\Feature\Carrera;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;   
use App\Models\Carrera;
use Tests\TestCase;

class ObtenerCarreraTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    
    public function test_get_returns_successful(): void
    {
        $carrera = Carrera::create([
                'nombre' => 'Ingenieria en Electromecanica',
                'nro_semestres' => 8,
            
        ]);
        $response = $this->get("/api/carreras/{$carrera->id}");
        $response->assertStatus(Response::HTTP_OK)
                ->assertJson([
                    'success' => true,
                    'error' => [],
                    'message' => 'Operación exitosa',
                    'data' => []
        ]);
    }

    public function test_get_returns_error(): void
{
    $response = $this->get("/api/carreras/99");
    $response->assertStatus(Response::HTTP_NOT_FOUND)
             ->assertJson([
                 'success' => false,
                 'data' => [],  
                 'error' => [
                     'La carrera no existe', 
                 ],
                 'message' => 'Operación fallida', 
             ]);
}
}
