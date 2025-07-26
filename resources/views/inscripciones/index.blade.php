@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Listado de Inscripciones</h1>

        <a href="{{ route('inscripciones.create') }}" class="btn btn-primary mb-3">Nueva Inscripción</a>

        @if (session('success'))
            <div id="success-message" class="alert alert-success">{{ session('success') }}</div>
            <script>
                setTimeout(() => {
                    const msg = document.getElementById('success-message');
                    if (msg) {
                        msg.style.transition = 'opacity 0.5s ease';
                        msg.style.opacity = '0';
                        setTimeout(() => msg.remove(), 500);
                    }
                }, 3000);
            </script>
        @endif

        @if ($alumnos->count())
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Alumno</th>
                        <th>Curso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                        @foreach ($alumno->cursos as $curso)
                            <tr>
                                <td>{{ $alumno->nombre }} {{ $alumno->apellido }}</td>
                                <td>{{ $curso->titulo }}</td>
                                <td>
                                    <form action="{{ route('inscripciones.destroy', [$alumno->id, $curso->id]) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('¿Seguro que desea eliminar la inscripción?')"
                                            class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">No hay inscripciones registradas</div>
        @endif
    </div>
@endsection
