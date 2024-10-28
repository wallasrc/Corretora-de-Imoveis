@extends('layouts.site')

@section('content')
    <div class="container">
        <div class="row section">
            <h3 align="center">Contato</h3>
            <div class="divider"></div>
        </div>
        <div class="row section">
            <div class="col s12 m7">
                @if ($pagina->mapa)
                    <div class="video-container">
                        {!! $pagina->mapa !!}
                    </div>
                @else
                    <img class="responsive-img" src="{{ asset($pagina->imagem) }}"></img>
                @endif
            </div>
            <div class="col s12 m5">
                <h4>{{ $pagina->titulo }}</h4>
                <div class="col s12 m6">
                    <h4>{{ $pagina->titulo }}</h4>
                    <blockquote>
                        {{ $pagina->descricao }}
                    </blockquote>
                </div>
                <form action="{{ route('site.contato.enviar') }}" method="POST" class="col s12 m12">
                    @csrf
                    <div class="input-field">
                        <input type="text" name="nome" id="nome" class="validate">
                        <label for="nome">Nome</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" id="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field">
                        <textarea name="mensagem" id="mensagem" cols="30" rows="10" class="materialize-textarea"></textarea>
                        <label for="mensagem">Mensagem</label>
                    </div>

                    <button type="submit" class="btn blue">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
