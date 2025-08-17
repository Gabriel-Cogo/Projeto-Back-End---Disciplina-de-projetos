<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\PacienteController;

// ---------- AUTENTICAÇÃO ----------
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login',    [AuthApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me',     [AuthApiController::class, 'me']);
    Route::post('/logout',[AuthApiController::class, 'logout']);

    // ---------- PACIENTES ----------
    Route::get('/pacientes',                 [PacienteController::class, 'index']);
    Route::post('/pacientes',                [PacienteController::class, 'store']);
    Route::get('/pacientes/{paciente}',      [PacienteController::class, 'show']);
    Route::put('/pacientes/{paciente}',      [PacienteController::class, 'update']);
    Route::delete('/pacientes/{paciente}',   [PacienteController::class, 'destroy']);
});

// Rota de diagnóstico (opcional): deve responder em GET /api/ping
Route::get('/ping', fn () => response()->json(['pong' => true]));
