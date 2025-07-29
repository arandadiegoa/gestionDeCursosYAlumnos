@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Subir Archivo</h2>
    <form method="POST" action="{{ route('archivos_adjuntos.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select name="curso_id" class="form-select" required>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->titulo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" class="form-select" required>
                <option value="tarea">Tarea</option>
                <option value="material">Material</option>
                <option value="guía">Guía</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="archivo" class="form-label">Archivo</label>
            <input type="file" name="archivo" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Subir</button>
        <a href="{{ route('archivos_adjuntos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
