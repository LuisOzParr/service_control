<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'service_control') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('layouts.partials.navBar')

    <section class="section">
        <div class="container">
            @yield('content')
        </div>
    </section>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                <strong>Service Control</strong> by <a href="https://ozparrzource.com">Luis Ozuna</a>. This web App is a challenge to
                <a href="https://www.computrabajo.com.mx/empresas/acerca-de-avances-tecnologicos-en-movilidad-sa-de-cv-8D002E3773ECFAD3">Avances Tecnológicos en Movilidad S.A. de C.V.</a>
            </p>
        </div>
    </footer>
</body>
</html>
