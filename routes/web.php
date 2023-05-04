<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AsignaturasController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PreguntasController;
use App\Http\Controllers\NoticiasController;


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
});

Route::get('/asignaturas',[AsignaturasController::class,'index'])->name('asignaturas');
Route::get('/tessts/{id}',[TestController::class,'index'])->name('tessts');
Route::get('/preguntas/{id}',[PreguntasController::class,'index'])->name('preguntas');
Route::get('/noticias',[NoticiasController::class,'index'])->name('noticias');
