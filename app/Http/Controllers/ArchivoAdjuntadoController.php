<?php

namespace App\Http\Controllers;
use App\Models\ArchivoAdjunto;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ArchivoAdjuntadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $archivos = ArchivoAdjunto::with('curso')->latest()->get();
        return view('archivos.index', compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
      if(!in_array(auth()->user()->rol,['admin', 'docente'])){
          abort(403);
        }

        $cursoId = $request->curso_id;
        $curso = Curso::findOrFail($request->curso_id);
        return view('archivos.create', compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'curso_id'=> 'required|exists:cursos,id',
          'titulo' => 'required|string|max:255',
          'archivo' => 'required|file|mimes:pdf,docx,ppt,jpg,png|max:10240',
          'tipo' => 'required|in:tarea,material,guia',
        ]);

        if(!in_array(auth()->user()->rol,['admin', 'docente'])){
          abort(403);
        }

        $archivo = $request->file('archivo');
        $ruta = $archivo->store('archivos', 'public');

        ArchivoAdjunto::create([
          'curso_id' => $request->curso_id,
          'titulo' => $request->titulo,
          'archivo_url' => $ruta,
          'tipo' => $request->tipo,
          'fecha_subida' => now(),
        ]);

        return redirect()->route('cursos.index')->with('success', 'Archivo subido correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArchivoAdjunto $archivo)
    {
         if(!in_array(auth()->user()->rol,['admin', 'docente'])){
          abort(403);
        }

        Storage::disk('public')->delete($archivo->archivo_url);
        $archivos_adjunto->delete();

        return redirect()->route('archivos.index')->with('success', 'Archivo eliminado correctamente');
    }
}
