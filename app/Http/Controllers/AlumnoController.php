<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //muestra el listado de alumnos
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // Convertimos 'activo' en booleano antes de validar
        $request->merge([
            'activo' => $request->input('activo') == '1',
        ]);

        $request->validate([
          'nombre' =>'required|string|max:255',
          'apellido' =>'required|string|max:255',
          'dni' => 'required|integer|unique:alumnos,dni',
          'email' => 'required|email|unique:alumnos,email',
          'fecha_de_nacimiento' => [
            'required',
            'date',
            'before_or_equal:' . now()->subYears(16)->format('Y-m-d'),
          ],
          'telefono' => 'nullable|string|max:20',
          'direccion' => 'nullable|string|max:255',
          'genero' => 'required|in:masculino,femenino,otro',
          'activo' => 'required|boolean',
        ]);

           // Crear alumno
        Alumno::create($request->all());;

        return redirect()->route('alumnos.index')->with('success', 'Alumno creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumnos.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Convertimos 'activo' en booleano antes de validar
        $request->merge([
            'activo' => $request->input('activo') == '1',
        ]);

        $request->validate([
          'nombre' =>'required|string|max:255',
          'apellido' =>'required|string|max:255',
          'dni' => 'required|integer|unique:alumnos,dni,' . $id,
          'email' => 'required|email|unique:alumnos,email,' . $id,
          'fecha_de_nacimiento' => [
            'required',
            'date',
            'before_or_equal:' . now()->subYears(16)->format('Y-m-d'),
          ],
          'telefono' => 'nullable|string|max:20',
          'direccion' => 'nullable|string|max:255',
          'genero' => 'required|in:masculino,femenino,otro',
          'activo' => 'required|boolean',
        ]);

        $alumno = Alumno::findOrFail($id);
        $alumno -> update($request->all());

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno ->delete();

        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente');
    }
}
