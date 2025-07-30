@extends('layouts.app')

@section('content')

<div class="container mt-4">
  <h1>Detalles del Curso</h1>

    <ul class="list-group">
      <li class="list-group-item"><strong>Título:</strong> {{ $curso->titulo }}</li>
      <li class="list-group-item"><strong>Descripción:</strong> {{ $curso->descripcion }}</li>
      <li class="list-group-item"><strong>Fecha de Inicio:</strong> {{ $curso->fecha_inicio }}</li>
      <li class="list-group-item"><strong>Fecha de Fin:</strong> {{ $curso->fecha_fin }}</li>
      <li class="list-group-item"><strong>Estado:</strong> {{ ucfirst($curso->estado) }}</li>
      <li class="list-group-item"><strong>Modalidad:</strong> {{ ucfirst($curso->modalidad) }}</li>
      <li class="list-group-item"><strong>Aula Virtual:</strong> {{ $curso->aula_virtual ?? '-' }}</li>
      <li class="list-group-item"><strong>Cupos Máximos:</strong> {{ $curso->cupos_maximos }}</li>
      <li class="list-group-item"><strong>Docente:</strong> {{ $curso->docente->nombre }} {{ $curso->docente->apellido }}</li>
      <li class="list-group-item"><strong>Archivo Ajunto:</strong>
       <ul>
        @forelse ($curso->archivosAdjuntos as $archivo)
        <li>
          {{--Genero la url publica para descarga--}}
          <a href="{{asset('storage/' . $archivo->archivo_url)}}" target="_blank" download> 
          {{$archivo->titulo}}
          </a>
        </li>
        @empty
        <li>-</li>
        @endforelse
       </ul>
    </ul>

  <a href="{{ route('cursos.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>

@endsection
