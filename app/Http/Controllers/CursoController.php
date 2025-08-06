<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use App\Models\Docente;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //Muestro todos los cursos
    {
        $cursos = Curso::with('docente')->get(); //Realizo la relación con el docente, trayendo sus datos
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $docentes = Docente::activos()->get(); //Obtener docentes activos
        return view('cursos.create', compact('docentes')); //ver los docentes en la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
          'titulo' =>'required|string|max:255',
          'descripcion' =>'nullable|string',
          'fecha_inicio' => 'required|date|after_or_equal:today',
          'fecha_fin' => 'required|date|after:fecha_inicio',
          'estado' => 'required|in:activo,finalizado,cancelado',
          'modalidad' => 'required|in:presencial,virtual,hibrido',
          'aula_virtual' =>'nullable|required_if:modalidad,virtual,hibrido|string',
          'cupos_maximos' => 'nullable|integer|min:1',
          'docente_id' => 'required|exists:docentes,id',
        ]);

        //Validar docente no tenga >3 cursos activos
        $docenteId = $request->docente_id;

        $cursosActivos = Curso::where('docente_id', $docenteId)
          ->where('estado', 'activo')
          ->count();

        if($cursosActivos >=3 ){
          return redirect()
          ->back()
          ->withErrors(['docente_id' => 'Este docente ya tiene 3 cursos activos.'])
          ->withInput();
        }

        //Creo cursos
        Curso::create($request->all());
        
        return redirect()->route('cursos.index')->with('success', 'Curso creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curso = Curso::with('docente', 'archivosAdjuntos')->findOrFail($id);

        return view('cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $curso = Curso::findOrFail($id); //Busco el curso
        $docentes = Docente::activos()->get(); //Traigo docentes activos

        return view('cursos.edit', compact('curso', 'docentes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        $request ->validate([
          'titulo' =>'required|string|max:255',
          'descripcion' =>'nullable|string',
          'fecha_inicio' => 'required|date',
          'fecha_fin' => 'required|date|after:fecha_inicio',
          'estado' => 'required|in:activo, finalizado, cancelado',
          'modalidad' => 'required|in:presencial,virtual,hibrido',
          'aula_virtual' =>'nullable|required_if:modalidad,virtual,hibrido|string',
          'cupos_maximos' => 'nullable|integer|min:1',
          'docente_id' => 'required|exists:docentes,id',
        ]);

        $curso->update($request->all()); //actualizar los campos
        
        return redirect()->route('cursos.index')->with('success', 'Curso actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        $curso ->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado correctamente.');

    }
}
