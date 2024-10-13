<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Materia;

class MateriaController extends Controller
{
    
    public function index()
{
    try {
        $materias = Materia::all();
        if ($materias->isEmpty()) {
            return response()->json([
                'success' => false,
                'data' => [],
                'error' => ['No se encontraron materias'],
                'message' => 'Operación fallida'
            ], Response::HTTP_NOT_FOUND); 
        }
        return response()->json([
            'success' => true,
            'data' => $materias,
            'error' => [],
            'message' => 'Operación exitosa'
        ], Response::HTTP_OK);
    } catch (\Illuminate\Database\QueryException $e) {
        return response()->json([
            'success' => false,
            'data' => [],
            'error' => ['Error en la consulta a la base de datos'],
            'message' => 'Operación fallida'
        ], Response::HTTP_BAD_REQUEST);
    } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
        return response()->json([
            'success' => false,
            'data' => [],
            'error' => ['No tienes permiso para acceder a estas materias'],
            'message' => 'Operación fallida'
        ], Response::HTTP_FORBIDDEN);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'data' => [],
            'error' => ['Ocurrió un error inesperado'],
            'message' => 'Operación fallida'
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

    /**
     * @OA\Post(
     *     path="/api/materias",
     *     tags={"Materia"},
     *     summary="Crea una nueva materia",
     *     description="Este endpoint permite crear una nueva materia en el sistema.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"codigo", "nombre", "tipo", "nro_PeriodoAcademico"},
     *             @OA\Property(property="codigo", type="integer", example=123456, description="Código único de la materia"),
     *             @OA\Property(property="nombre", type="string", example="Matemáticas Avanzadas", description="Nombre de la materia"),
     *             @OA\Property(property="tipo", type="string", example="regular", description="Tipo de materia (regular, taller de titulación, etc.)"),
     *             @OA\Property(property="nro_PeriodoAcademico", type="integer", example=1, description="Número del periodo académico")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Materia creada con éxito",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="object", 
     *                 @OA\Property(property="codigo", type="integer", example=123456),
     *                 @OA\Property(property="nombre", type="string", example="Matemáticas Avanzadas"),
     *                 @OA\Property(property="tipo", type="string", example="regular"),
     *                 @OA\Property(property="nro_PeriodoAcademico", type="integer", example=1),
     *                 @OA\Property(property="created_at", type="string", example="2024-01-01T12:00:00Z"),
     *                 @OA\Property(property="updated_at", type="string", example="2024-01-01T12:00:00Z")
     *             ),
     *             @OA\Property(property="error", type="array", @OA\Items(type="object")),
     *             @OA\Property(property="message", type="string", example="Operación exitosa")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error interno del servidor",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="data", type="array", @OA\Items(type="object")),
     *             @OA\Property(property="error", type="array", 
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="code", type="integer", example=500),
     *                     @OA\Property(property="detail", type="string", example="Error al crear la materia: Detalles del error.")
     *                 )
     *             ),
     *             @OA\Property(property="message", type="string", example="Error")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|unique:materias,codigo|integer',
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'nro_PeriodoAcademico' => 'required|integer',
        ]);
        try {
            $materia = Materia::create([
                'codigo' => $validatedData['codigo'],
                'nombre' => $validatedData['nombre'],
                'tipo' => $validatedData['tipo'],
                'nro_PeriodoAcademico' => $validatedData['nro_PeriodoAcademico'],
            ]);
            return response()->json([
                "success" => true,
                "data" => $materia,
                "error" => [],
                "message" => "Operación exitosa"
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "data" => [],
                "error" => [
                    [
                        "code" => Response::HTTP_INTERNAL_SERVER_ERROR,
                        "detail" => 'Error al crear la materia: ' . $e->getMessage(),
                    ]
                ],
                "message" => "Error"
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
