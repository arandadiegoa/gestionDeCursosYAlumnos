@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <h1>Editar Curso</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $curso->titulo) }}"
                        class="form-control @error('titulo') is-invalid @enderror" required>
                    @error('titulo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                        rows="1">{{ old('descripcion', $curso->descripcion) }}</textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio"
                        value="{{ old('fecha_inicio', $curso->fecha_inicio ? $curso->fecha_inicio->format('Y-m-d') : '') }}"
                        class="form-control @error('fecha_inicio') is-invalid @enderror" required>
                    @error('fecha_inicio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                    <input type="date" name="fecha_fin" id="fecha_fin"
                        value="{{ old('fecha_fin', $curso->fecha_fin ? $curso->fecha_fin->format('Y-m-d') : '') }}"
                        class="form-control @error('fecha_fin') is-invalid @enderror" required>
                    @error('fecha_fin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror"
                        required>
                        <option value="">Seleccione</option>
                        <option value="activo" {{ old('estado', $curso->estado) == 'activo' ? 'selected' : '' }}>Activo
                        </option>
                        <option value="finalizado" {{ old('estado', $curso->estado) == 'finalizado' ? 'selected' : '' }}>
                            Finalizado</option>
                        <option value="cancelado" {{ old('estado', $curso->estado) == 'cancelado' ? 'selected' : '' }}>
                            Cancelado</option>
                    </select>
                    @error('estado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="modalidad" class="form-label">Modalidad</label>
                    <select name="modalidad" id="modalidad" class="form-select @error('modalidad') is-invalid @enderror"
                        required>
                        <option value="">Seleccione</option>
                        <option value="presencial"
                            {{ old('modalidad', $curso->modalidad) == 'presencial' ? 'selected' : '' }}>Presencial</option>
                        <option value="virtual" {{ old('modalidad', $curso->modalidad) == 'virtual' ? 'selected' : '' }}>
                            Virtual</option>
                        <option value="hibrido" {{ old('modalidad', $curso->modalidad) == 'hibrido' ? 'selected' : '' }}>
                            Híbrido</option>
                    </select>
                    @error('modalidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="aula_virtual" class="form-label">Aula Virtual</label>
                    <input type="text" name="aula_virtual" id="aula_virtual"
                        value="{{ old('aula_virtual', $curso->aula_virtual) }}"
                        class="form-control @error('aula_virtual') is-invalid @enderror">
                    @error('aula_virtual')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="cupos_maximos" class="form-label">Cupos Máximos</label>
                    <input type="number" name="cupos_maximos" id="cupos_maximos" min="1"
                        value="{{ old('cupos_maximos', $curso->cupos_maximos) }}"
                        class="form-control @error('cupos_maximos') is-invalid @enderror">
                    @error('cupos_maximos')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="docente_id" class="form-label">Docente</label>
                    <select name="docente_id" id="docente_id" class="form-select @error('docente_id') is-invalid @enderror"
                        required>
                        <option value="">Seleccione</option>
                        @foreach ($docentes as $docente)
                            <option value="{{ $docente->id }}"
                                {{ old('docente_id', $curso->docente_id) == $docente->id ? 'selected' : '' }}>
                                {{ $docente->nombre }} {{ $docente->apellido }}
                            </option>
                        @endforeach
                    </select>
                    @error('docente_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div style="display: flex; align-items:flex-end; gap:10px">
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-10">Actualizar Curso</button>
                </div>
                <div>
                    <a href="{{ route('cursos.index') }}" class="btn btn-secondary mt-3">Volver</a>
                </div>
            </div>
        </form>
    </div>

@endsection
