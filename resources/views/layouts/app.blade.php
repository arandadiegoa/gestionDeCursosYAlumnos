<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diego Aranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    @include('partials.nav')
   
    <div class="min-vh-100 d-flex flex-column">
        <!--   {{-- Seccion principal del contenido --}} -->
         @yield('title')
        <main class="flex-grow-1">
            @yield('content')
        </main>

        <!--  {{-- Footer global del contenido --}} -->
        <footer class="mt-3">
            @include('partials.footer')
        </footer>
    </div>
</body>

</html>
