<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\Admin\NoticiasController;
use App\Http\Controllers\Admin\PreguntasController;

Route::get('',[HomeController::class,'index']);

Route::resource('users',UsuariosController::class)->names('admin.users');
Route::resource('noticias',NoticiasController::class)->names('admin.noticias');
Route::resource('preguntas',PreguntasController::class)->names('admin.preguntas');