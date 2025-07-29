@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Crear Evaluación</h2>

    {{-- Errores de validación --}}
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

    {{-- Formulario para seleccionar alumno (GET) --}}
    <form method="GET" action="{{ route('evaluaciones.create') }}" class="mb-4">
        <div class="mb-3">
            <label for="alumno_id" class="form-label">Alumno</label>
            <select name="alumno_id" id="alumno_id" class="form-select" onchange="this.form.submit()" required>
                <option value="">Seleccione un alumno</option>
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->id }}" {{ request('alumno_id') == $alumno->id ? 'selected' : '' }}>
                        {{ $alumno->apellido }}, {{ $alumno->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    {{-- Formulario principal para crear evaluación (POST) --}}
    @if(request('alumno_id'))
        @if($cursos->count())
          <form method="POST" action="{{ route('evaluaciones.store') }}">
              @csrf

              {{-- Alumno seleccionado (input oculto) --}}
              <input type="hidden" name="alumno_id" value="{{ request('alumno_id') }}">

              {{-- Campo Curso (si hay cursos para el alumno) --}}
              <div class="mb-3">
                  <label for="curso_id" class="form-label">Curso</label>
                  <select name="curso_id" id="curso_id" class="form-select" required>
                      <option value="">Seleccione un curso</option>
                      @foreach($cursos as $curso)
                          <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>
                              {{ $curso->titulo }}
                          </option>
                      @endforeach
                  </select>
              </div>

              {{-- Campo Descripción --}}
              <div class="mb-3">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}" required>
              </div>

              {{-- Campo Nota --}}
              <div class="mb-3">
                  <label for="nota" class="form-label">Nota (1 a 10)</label>
                  <input type="number" name="nota" class="form-control" min="1" max="10" value="{{ old('nota') }}" required>
              </div>

              {{-- Campo Fecha --}}
              <div class="mb-3">
                  <label for="fecha" class="form-label">Fecha</label>
                  <input type="date" name="fecha" class="form-control" value="{{ old('fecha') }}" required>
              </div>

              <button type="submit" class="btn btn-primary">Guardar</button>
              <a href="{{ route('evaluaciones.index') }}" class="btn btn-secondary">Cancelar</a>
          </form>
          @else
          <div class="alert alert-info">No tiene cursos registrados</div>
           <div>
              <a href="{{ route('inscripciones.index') }}" class="btn btn-secondary mt-3">Volver</a>
          </div>
          @endif 
    @endif
</div>
@endsection
