<nav>
    <div class="nav-wrapper blue">
        <a href="{{ route('site.home') }}" class="brand-logo">Logo</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger">
            <i class="material-icons">SisAdmin</i>
            <p class="grey-text text-lighten-4">Sistema de Administração</p>
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <a class="grey-text text-lighten-3" href="{{ route('admin.principal') }}">
                    Início
                </a>
            </li>
            <li>
                <a class="grey-text text-lighten-3" href="{{ route('site.home') }}" target="_blank">
                    Site
                </a>
            </li>
            @if (Auth::guest())
                <li>
                    <a class="grey-text text-lighten-3" href="{{ route('admin.login') }}">
                        Login
                    </a>
                </li>
            @else
                <li>
                    <a class="dropdown-trigger " href="#!" data-target="dropdown1">
                        {{ Auth::user()->name }}
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>

                    <ul id="dropdown1" class="dropdown-content">
                        <li>
                            <a href="#">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.imoveis.index') }}">
                                Imóveis
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.cidades.index') }}">
                                Cidades
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.tipos.index') }}">
                                Tipos
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.slides.index') }}">
                                Slides
                            </a>
                        </li>
                        @can('usuario_listar')
                            <li>
                                <a href="{{ route('admin.index') }}">
                                    Usuários
                                </a>
                            </li>
                        @endcan
                        <li>
                            <a href="{{ route('admin.papel.index') }}">
                                Papéis
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.paginas.index') }}">
                                Páginas
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="grey-text text-lighten-3" href="{{ route('admin.login.sair') }}">
                        Sair
                    </a>
                </li>
            @endif
            {{-- <li>
                    <a class="grey-text text-lighten-3" href="{{ route('site.home') }}">
                        Site</a> --}}
            </li>
        </ul>
    </div>
</nav>
