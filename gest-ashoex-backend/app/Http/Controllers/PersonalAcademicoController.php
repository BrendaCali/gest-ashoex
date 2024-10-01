<?php

namespace App\Http\Controllers;

use App\Models\PersonalAcademico;
use Illuminate\Http\Request;

class PersonalAcademicoController extends Controller
{
    public function registrar(Request $request)
    {
        $personalAcademico = PersonalAcademico::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'estado' => $request->estado,
            'tipo_personal_id' => $request->tipo_personal_id,
        ]);

        return response()->json([
            'message' => 'Personal académico registrado exitosamente',
            'personalAcademico' => $personalAcademico
        ], 201);
    }

    public function show($id)
    {
        // Buscar el registro de PersonalAcademico por ID
        $personalAcademico = PersonalAcademico::with('tipoPersonal')->find($id);
        // Verificar si existe
        if (!$personalAcademico) {
            return response()->json(['message' => 'Personal académico no encontrado'], 404);
        }

        // Retornar los datos del personal académico
        return response()->json($personalAcademico, 200);
    }

    public function update(Request $request, $id)
    {

        $personalAcademico = PersonalAcademico::find($id);

        if (!$personalAcademico) {
            return response()->json([
                'message' => 'Personal académico no encontrado.'
            ], 404);
        }

        $personalAcademico->name = $request->input('name');
        $personalAcademico->email = $request->input('email');
        $personalAcademico->telefono = $request->input('telefono');
        $personalAcademico->estado = $request->input('estado');
        $personalAcademico->tipo_personal_id = $request->input('tipo_personal_id');

        $personalAcademico->save();

        return response()->json([
            'message' => 'Personal académico actualizado exitosamente.',
            'personal_academico' => $personalAcademico
        ], 200);
    }

}
