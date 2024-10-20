<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;

class GrupoController extends Controller
{

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
     * Display the specified resource.
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
