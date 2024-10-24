<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;

class GrupoController extends Controller
{
/**
 * @OA\Get(
 *     path="/api/grupo",
 *     tags={"Grupos"},
 *     summary="Obtener lista de grupos",
 *     description="Este endpoint retorna una lista de grupos.",
 *     @OA\Response(
 *         response=200,
 *         description="Lista de grupos obtenida con éxito",
 *     )
 * )
 */
    public function index()
    {
            $grupos = Grupo::all();
           return response()->json($grupos,200);
    
    }

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
 *     path="/api/grupo/{id}",
 *     tags={"Grupos"},
 *     summary="Obtiene los detalles de una grupo por su ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer"),
 *         description="ID de la grupo"
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Operación exitosa",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="materia_id", type="integer", example="1"),
 *                 @OA\Property(property="nro_grupo", type="number", example=1)
 *             ),
 *             @OA\Property(property="error", type="array", @OA\Items(type="string"), example={}),
 *             @OA\Property(property="message", type="string", example="Operación exitosa")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="El grupo  no existe",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="data", type="array", @OA\Items(), example={}),
 *             @OA\Property(property="error", type="array", 
 *                 @OA\Items(type="string", example="Grupo no encontrado")),
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
public function show($id)
{
    $grupo = Grupo::find($id);

    if (!$grupo) {
        return response()->json([
            'success' => false,
            'error' => 'Grupo no encontrado',
            'message' => 'Operacion fallida',
        ], 404);
    }

    return response()->json([
        'success' => true,
        'data' => $grupo,
        'message' => 'Operacion exitosa'
    ], 200);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $grupo = Grupo::find($id);
    if (!$grupo) {
        return response()->json(['error' => 'Grupo no encontrado'], 404);
    }

    $grupo->id_materia = $request->id_materia;
    $grupo->nro_grupo = $request->nro_grupo;
    $grupo->save();

    return response()->json([
        'success' => true,
        'data' => $grupo
    ], 200);

    }


    public function destroy(string $id)
    {
       $grupo = Carrera::find($id);
        if ($grupo) {
            $grupo->delete();
            return response()->json([
                "success" => true,
                "data" => [],
                "error" => [],
                "message" => "Operación exitosa"
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                "success" => false,
                "data" => [],
                "error" => [[
                    "code" => Response::HTTP_NOT_FOUND,
                    "detail" => 'el id proporcionado no esta relacionado con una carrera',
                ]],
                "message" => "Error"
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
