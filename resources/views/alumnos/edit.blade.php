@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h1>Editar alumno</h1>

    <!--Error-->
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $alumno->nombre) }}" 
                    class="form-control @error('nombre') is-invalid @enderror" required>
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" name="apellido" id="apellido" value="{{ old('apellido', $alumno->apellido) }}" 
                    class="form-control @error('apellido') is-invalid @enderror" required>
                @error('apellido')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" name="dni" id="dni" value="{{ old('dni', $alumno->dni) }}" 
                    class="form-control @error('dni') is-invalid @enderror" required>
                @error('dni')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $alumno->email) }}" 
                    class="form-control @error('email') is-invalid @enderror" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="fecha_de_nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" name="fecha_de_nacimiento" id="fecha_de_nacimiento" value="{{ old('fecha_de_nacimiento', $alumno->fecha_de_nacimiento?->format('Y-m-d')) }}" 
                    class="form-control @error('fecha_de_nacimiento') is-invalid @enderror" required>
                @error('fecha_de_nacimiento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="tel" name="telefono" id="telefono" value="{{ old('telefono', $alumno->telefono) }}" 
                    class="form-control @error('telefono') is-invalid @enderror">
                @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $alumno->direccion) }}" 
                    class="form-control @error('direccion') is-invalid @enderror">
                @error('direccion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="genero" class="form-label">Género</label>
                <select name="genero" id="genero" class="form-select @error('genero') is-invalid @enderror" required>
                    <option value="">Seleccione</option>
                    <option value="masculino" {{ old('genero', $alumno->genero) === 'masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="femenino" {{ old('genero', $alumno->genero) === 'femenino' ? 'selected' : '' }}>Femenino</option>
                    <option value="otro" {{ old('genero', $alumno->genero) === 'otro' ? 'selected' : '' }}>Otro</option>
                </select>
                @error('genero')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check mt-3">
                <input type="hidden" name="activo" value="0">
                <input type="checkbox" name="activo" value="1" id="activo" class="form-check-input" {{ old('activo', $alumno->activo) ? 'checked' : '' }}>
                <label class="form-check-label" for="activo">Activo</label>
            </div>

        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </form>
</div>

@endsection
