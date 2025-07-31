@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Archivos Adjuntos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Título</th>
                <th>Tipo</th>
                <th>Archivo</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($archivos as $archivo)
                <tr>
                    <td>{{ $archivo->curso->titulo }}</td>
                    <td>{{ $archivo->titulo }}</td>
                    <td>{{ ucfirst($archivo->tipo) }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $archivo->archivo_url) }}" target="_blank">Ver</a>
                    </td>
                    <td>{{ $archivo->fecha_subida->format('d/m/Y') }}</td>
                    <td>
                        <form action="{{ route('archivos.destroy', $archivo) }}" method="POST" onsubmit="return confirm('¿Eliminar este archivo?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No hay archivos registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
