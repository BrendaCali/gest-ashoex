<?php

use App\Http\Controllers\CarreraController;
use App\Http\Controllers\GrupoController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HealthController;
use App\Http\Controllers\CurriculaController;
use App\Http\Controllers\MateriaController;
//use App\Models\Carrera;


Route::get('/health', [HealthController::class, 'check']);

Route::controller(CarreraController::class)->group(function () {
    Route::get('/carreras', 'index');
    Route::get('/carreras/{id}', 'show');
    Route::delete('/carreras/{id}', 'destroy');
    Route::post('/carreras', 'store');
});

Route::controller(CurriculaController::class)->group(function () {
    Route::get('/curriculas', 'index');
    Route::get('/curriculas/{id}', 'show');
    Route::put('/curriculas/{id}', 'update');
    Route::post('/curriculas', 'store');
    Route::delete('/curriculas/{id}', 'destroy');
});

Route::controller(MateriaController::class)->group(function () {
    Route::get('/materias', 'index');
    Route::post('/materias','store');
    Route::put('/materiasUpdate/{id}', 'update'); // Ruta para actualizar materia 
    Route::patch('/materiasUpdate/{id}', 'update'); // Ruta para actualización parcial
    
});

Route::controller(GrupoController::class)-> group(function(){
    Route::get('/grupos','index');
    Route::post('/gruposPost','store');
    Route::get('/gruposid/{id}','show');
    Route::put('/gruposUpdate/{id}','update');
    Route::delete('/gruposDelete','destroy');
});
