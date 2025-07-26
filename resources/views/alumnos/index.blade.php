@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h1 class="mb-4">Listado de alumnos</h1>

  <a href="{{route('alumnos.create') }}" class="btn btn-primary mb-3">Nuevo Alumno</a>

  @if(session('success'))
    <div id="success-message" class="alert alert-success">{{ session('success') }}</div>
     <script>
    // Espera 3 segundos y oculta el mensaje
    setTimeout(() => {
      const msg = document.getElementById('success-message');
      if (msg) {
        msg.style.transition = 'opacity 0.5s ease';
        msg.style.opacity = '0';
        setTimeout(() => msg.remove(), 500); // lo elimina del DOM
      }
    }, 3000);
  </script>
  @endif

  @if($alumnos->count())
  <table class="table table-bordered table-striped">
    <thead>
          <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Activo</th>
                <th>Acciones</th>
          </tr>
    </thead>
    <tbody>
      @foreach ($alumnos as $alumno)
        <tr>
          <td>{{ $alumno->nombre }}</td>
          <td>{{ $alumno->apellido }}</td>
          <td>{{ $alumno->dni }}</td>
          <td>{{ $alumno->activo ? 'Si' : 'No' }}</td>
          <td>
            <a href="{{ route('alumnos.show', $alumno) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button onclick="return confirm('Estas seguro?')" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  @else
      <div class="alert alert-info">No hay alumnos registrados</div>
  @endif
</div>
@endsection