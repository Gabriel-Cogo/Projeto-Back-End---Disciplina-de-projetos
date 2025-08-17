<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\PacienteController;

// Auth pública
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login',    [AuthApiController::class, 'login']);

// Rotas protegidas por token Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me',     [AuthApiController::class, 'me']);
    Route::post('/logout',[AuthApiController::class, 'logout']);

    Route::apiResource('pacientes', PacienteController::class);
});
