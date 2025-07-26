<?php

namespace App\Http\Controllers;
use App\Models\Docente;

use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //Muestra el listado de Docentes
    {
        $docentes = Docente::all();
        return view('docentes.index', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('docentes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Convertimos activo en boolean antes de validar
        $request->merge([
          'activo' => $request->input('activo') == '1',
        ]);

        $request ->validate([
          'nombre' =>'required|string|max:255',
          'apellido' =>'required|string|max:255',
          'dni' => 'required|integer|unique:docentes,dni',
          'email' => 'required|email|unique:docentes,email',
          'especialidad' => 'required|string|max:255',
          'telefono' => 'nullable|string|max:20',
          'direccion' => 'nullable|string|max:255',
          'activo' => 'required|boolean',
        ]);

        //Crear Docente
        Docente::create($request->all());

        return redirect()->route('docentes.index')->with('success', 'Docente creado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $docente = Docente::findOrFail($id);
        return view('docentes.show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $docente = Docente::findOrFail($id);
        return view('docentes.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //Convertimos activo en boolean antes de validar
        $request->merge([
          'activo' => $request->input('activo') == '1',
        ]);

        $request ->validate([
          'nombre' =>'required|string|max:255',
          'apellido' =>'required|string|max:255',
          'dni' => 'required|integer|unique:docentes,dni,' . $id,
          'email' => 'required|email|unique:docentes,email,' .$id,
          'especialidad' => 'required|string|max:255',
          'telefono' => 'nullable|string|max:20',
          'direccion' => 'nullable|string|max:255',
          'activo' => 'required|boolean',
        ]);

        
        $docente = Docente::findOrFail($id);
        $docente ->update($request->all());

        return redirect()->route('docentes.index')->with('success', 'Docente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $docente = Docente::findOrFail($id);
        $docente -> delete();
     
        return redirect()->route('docentes.index')->with('success', 'Docente eliminado correctamente');

    }
}
