<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\ExamenController;
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
    Route::get('/asignaturas/{id}', [AsignaturaController::class, 'show'])->name('asignatura');
    Route::get('/examenes/{id}', [ExamenController::class, 'show'])->name('examen');
    Route::post('/examenes/{id}', [ExamenController::class, 'entregar'])->name('entregar_examen');
    Route::get('/examenes/{id}/resultado', [ExamenController::class, 'resultado'])->name('resultado_examen');
    Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias');
    Route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('noticia');
});