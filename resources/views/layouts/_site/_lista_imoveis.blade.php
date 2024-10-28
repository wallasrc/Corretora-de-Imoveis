<div class="row section">
    <h3 align="center">Imóveis</h3>
    <div class="divider"></div>
    <br>
    @include('layouts._site._filtros')
</div>

<div class="row section">
    @foreach ($imoveis as $imovel)
        <div class="col s12 m3">
            <div class="card">
                <div class="card-image">
                    <a href="{{ route('site.imovel', [$imovel->id, Str::slug($imovel->titulo, '_')]) }}">
                        <img src="{{ asset($imovel->imagem) }}" alt="Imagem do imóvel">
                    </a>
                </div>
                <div class="card-content">
                    <p><b class="deep-orange-text dark-1">{{ strtoupper($imovel->status) }}</b></p>
                    <p><b>{{ $imovel->titulo }}</b></p>
                    <p>{{ Str::limit($imovel->descricao, 50) }}</p>
                    <p>R$ {{ number_format($imovel->valor, 2, ',', '.') }}</p>
                </div>
                <div class="card-action">
                    <a href="{{ route('site.imovel', [$imovel->id, Str::slug($imovel->titulo, '_')]) }}">Ver mais</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@if ($paginacao)
    <div class="row" align="center">
        <div class="pagination-custom">
            {{ $imoveis->links() }}
        </div>
    </div>
@endif
