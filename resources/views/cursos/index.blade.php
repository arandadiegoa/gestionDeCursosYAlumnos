@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h1 class="mb-4">Listado de cursos</h1>

  <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Nuevo Curso</a>

  @if(session('success'))
    <div id="success-message" class="alert alert-success">{{ session('success') }}</div>
    <script>
      // Espera 3 segundos y oculta el mensaje
      setTimeout(() => {
        const msg = document.getElementById('success-message');
        if (msg) {
          msg.style.transition = 'opacity 0.5s ease';
          msg.style.opacity = '0';
          setTimeout(() => msg.remove(), 500); // elimina del DOM
        }
      }, 3000);
    </script>
  @endif

  @if($cursos->count())
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Título</th>
          <th>Docente</th>
          <th>Estado</th>
          <th>Modalidad</th>
          <th>Fecha Inicio</th>
          <th>Fecha Fin</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cursos as $curso)
          <tr>
            <td>{{ $curso->titulo }}</td>
            <td>{{ $curso->docente->nombre }} {{ $curso->docente->apellido }}</td>
            <td>{{ ucfirst($curso->estado) }}</td>
            <td>{{ ucfirst($curso->modalidad) }}</td>
            <td>{{ $curso->fecha_inicio->format('d/m/Y') }}</td>
            <td>{{ $curso->fecha_fin->format('d/m/Y') }}</td>
            <td>
              <a href="{{ route('cursos.show', $curso) }}" class="btn btn-info btn-sm">Ver</a>
              <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-warning btn-sm">Editar</a>
              <a href="{{ route('archivos_adjuntos.create', ['curso_id' => $curso->id]) }}" class="btn btn-secondary btn-sm">Adjuntar archivo</a>
              <form action="{{ route('cursos.destroy', $curso) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('¿Estás seguro?')" class="btn btn-danger btn-sm">Eliminar</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <div class="alert alert-info">No hay cursos cargados.</div>
  @endif
</div>
@endsection
