@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Archivos Adjuntos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('archivos_adjuntos.create') }}" class="btn btn-success mb-3">Subir Nuevo Archivo</a>

    <table class="table table-bordered">
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
                        <a href="{{ asset('storage/' . $archivo->archivo_url) }}" target="_blank">Ver / Descargar</a>
                    </td>
                    <td>{{ $archivo->fecha_subida->format('d/m/Y') }}</td>
                    <td>
                        <form action="{{ route('archivos_adjuntos.destroy', $archivo) }}" method="POST" onsubmit="return confirm('¿Eliminar este archivo?')">
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
</div>
@endsection
