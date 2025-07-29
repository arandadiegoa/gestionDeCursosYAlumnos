<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EvaluacionController;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', function () {
        return view('admin.home');
    })->name('admin.home');

    Route::get('/coordinador/home', function () {
        return view('coordinador.home');
    })->name('coordinador.home');
});



Route::get('register', [AuthController::class, 'create'])->name('register');
Route::post('register', [AuthController::class, 'store']);

Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('alumnos', AlumnoController::class); //registra automáticamente todas las rutas necesarias

Route::resource('docentes', DocenteController::class); //registra automáticamente todas las rutas necesarias

Route::resource('cursos', CursoController::class); //registra automáticamente todas las rutas necesarias

Route::resource('inscripciones', InscripcionController::class)->except(['destroy']); //registra automáticamente todas las rutas necesarias
Route::delete('inscripciones/{alumno_id}/{curso_id}', [InscripcionController::class, 'destroy'])->name('inscripciones.destroy');

Route::resource('evaluaciones', EvaluacionController::class)->parameters([
    'evaluaciones' => 'evaluacion' //cambio evaluaciones por evaluacion, por convencion y claridad
]);