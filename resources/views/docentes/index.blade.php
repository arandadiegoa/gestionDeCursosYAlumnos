@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h1 class="mb-4">Listado de docentes</h1>

  <a href="{{route('docentes.create') }}" class="btn btn-primary mb-3">Nuevo Docente</a>

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

  @if($docentes->count())
  <table class="table table-bordered table-striped">
    <thead>
          <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>email</th>
                <th>Acciones</th>
          </tr>
    </thead>
    <tbody>
      @foreach ($docentes as $docente)
        <tr>
          <td>{{ $docente->nombre }}</td>
          <td>{{ $docente->apellido }}</td>
          <td>{{ $docente->dni }}</td>
          <td>{{ $docente->email }}</td>
          <td>
            <a href="{{ route('docentes.show', $docente) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('docentes.destroy', $docente) }}" method="POST" class="d-inline">
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
      <div class="alert alert-info">No hay docentes registrados</div>
  @endif
</div>
@endsection