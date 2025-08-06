<?php

namespace App\Http\Controllers;
use App\Models\Alumno;
use App\Models\Curso;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::whereHas('cursos', function($query){
            $query->where('inscripciones.estado', 'activo');
        })->with(['cursos' => function($query){
            $query->where('inscripciones.estado', 'activo');
        }])->get();

        return view('inscripciones.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //Formulario para inscribir un alumno a un curso
    {
        $alumnos = Alumno::where('activo',  1)->get();
        $cursos = Curso::all();

        return view('inscripciones.create', compact('alumnos', 'cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //Guarda la inscripcion
    {
        $request->validate([
          'alumno_id' =>['required', 'exists:alumnos,id',
              Rule::exists('alumnos', 'id')->where(function($query){
             return $query->where('activo', 1);
            })
        ],
          'curso_id' =>[
              'required', 'exists:cursos,id',
              Rule::unique('inscripciones')->where(function($query) use ($request){
              return $query->where('alumno_id', $request->alumno_id);
            }),
          ],
        ],[
          'alumno_id.exists' => 'El alumno no existe o no esta activo.',
          'curso_id.unique' => 'Este alumno ya esta inscripto en el curso.',
        ]);

        //Busca alumnos
        $alumno = Alumno::find($request->alumno_id);

        //Validar que no tenga >5 cursos
        $cursos_activos = $alumno->cursos()
          ->wherePivot('estado', 'activo')
          ->count();

          if($cursos_activos >=5){
            return redirect()
            ->back()
            ->withErrors(['alumno_id' => 'El alumno ya tiene 5 cursos activos']);
          }

        //Validar que el curso este activo
          $curso = Curso::find($request->curso_id);
          if(!$curso || $curso->estado !=='activo') {
            return redirect()
            ->back()
            ->withErrors(['curso_id' => 'Solo se puede inscribir a cursos activos'])
            ->withInput();
          }

        //Registrar inscripción
        $alumno->cursos()->attach($request->curso_id, [
          'fecha_inscripcion' =>now(),
          'asistencias' => 0,
          'estado' => 'activo'
        ]);

        return redirect()->route('inscripciones.index')->with('success', 'Alumno inscripto correctamente');
    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy($alumno_id, $curso_id)
    {
        $alumno = Alumno::findOrFail($alumno_id);
        $alumno->cursos()->detach($curso_id);

        return redirect()->route('inscripciones.index')->with('success', 'Inscripción eliminada correctamente');
    }
}