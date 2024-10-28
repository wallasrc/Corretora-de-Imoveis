<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('lib/materialize/dist/css/materialize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


</head>

<body class="font-sans antialiased">
    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        @include('layouts._admin._nav')
    </header>

    <main>
        @if (Session::has('message'))
            <div class="container">
                <div class="row">
                    <div class="card {{ Session::get('message')['class'] }}">
                        <div align="center" class="card-content">
                            {{ Session::get('message')['msg'] }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="page-footer blue">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger">
                        <i class="material-icons">SisAdmin</i>
                        <p class="grey-text text-lighten-4">Sistema de Administração</p>
                    </a>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">SisAdmin</h5>
                    <ul>
                        <li>
                            <a class="grey-text text-lighten-3" 
                                href="{{ route('admin.principal') }}" target="_blank">
                                Início
                            </a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" 
                                href="{{ route('site.home') }}" target="_blank">
                                Site
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2014 Wallasrc
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('lib/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('lib/materialize/dist/js/materialize.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>
</body>

</html>
