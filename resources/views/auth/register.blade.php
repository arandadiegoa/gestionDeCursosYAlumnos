@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Registro de Usuario</h1>

        <!-- Mensaje de error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row mb-3">
                <div class="col">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Rol del Usuario -->
            <div class="row mb-3">
                <label for="rol" class="block text-gray-700 text-sm font-bold mb-2">Rol</label>
                <select id="rol" name="rol"
                    class="shadow-sm appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" disabled selected>Selecciona un rol</option>
                    <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="coordinador" {{ old('rol') == 'coordinador' ? 'selected' : '' }}>Coordinador</option>
                </select>
                @error('rol')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" id="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                        required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Registrarse</button>
        </form>
    </div>
@endsection
