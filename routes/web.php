<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;


Route::get('/', function () {
  return view('home');
});

Route::resource('alumnos', AlumnoController::class); //registra automáticamente todas las rutas necesarias
Route::resource('docentes', DocenteController::class); //registra automáticamente todas las rutas necesarias