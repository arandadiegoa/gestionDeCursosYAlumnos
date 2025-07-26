@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h1>Nueva Inscripción</h1>

  <form action="{{ route('inscripciones.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="alumno_id" class="form-label">Alumno</label>
      <select name="alumno_id" id="alumno_id" class="form-select" required>
        <option value="" disabled {{old('alumno_id') ? '': 'selected'}}>Seleccione un alumno</option>
        @foreach($alumnos as $alumno)
          <option value="{{ $alumno->id }}">
            {{ $alumno->nombre }} {{ $alumno->apellido }}
          </option>
        @endforeach
      </select>

      @error('alumno_id')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="curso_id" class="form-label">Curso</label>
      <select name="curso_id" id="curso_id" class="form-select" required>
        <option value="" disabled {{old('curso_id') ? '' : 'selected'}}>Seleccione un curso</option>
        @foreach($cursos as $curso)
          <option value="{{ $curso->id }}">{{ $curso->titulo }}</option>
        @endforeach
      </select>
      @error('curso_id')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Inscribir</button>
    <a href="{{ route('inscripciones.index') }}" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
@endsection
