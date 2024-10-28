<div class="slider">
    <ul class="slides">
        @foreach ($slides as $slide)
            <li onclick="window.location='{{ $slide->link }}'">
                <img src="{{ $slide->imagem }}" alt="Imagem {{ $slide->oredem }}">
                <div class="caption {{ $directionImage[rand(0,2)] }}">
                    <h3>{{ $slide->titulo }}</h3>
                    <h5>{{ $slide->descricao }}</h5>
                    @if ($slide->link !== null)
                        <a href="{{ $slide->link }}" class="btn btn-large blue">Mais...</a>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
