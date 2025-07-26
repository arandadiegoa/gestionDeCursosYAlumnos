@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalle del Docente</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{ $docente->nombre }}</li>
        <li class="list-group-item"><strong>Apellido:</strong> {{ $docente->apellido }}</li>
        <li class="list-group-item"><strong>DNI:</strong> {{ $docente->dni }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $docente->email }}</li>
        <li class="list-group-item"><strong>Especialidad:</strong> {{ $docente->especialidad }}</li>
        <li class="list-group-item"><strong>Teléfono:</strong> {{ $docente->telefono }}</li>
        <li class="list-group-item"><strong>Dirección:</strong> {{ $docente->direccion }}</li>
        <li class="list-group-item"><strong>Activo:</strong> {{ $docente->activo ? 'Si' : 'No' }}</li>
    </ul>
    <a href="{{ route('docentes.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
