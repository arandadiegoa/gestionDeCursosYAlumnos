<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\InscripcionController;


Route::get('/', function () {
  return view('home');
});

Route::resource('alumnos', AlumnoController::class); //registra automáticamente todas las rutas necesarias
Route::resource('docentes', DocenteController::class); //registra automáticamente todas las rutas necesarias
Route::resource('cursos', CursoController::class); //registra automáticamente todas las rutas necesarias
Route::resource('inscripciones', InscripcionController::class)->except(['destroy']); //registra automáticamente todas las rutas necesarias
Route::delete('inscripciones/{alumno_id}/{curso_id}', [InscripcionController::class, 'destroy'])->name('inscripciones.destroy');
