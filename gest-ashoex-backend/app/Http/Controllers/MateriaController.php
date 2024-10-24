<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Materia;
use App\Http\Requests\CrearMateriaRequest;

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
    public function store(CrearMateriaRequest $request)
    {
        $validatedData = $request->validated();
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
        
    }


    /**
     * @OA\Get(
     *     path="/api/materias/{id}",
     *     tags={"Materia"},
     *     summary="Obtiene los detalles de una materia por su ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         description="ID de la materia"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="codigo", type="integer", example=8948440),
     *                 @OA\Property(property="nombre", type="string", example="Fisica General"),
     *                 @OA\Property(property="nro_PeriodoAcademico", type="number", example=2)
     *             ),
     *             @OA\Property(property="error", type="array", @OA\Items(type="string"), example={}),
     *             @OA\Property(property="message", type="string", example="Operación exitosa")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="La materia no existe",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="data", type="array", @OA\Items(), example={}),
     *             @OA\Property(property="error", type="array", 
     *                 @OA\Items(type="string", example="La materia no existe")),
     *             @OA\Property(property="message", type="string", example="Operación fallida")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error en el servidor interno",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="data", type="array", @OA\Items(), example={}),
     *             @OA\Property(property="error", type="array", 
     *                 @OA\Items(type="string", example="Ocurrió un error inesperado")),
     *             @OA\Property(property="message", type="string", example="Operación fallida")
     *         )
     *     )
     * )
     */
    public function show(string $id)
    {
        $materia = Materia::find($id);
        if ($materia) {
            $materia->makeHidden(['created_at', 'updated_at']);
            return response()->json([
                'success' => true,
                'data' => $materia,
                'error' => [],
                'message' => 'Operación exitosa'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'success' => false,
                'data' => [],
                'error' => ['La materia no existe'],
                'message' => 'Operación fallida'
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @OA\Put(
     *     path="/api/materiasUpdate/{id}",
     *     summary="Actualizar una materia",
     *     description="Actualiza los datos de una materia específica.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la materia a actualizar",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="codigo", type="integer", example=1000001),
     *             @OA\Property(property="nombre", type="string", example="Ingles Avanzado"),
     *             @OA\Property(property="tipo", type="string", example="regular"),
     *             @OA\Property(property="nro_PeriodoAcademico", type="integer", example=2),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="object"),
     *             @OA\Property(property="error", type="array", @OA\Items()),
     *             @OA\Property(property="message", type="string", example="Operación exitosa")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Materia no encontrada",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="data", type="array", @OA\Items()),
     *             @OA\Property(property="error", type="array", @OA\Items(
     *                 @OA\Property(property="code", type="integer", example=404),
     *                 @OA\Property(property="detail", type="string", example="Materia no encontrada")
     *             )),
     *             @OA\Property(property="message", type="string", example="Error")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error interno del servidor",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="data", type="array", @OA\Items()),
     *             @OA\Property(property="error", type="array", @OA\Items(
     *                 @OA\Property(property="code", type="integer", example=500),
     *                 @OA\Property(property="detail", type="string", example="Error al actualizar la materia")
     *             )),
     *             @OA\Property(property="message", type="string", example="Error")
     *         )
     *     )
     * )
     */

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'codigo' => 'integer|nullable',
            'nombre' => 'string|max:255|nullable',
            'tipo' => 'string|nullable',
            'nro_PeriodoAcademico' => 'integer|nullable',
        ]);

        try {
            // Buscar materia
            $materia = Materia::findOrFail($id);

            // Solo actualizar los campos que estén presentes en la solicitud
            $materia->update(array_filter(array: $validatedData));

            // Devolver la respuesta en el formato JSON
            return response()->json([
                "success" => true,
                "data" => [
                    [
                        "id" => $materia->id,
                        "nombre" => $materia->nombre,
                        "descripcion" => "Materia actualizada." // Cambiado a "Materia actualizada."
                    ]
                ],
                "error" => [],
                "message" => "Operación exitosa"
            ], Response::HTTP_OK);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                "success" => false,
                "data" => [],
                "error" => [
                    [
                        "code" => Response::HTTP_NOT_FOUND,
                        "detail" => 'Materia no encontrada'
                    ]
                ],
                "message" => "Error"
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "data" => [],
                "error" => [
                    [
                        "code" => Response::HTTP_INTERNAL_SERVER_ERROR,
                        "detail" => 'Error al actualizar la materia: ' . $e->getMessage(),
                    ]
                ],
                "message" => "Error"
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


/**
 * @OA\Delete(
 *     path="/api/materias/{id}",
 *     summary="Eliminar una materia",
 *     description="Elimina una materia específica por su ID.",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID de la materia a eliminar",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Materia eliminada con éxito",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="data", type="array", @OA\Items(type="object")),
 *             @OA\Property(property="error", type="array", @OA\Items(type="object")),
 *             @OA\Property(property="message", type="string", example="Operación exitosa")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Materia no encontrada",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="data", type="array", @OA\Items(type="object")),
 *             @OA\Property(property="error", type="array", @OA\Items(
 *                 @OA\Property(property="code", type="integer", example=404),
 *                 @OA\Property(property="detail", type="string", example="Materia no encontrada")
 *             )),
 *             @OA\Property(property="message", type="string", example="Error")
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error interno del servidor",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="data", type="array", @OA\Items(type="object")),
 *             @OA\Property(property="error", type="array", @OA\Items(
 *                 @OA\Property(property="code", type="integer", example=500),
 *                 @OA\Property(property="detail", type="string", example="Error al eliminar la materia")
 *             )),
 *             @OA\Property(property="message", type="string", example="Error")
 *         )
 *     )
 * )
 */
public function destroy(string $id)
{
    
    try {
        // Buscar la materia por su ID
        $materia = Materia::findOrFail($id);

        // Eliminar la materia
        $materia->delete();

        // Respuesta en caso de éxito
        return response()->json([
            "success" => true,
            "data" => [],
            "error" => [],
            "message" => "Operación exitosa"
        ], Response::HTTP_OK);

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        //  Respuesta si no se encuentra la materia
        return response()->json([
            "success" => false,
            "data" => [],
            "error" => [
                [
                    "code" => Response::HTTP_NOT_FOUND,
                    "detail" => 'Materia no encontrada'
                ]
            ],
            "message" => "Error"
        ], Response::HTTP_NOT_FOUND);
    } catch (\Exception $e) {
        // Cualquier otro error
        return response()->json([
            "success" => false,
            "data" => [],
            "error" => [
                [
                    "code" => Response::HTTP_INTERNAL_SERVER_ERROR,
                    "detail" => 'Error al eliminar la materia: ' . $e->getMessage(),
                ]
            ],
            "message" => "Error"
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
}

