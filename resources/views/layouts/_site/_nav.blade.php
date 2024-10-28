<nav>
    <div class="nav-wrapper blue">
        <div class="container">
            <a href="{{ route('site.home') }}" class="brand-logo">Logo</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
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
</nav>
