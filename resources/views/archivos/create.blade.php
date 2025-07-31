@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Subir Archivo</h2>
    @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
    <form method="POST" action="{{ route('archivos.store') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="curso_id" value="{{ $curso->id }}">
        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <input type="text" class="form-control" value="{{$curso->titulo}}" disabled>
        </div>

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" class="form-select" required>
                <option value="tarea">Tarea</option>
                <option value="material">Material</option>
                <option value="guia">Guía</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="archivo" class="form-label">Archivo</label>
            <input type="file" name="archivo" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Subir</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
