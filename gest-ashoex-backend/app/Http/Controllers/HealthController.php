<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="API Health Check",
 *     description="API para verificar el estado de salud del sistema"
 * )
 */
class HealthController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/health",
     *     tags={"Health Check"},
     *     summary="Verifica el estado de la API y la conexión a la base de datos",
     *     description="Devuelve el estado de salud del sistema",
     *     @OA\Response(
     *         response=200,
     *         description="Estado de salud correcto",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="string", example="healthy"),
     *             @OA\Property(property="database", type="string", example="Connected"),
     *             @OA\Property(property="timestamp", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error en la conexión a la base de datos"
     *     )
     * )
     */
    public function check(): JsonResponse
    {
        // Verificación de la conexión a la base de datos como parte del health check
        try {
            DB::connection()->getPdo();
            $dbStatus = 'Connected';
        } catch (\Exception $e) {
            $dbStatus = 'Disconnected';
        }

        return response()->json([
            'status' => 'healthy',
            'database' => $dbStatus,
            'timestamp' => now(),
        ]);
    }
}
