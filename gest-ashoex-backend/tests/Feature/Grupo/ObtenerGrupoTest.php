<?php

namespace Tests\Feature\Grupo;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;   
use App\Models\Grupo;
use Tests\TestCase;

class ObtenerCarreraTest extends TestCase
{
    use RefreshDatabase;

    
    public function test_get_returns_successful(): void
    {
        $grupo = Grupo::create([
                'materia_id' => 41,
                'nro_semestres' => 1
        ]);
        $response = $this->get("/api/grupos/{$grupo->id}");
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
    $response = $this->get("/api/grupos/100");
    $response->assertStatus(Response::HTTP_NOT_FOUND)
             ->assertJson([
                 'success' => false,
                 'data' => [],  
                 'error' => [
                     'el grupo no existe', 
                 ],
                 'message' => 'Operación fallida', 
             ]);
}
}
