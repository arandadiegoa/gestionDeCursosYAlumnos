@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <h1>Iniciar Sesión</h1>

    <!-- Mensaje de error general -->
    @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="row mb-3">
        <div class="col">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}"
            class="form-control @error('email') is-invalid @enderror" required autofocus>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <div class="col">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" id="password" name="password"
            class="form-control @error('password') is-invalid @enderror" required>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="mb-3 form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
          Recordarme
        </label>
      </div>

      <button type="submit" class="btn btn-primary">Ingresar</button>
      <a href="/home" class="btn btn-success px-4">Volver</a>
    </form>
  </div>
@endsection
