<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\PacienteController;
use App\Http\Middleware\LogRequestResponse; // se quiser logar req/res

// Auth pública
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login',    [AuthApiController::class, 'login']);

// Protegidas (token Sanctum)
Route::middleware(['auth:sanctum', LogRequestResponse::class])->group(function () {
    Route::get('/me',     [AuthApiController::class, 'me']);
    Route::post('/logout',[AuthApiController::class, 'logout']);

    // CRUD Pacientes
    Route::apiResource('pacientes', PacienteController::class)
        ->parameters(['pacientes' => 'paciente']); // binder pelo {paciente}
});
