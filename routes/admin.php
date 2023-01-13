<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsuariosController;

Route::get('',[HomeController::class,'index']);

Route::resource('users',UsuariosController::class)->names('admin.users');