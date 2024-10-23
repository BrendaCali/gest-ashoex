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
        try{    
            $grupos = Grupo::all();
            if($grupos->is_Empty()){
                return reponse()->json([
                    'succes' => false,
                    'data' =>[],
                    'error' =>['No se encontraron grupos'],
                    'message' => 'Operacion fallida'
                ],Response::HTTP_NOT_FOUND);
            }
            return response()->json([
                'succes' => false,
                'data' =>$grupos,
                'error' =>[],
                'message' => 'Operacion exitosa'
            ],Response::HTTP_OK);

        } catch(\Illuminate\Database\QueryException $e){
            return response()->json([
                'success' => false,
                'data' => [],
                'error' => ['Error en la consulta a la base de datos'],
                'message' => 'Operación fallida'
            ], Response::HTTP_BAD_REQUEST);
        }catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return response()->json([
                'success' => false,
                'data' => [],
                'error' => ['No tienes permiso para acceder a estas carreras'],
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

    public function store(Request $request)
    {
        $datos = $request->validate();
        $grupo =  Grupo::create(['materia_id' =>$validated['materia_id'],'nro_grupo'=>$validated['nro_grupo']]);
        
        return response()->json([
            'success' => true,
            'data' => [
                [
                    'materia_id' => $grupo ->materia_id,
                    'nro_grupo' => $grupo ->nro_grupo,
                    'updated_at' => $grupo->updated_at,
                    'created_at' => $grupo->created_at,
                    'id' => $grupo->id
                ]
            ],
            'error' => [],
            'message' => 'Operación exitosa'
        ], 201);
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
 *                 @OA\Items(type="string", example="El grupo no existe")),
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
        $grupo = Grupo::find($id);
        if($grupo){
            $grupo ->makeHidden(['created_at', 'updated_at']);

            return response() ->json([
               'success' => true,
                'data' => $grupo,
                'error' => [],
                'message' => 'Operación exitosa'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'success' => false,
                'data' => [],
                'error' => ['el grupo no existe'],
                'message' => 'Operación fallida'
            ], Response::HTTP_NOT_FOUND);
        }

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
