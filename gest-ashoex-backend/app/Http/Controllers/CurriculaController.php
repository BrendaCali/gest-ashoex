<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Curricula;
use App\Models\Materia;
class CurriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curriculas = Curricula::all();
        $data = [];
        if($curriculas->isEmpty()){
            $data = ['message'=>'No hay curriculas registradas', 'code'=>404];
            return response()->json($data,404);
        }
        $data = ['curriculas'=>$curriculas, 'code'=>200];
        return response()->json($data,200);
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $rules = [
            'carrera_id' => 'required|integer|exists:carreras,id',
            'materia_id' => 'required|integer|exists:materias,id',
            
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        $curricula = new Curricula();
        $curricula->carrera_id = $request->input('carrera_id');
        $curricula->materia_id = $request->input('materia_id');
        $curricula->nivel =      $request->input('nivel');

        $curricula->save();

        return response()->json([
            'message' => 'Curricula creada exitosamente',
            'curricula' => $curricula,
            'code' => 201
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curricula=Curricula::find($id);
        if($curricula){
            
            return response()->json([
                "success"=> true,
                "data"=> [],
                "error"=> [],
                "message"=> "Operacion exitosa"
            ],200);  
        }else{
            return response()->json([
                "success"=> false,
                "data"=> [],
                "error"=> ["La curricula no existe"],
                "message"=> "Operacion fallida"
            ],404);  
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'carrera_id' => 'nullable|integer|exists:carreras,id',
            'materia_id' => 'nullable|integer|exists:materias,id',
            
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                "success"=> false,
                "data"=> [],
                "error"=> $validator->errors(),
                "message"=> "Operacion fallida"
            ], 422);
        }
       $curricula = Curricula::find($id);
       if ($curricula){
        $curricula->update($request->all);
        return response()->json([
            "success"=> true,
            "data"=> [],
            "error"=> [],
            "message"=> "Operacion exitosa"
        ], 200);
       }else{
        return response()->json([
            "success"=> true,
            "data"=> [],
            "error"=> ["id no encontrado"],
            "message"=> "Operacion fallida"
        ], 404);
       }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curricula = Curricula::find($id);
        if($curricula){
            $curricula->delete();
        return response()->json([
                "success"=>true,
                "data"=>[],
                "error"=>[],
                "message"=>"Operacion exitosa"
        ],200);
        }else{
            return response()->json([
                "success"=>false,
                "data"=>[],
                "error"=>["Curricula no encontrada"],
                "message"=>"Operacion fallida"
            ],404); 
        }
        
    }
}
