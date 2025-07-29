<?php

namespace App\Http\Controllers;
use App\Models\Evaluacion;
use App\Models\Alumno;
use App\Models\Curso;

use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $alumnos = Alumno::all(); //obtener todos los alumnos
        $evaluaciones = Evaluacion::with('alumno', 'curso'); //prepara la consulta de eval con relaciones

        //Filtro alumno al seleccionar y traigo la info
        if ($request->has('alumno_id') && $request->alumno_id) {
            $evaluaciones->where('alumno_id', $request->alumno_id);
        }
     
         return view('evaluaciones.index', [
        'evaluaciones' => $evaluaciones->get(),
        'alumnos' => $alumnos,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $alumnos = Alumno::with('cursos')->get(); //Traer alumnos con sus cursos inscriptos
        $cursos = [];

        if($request->filled('alumno_id')){
          $alumno = Alumno::with('cursos')->find($request->alumno_id);
          $cursos = $alumno?->cursos ?? [];
        }

        return view('evaluaciones.create', compact('alumnos', 'cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'alumno_id' => 'required|exists:alumnos,id',
          'curso_id' => 'required|exists:cursos,id',
          'descripcion' => 'required|string',
          'nota' => 'required|integer|between:1,10',
          'fecha' => 'required|date'
        ]);

        //Validar alumno inscripto en curso
        $alumno = Alumno::find($request->alumno_id);
        if(!$alumno->cursos()->where('curso_id', $request->curso_id)->exists()){
          return back()->withErrors(['curso_id' => 'El alumno no esta inscripto en el curso']);
        }

        Evaluacion::create($request->all());

        return redirect()->route('evaluaciones.index')->with('success', 'Evaluacion registrada correctamente.');
    }

 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluacion $evaluacion)
    {
       $alumnos = Alumno::all();
        $cursos = Curso::all();
        return view('evaluaciones.edit', compact('evaluacion','alumnos', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluacion $evaluacion)
    {
         $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'curso_id' => 'required|exists:cursos,id',
            'descripcion' => 'required|string',
            'nota' => 'required|integer|between:1,10',
            'fecha' => 'required|date',
        ]);

        $evaluacion->update($request->all());

        return redirect()->route('evaluaciones.index')->with('success', 'Evaluación actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluacion $evaluacion)
    {
        $evaluacion->delete();
        return redirect()->route('evaluaciones.index')->with('success', 'Evaluación eliminada correctamente');

    }
}