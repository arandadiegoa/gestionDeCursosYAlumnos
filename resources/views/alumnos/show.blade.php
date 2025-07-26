@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalle del Alumno</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{ $alumno->nombre }}</li>
        <li class="list-group-item"><strong>Apellido:</strong> {{ $alumno->apellido }}</li>
        <li class="list-group-item"><strong>DNI:</strong> {{ $alumno->dni }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $alumno->email }}</li>
        <li class="list-group-item"><strong>Fecha de nacimiento:</strong> {{ $alumno->fecha_de_nacimiento->format('d/m/Y') }}</li>
        <li class="list-group-item"><strong>Teléfono:</strong> {{ $alumno->telefono }}</li>
        <li class="list-group-item"><strong>Dirección:</strong> {{ $alumno->direccion }}</li>
        <li class="list-group-item"><strong>Género:</strong> {{ $alumno->genero }}</li>
        <li class="list-group-item"><strong>Activo:</strong> {{ $alumno->activo ? 'Si' : 'No' }}</li>
    </ul>
    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
