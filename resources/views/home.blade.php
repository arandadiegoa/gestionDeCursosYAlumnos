@extends('layouts.app')

@section('content')
  <div class="container text-center mt-5">
    <h1 class="mb-4">Bienvenido a la App de Gestión</h1>
    <p>Usá el menú superior para acceder a las secciones del sistema.</p>

    <div class="d-flex justify-content-center gap-3 mt-4">
      <a href="{{ route('login') }}" class="btn btn-primary px-4">Iniciar Sesión</a>
      <a href="{{ route('register') }}" class="btn btn-success px-4">Registrarse</a>
    </div>
  </div>
@endsection
