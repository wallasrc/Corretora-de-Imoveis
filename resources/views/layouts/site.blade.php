<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}</title>
    <meta name="description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}">

<meta name="twitter:card" value="sumary">


<meta property="og:title" content="{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ isset($seo['url']) ? $seo['url'] : config('app.url') }}" />
<meta property="og:image" content="{{ isset($seo['imagem']) ? $seo['imagem'] : config('seo.imagem') }}" />
<meta property="og:description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}" />

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
        @include('layouts._site._nav')
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
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer
                        content.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li>
                            <a class="grey-text text-lighten-3" href="{{ route('site.home') }}">Home</a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="{{ route('site.sobre') }}">Sobre</a>
                        </li>
                        <li>
                            <a class="grey-text text-lighten-3" href="{{ route('site.contato') }}">Contato</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2014 Copyright Text
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('lib/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('lib/materialize/dist/js/materialize.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>
</body>

</html>
