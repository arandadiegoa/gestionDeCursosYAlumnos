@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Evaluaciones</h2>

        <a href="{{ route('evaluaciones.create') }}" class="btn btn-primary mb-3">Nueva Evaluación</a>

        @if (session('success'))
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
        @if ($evaluaciones->count()) {{--Valida si tiene evaluaciones--}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Alumno</th>
                        <th>Curso</th>
                        <th>Descripción</th>
                        <th>Nota</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evaluaciones as $evaluacion)
                        <tr>
                            <td>{{ $evaluacion->alumno->nombre }}</td>
                            <td>{{ $evaluacion->curso->titulo }}</td>
                            <td>{{ $evaluacion->descripcion }}</td>
                            <td>{{ $evaluacion->nota }}</td>
                            <td>{{ $evaluacion->fecha }}</td>
                            <td>
                                <a href="{{ route('evaluaciones.edit', $evaluacion) }}"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('evaluaciones.destroy', $evaluacion) }}" method="POST"
                                    class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">
                    Este alumno no tiene evaluaciones registradas.
            </div>
        @endif
            <a href="{{ route('inscripciones.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
@endsection
