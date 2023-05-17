<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\Admin\NoticiaController;
use App\Http\Controllers\Admin\PreguntaController;
use App\Http\Controllers\Admin\ExamenController;
use App\Http\Controllers\Admin\AsignaturaController;


Route::middleware('can:admin.home')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('admin.home');

    Route::resource('users', UsuariosController::class)->names('admin.users');
    Route::resource('noticias', NoticiaController::class)->names('admin.noticias');
    Route::resource('asignaturas', AsignaturaController::class)->names('admin.asignaturas')->except(['show']);
    Route::resource('asignaturas.examenes', ExamenController::class)->parameters(['examenes' => 'examen'])->names('admin.examenes')->except(['show', 'index']);
    Route::resource('asignaturas.examenes.preguntas', PreguntaController::class)->parameters(['examenes' => 'examen'])->names('admin.preguntas')->only(['store', 'update', 'destroy']);
});