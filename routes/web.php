<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;

Route::get('/', function () {
  return view('home');
});

Route::resource('alumnos', AlumnoController::class); //registra automáticamente todas las rutas necesarias