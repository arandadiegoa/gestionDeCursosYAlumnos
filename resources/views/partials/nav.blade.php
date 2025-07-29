<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/e-learning-icon.png') }}" alt="Logo" width="40" height="40" class="me-2">
            Gestión de Cursos y Alumnos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContenido">
            <ul class="navbar-nav ms-auto">

              {{--Muestra el home si no esta logueado --}}
              @guest
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
              @endguest
              
                @auth
                    <!-- Enlaces solo para Coordinadores -->
                    @if (Auth::user()->rol == 'coordinador')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('alumnos') ? 'active' : '' }}"
                                href="{{ route('alumnos.index') }}">Alumnos</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('inscripciones') ? 'active' : '' }}"
                                href="{{ route('inscripciones.index') }}">Inscripciones</a>
                        </li>
                    @endif

                    <!-- Enlaces solo para Administradores -->
                    @if (Auth::user()->rol == 'admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('docentes') ? 'active' : '' }}"
                                href="{{ route('docentes.index') }}">Docentes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('cursos') ? 'active' : '' }}"
                                href="{{ route('cursos.index') }}">Cursos</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link {{ request()->is('archivos') ? 'active' : '' }}"
                                href="{{ route('archivos.index') }}">Archivos</a>
                        </li>
                    @endif

                    <!-- Botón Cerrar Sesión -->
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="display:inline; cursor:pointer;">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
