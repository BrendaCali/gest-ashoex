<?php

namespace Tests\Feature\Grupo;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response; 
use App\Models\Materia;
use App\Models\Grupo;
use Tests\TestCase;

class ObtenerGrupoTest extends TestCase
{
    use RefreshDatabase;

    public function test_obtener_grupo_exitoso()
{
    $materia= Materia::create([
        'codigo'=> 20190004, 
        'nombre'=>'Fisica General', 
        'tipo'=>'regular', 
        'nro_PeriodoAcademico'=>2
     ]);
     $grupo = Grupo::create([
        'materia_id' => 1,
        'nro_grupo' => 1
    ]);

    // Realiza la solicitud GET
    $response = $this->get('/api/gruposid/' . $grupo->id);

    // Muestra el contenido de la respuesta para depuración
    $response->dump(); // o $response->dd();

    // Continúa con las aserciones
    $response->assertStatus(200);
    $response->assertJson([
        'success' => true,
        'data' => [
            'id' => $grupo->id,
            'nro_grupo' => $grupo->nro_grupo,
        ],
        'message' => 'Operacion exitosa',
    ]);
}


public function test_obtener_grupo_error()
{
    // Realiza una solicitud GET con un ID inexistente
    $response = $this->get('/api/gruposid/999'); // Un ID que no exista

    // Verifica que el código de estado HTTP sea 404
    $response->assertStatus(404);

    // Verifica el JSON devuelto
    $response->assertJson([
        'success' => false,
        'error' => 'Grupo no encontrado',
        'message' => 'Operacion fallida',
    ]);
}
}
