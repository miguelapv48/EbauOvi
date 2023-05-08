<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\NoticiaController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/asignaturas', [AsignaturaController::class, 'index'])->name('asignaturas');
    Route::get('/examenes/{id}', [ExamenController::class, 'index'])->name('examenes');
    Route::get('/preguntas/{id}', [PreguntaController::class, 'index'])->name('preguntas');
    Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias');
});