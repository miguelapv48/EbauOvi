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
    Route::resource('preguntas', PreguntaController::class)->names('admin.preguntas');
    Route::resource('examen', ExamenController::class)->names('admin.examen');
    Route::resource('asignaturas', AsignaturaController::class)->names('admin.asignaturas');
});