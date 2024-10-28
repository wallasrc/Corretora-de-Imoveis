@extends('layouts.site')

@section('content')
    <div class="container">
        <div class="row section">
            <h3 align="center">{{ $imovel->titulo }}</h3>
            <div class="divider"></div>
        </div>

        <div class="row section">
            <div class="col s12 m8">
                <div class="row">
                    <div class="slider">
                        <ul class="slides">
                            @if ($imovel->galerias()->count())
                                @foreach ($galeria as $imagem)
                                    <li>
                                        <img src="{{ asset($imagem->imagem) }}" alt="{{ $imagem->titulo }}">
                                        <div
                                            class="caption 
                                            {{ $directionImage[rand(0, 2)] }}">
                                            <h3>{{ $imagem->titulo }}</h3>
                                            <h5>{{ $imagem->descricao }}</h5>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <img class="responsive-img" src="{{ asset($imovel->imagem) }}" alt="Imagem Padrão">
                            @endif
                        </ul>
                    </div>

                    <div class="row" align="center">
                        <button onclick="sliderPrev()" class="btn blue">Anterior</button>
                        <button onclick="sliderNext()" class="btn blue">Próximas</button>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <h4>{{ $imovel->titulo }}</h4>
                <blockquote>
                    {{ $imovel->descricao }}
                </blockquote>
                <p><b>Código: </b>{{ $imovel->codigo }}</p>
                <p><b>Status: </b>{{ $imovel->status }}</p>
                <p><b>Tipo: </b>{{ $imovel->tipo->titulo }}</p>
                <p><b>Dormitórios: </b>{{ $imovel->dormitorios }}</p>
                <p><b>Endereço: </b>{{ $imovel->endereco }}</p>
                <p><b>Cidade: </b>{{ $imovel->cidade->nome }}</p>
                <p><b>Valor: </b>R$ {{ number_format($imovel->valor, 2, ',', '.') }}</p>
                <a class="btn deep-orange darken-1" href="{{ route('site.contato') }}">
                    Entrar em contato
                </a>
            </div>
        </div>
        <div class="row section">
            <div class="col s12 m8">
                <div class="video-container">
                    {!! $imovel->mapa !!}
                </div>
            </div>
            <div class="col s12 m4">
                <h4>Detalhes:</h4>
                <p>{{ $imovel->detalhes }}</p>
            </div>
        </div>
    </div>
@endsection
