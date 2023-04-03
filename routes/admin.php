<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\Admin\NoticiasController;
use App\Http\Controllers\Admin\PreguntasController;
use App\Http\Controllers\Admin\TesstController;
use App\Http\Controllers\Admin\AsignaturasController;

Route::get('',[HomeController::class,'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users',UsuariosController::class)->names('admin.users');
Route::resource('noticias',NoticiasController::class)->names('admin.noticias');
Route::resource('preguntas',PreguntasController::class)->names('admin.preguntas');
Route::resource('tesst',TesstController::class)->names('admin.tesst');
Route::resource('asignaturas',AsignaturasController::class)->names('admin.asignaturas');