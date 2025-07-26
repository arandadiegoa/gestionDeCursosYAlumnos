<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">
        <img src="{{ asset('img/e-learning-icon.png') }}" alt="Logo" width="40" height="40" class="me-2">
        Gestión de Cursos y Alumnos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContenido">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="{{ route('alumnos.index') }}">Alumnos</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link {{ request()->is('save') ? 'active' : '' }}" href="#">Inscripciones</a>
                </li>
                   <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="#">Panel</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
