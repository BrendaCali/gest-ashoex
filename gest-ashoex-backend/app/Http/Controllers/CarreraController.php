<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\OpenApi\Schemas\CarreraSchema;

use App\Http\Requests\CrearCarreraRequest;
use Illuminate\Http\Response;


class CarreraController extends Controller
{


    public function index()
    {
        try {
            $carreras = Carrera::all();    
            if ($carreras->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'data' => [],
                    'error' => ['No se encontraron carreras'],
                    'message' => 'Operación fallida'
                ], Response::HTTP_NOT_FOUND); 
            }     
            return response()->json([
                'success' => true,
                'data' => $carreras,
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

 
    public function store(CrearCarreraRequest $request)
    {
        $validated = $request->validated();
        $carrera = Carrera::create(['nombre' => $validated['nombre']]);

        return response()->json([
            'message' => 'Carrera creada exitosamente',
            'carrera' => $carrera,
        ], Response::HTTP_CREATED);
    }

  
    public function show(string $id)
    {
        $carrera = Carrera::find($id);
        if ($carrera) {
            // Oculta los timestamps
            $carrera->makeHidden(['created_at', 'updated_at']);
            
            return response()->json([
                'success' => true,
                'data' => $carrera,
                'error' => [],
                'message' => 'Operación exitosa'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'success' => false,
                'data' => [],
                'error' => ['La carrera no existe'],
                'message' => 'Operación fallida'
            ], Response::HTTP_NOT_FOUND);
        }
    }
    
    /**
     * @OA\Delete(
     *     path="/api/carreras/{id}",
     *     tags={"Carrera"},
     *     summary="Elimina una carrera por el id que se tiene ",
     *     description="Devuelve el estado de salud del sistema",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la carrera",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Eliminado con exito",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object"),
     *                  example="[]"
     *              ),
     *             @OA\Property(property="error", type="array", 
     *                  @OA\Items(type="object"),
     *                  example="[]"
     *              ),
     *             @OA\Property(property="message", type="string", example="Operacion exitosa")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Error al eliminar una carrera",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="data", type="array",
     *                  @OA\Items(type="object"),
     *                  example="[]"
     *              ),
     *             @OA\Property(property="error", type="array", 
     *                  @OA\Items(
     *                      type="object",
     *                      @OA\Property(property="code", type="integer", example="422"),
     *                      @OA\Property(property="detail", type="string", example="el id proporcionado no esta relacionado con una carrera")
     *                      )
     *                      
     *                  ),
     *             @OA\Property(property="message", type="string", example="Error")
     *         )
     *     )
     * )
     */
    public function destroy(string $id)
    {
        $carrera = Carrera::find($id);
        if ($carrera) {
            $carrera->delete();
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
                            "code"=>Response::HTTP_NOT_FOUND,
                            "detail"=>'el id proporcionado no esta relacionado con una carrera',
                    ]],
                "message" => "Error"
            ], Response::HTTP_NOT_FOUND);
        }
    }

   
}
