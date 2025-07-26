@extends('layouts.app')

@section('content')

  <div class="container mt-4">
    <h1>Registrar Docente</h1>

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

    <form action="{{ route('docentes.store') }}" method="POST">
     
      @csrf <!--Protege de ataques, generando token oculto-->

      <div class="row mb-3">
        <div class="col">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" name="nombre" id="nombre" value="{{ old('nombre')}}" 
              class="form-control @error('nombre') is-invalid @enderror" required>
              @error('nombre')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
        </div>

        <div class="col">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="text" name="apellido" id="apellido" value="{{ old('apellido')}}" 
              class="form-control @error('apellido') is-invalid @enderror" required>
              @error('apellido')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
        </div>

        <div class="col">
          <label for="dni" class="form-label">DNI</label>
          <input type="text" name="dni" id="dni" value="{{ old('dni')}}"
              class="form-control @error('dni') is-invalid @enderror" required>
              @error('dni')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
        </div>

        <div class="col">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" id="email" value="{{ old('email')}}" 
              class="form-control @error('email') is-invalid @enderror" required>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
        </div>

        <div class="col">
          <label for="especialidad" class="form-label">Especialidad</label>
          <input type="text" name="especialidad" id="especialidad" value="{{ old('especialidad')}}" 
              class="form-control @error('especialidad') is-invalid @enderror" required>
              @error('especialidad')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
        </div>

        <div class="col">
          <label for="telefono" class="form-label">Teléfono</label>
          <input type="tel" name="telefono" id="telefono" value="{{ old('telefono')}}" 
              class="form-control @error('telefono') is-invalid @enderror" required>
              @error('telefono')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
        </div>

        <div class="col">
          <label for="direccion" class="form-label">Dirección</label>
          <input type="text" name="direccion" id="direccion" value="{{ old('direccion')}}" 
              class="form-control @error('direccion') is-invalid @enderror" required>
              @error('direccion')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
        </div>
        
        <div class="mb-3 form-check">
            <input type="hidden" name="activo" value="0">
            <input type="checkbox" name="activo" value="1" id="activo" class="form-check-input" {{ old('activo', '0') == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="activo">Activo</label>
        </div>
      </div>
      <div class="mt-4">
          <button type="submit" class="btn btn-primary w-10">Registrarse</button>
      </div>
      <a href="{{ route('docentes.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </form>
  </div>
@endsection