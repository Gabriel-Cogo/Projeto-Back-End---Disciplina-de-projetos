<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthWebController;
use App\Http\Controllers\PacienteWebController;

Route::get('/', fn() => redirect()->route('login'));

// Termos LGPD (página simples)
Route::get('/termos-lgpd', fn() => view('legal.termos-lgpd'))->name('legal.termos');

Route::middleware('guest')->group(function () {
    Route::get('/login',    [AuthWebController::class, 'showLogin'])->name('login');
    Route::post('/login',   [AuthWebController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthWebController::class, 'showRegister'])->name('register');
    Route::post('/register',[AuthWebController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthWebController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::get('/pacientes',               [PacienteWebController::class, 'index'])->name('pacientes.index');
    Route::get('/pacientes/create',        [PacienteWebController::class, 'create'])->name('pacientes.create');
    Route::post('/pacientes',              [PacienteWebController::class, 'store'])->name('pacientes.store');
    Route::get('/pacientes/{paciente}/edit',[PacienteWebController::class, 'edit'])->name('pacientes.edit');
    Route::put('/pacientes/{paciente}',    [PacienteWebController::class, 'update'])->name('pacientes.update');
    Route::delete('/pacientes/{paciente}', [PacienteWebController::class, 'destroy'])->name('pacientes.destroy');
});
