@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Editar Evaluación</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Errores:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('evaluaciones.update', $evaluacion) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Campo ALUMNO (solo visual) --}}
            <div class="mb-3">
                <label class="form-label">Alumno</label>
                <input type="text" class="form-control"
                    value="{{ $evaluacion->alumno->apellido }}, {{ $evaluacion->alumno->nombre }}" disabled>
                <input type="hidden" name="alumno_id" value="{{ old('alumno_id', $evaluacion->alumno_id ?? '') }}">
            </div>

            {{-- Campo CURSO (solo visual) --}}
            <div class="mb-3">
                <label class="form-label">Curso</label>
                <input type="text" class="form-control" value="{{ $evaluacion->curso->titulo ?? 'Sin curso asignado' }}"
                    disabled>
                <input type="hidden" name="curso_id" value="{{ old('curso_id', $evaluacion->curso_id ?? '') }}">
            </div>


            {{-- Campo DESCRIPCIÓN (editable) --}}
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" name="descripcion" class="form-control"
                    value="{{ old('descripcion', $evaluacion->descripcion ?? '') }}" required>
            </div>

            {{-- Campo NOTA (editable) --}}
            <div class="mb-3">
                <label for="nota" class="form-label">Nota (1 a 10)</label>
                <input type="number" name="nota" class="form-control" min="1" max="10"
                    value="{{ old('nota', $evaluacion->nota ?? '') }}" required>
            </div>

            {{-- Campo FECHA (editable) --}}
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" class="form-control"
                    value="{{ old('fecha', isset($evaluacion) ? $evaluacion->fecha->format('Y-m-d') : '') }}" required>
            </div>


            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('evaluaciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
