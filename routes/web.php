<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthWebController;
use App\Http\Controllers\PacienteController; // controller WEB correto

/*
|--------------------------------------------------------------------------
| Rotas Web
|--------------------------------------------------------------------------
| - Home → redireciona para login
| - Termos LGPD
| - Autenticação (guest): login/register
| - Área autenticada (auth): dashboard + CRUD pacientes
| - Fallback para rotas inexistentes
*/

Route::get('/', fn () => redirect()->route('login'))->name('home');

// Termos LGPD (tua view: resources/views/auth/legal/termos-lgpd.blade.php)
Route::get('/termos-lgpd', fn () => view('auth.legal.termos-lgpd'))->name('legal.termos');

// Área pública (somente visitantes)
Route::middleware('guest')->group(function () {
    Route::get('/login',    [AuthWebController::class, 'showLogin'])->name('login');
    Route::post('/login',   [AuthWebController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthWebController::class, 'showRegister'])->name('register');
    Route::post('/register',[AuthWebController::class, 'register'])->name('register.post');
});

// Logout (somente autenticado)
Route::post('/logout', [AuthWebController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Área autenticada (admin gerencia pacientes)
Route::middleware('auth')->group(function () {
    // tua view está em resources/views/pacientes/dashboard.blade.php
    Route::get('/dashboard', fn () => view('pacientes.dashboard'))->name('dashboard');

    // CRUD Pacientes (views)
    Route::get('/pacientes',                 [PacienteController::class, 'index'])->name('pacientes.index');
    Route::get('/pacientes/create',          [PacienteController::class, 'create'])->name('pacientes.create');
    Route::post('/pacientes',                [PacienteController::class, 'store'])->name('pacientes.store');
    Route::get('/pacientes/{paciente}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
    Route::put('/pacientes/{paciente}',      [PacienteController::class, 'update'])->name('pacientes.update');
    Route::delete('/pacientes/{paciente}',   [PacienteController::class, 'destroy'])->name('pacientes.destroy');
});

// Fallback elegante
Route::fallback(function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});
