<div class="input-field">
    <input type="text" name="titulo" id="titulo" class="validate"
        value="{{ isset($pagina->titulo) ? $pagina->titulo : '' }}">
    <label for="titulo">Título</label>
</div>
<div class="input-field">
    <input type="text" name="descricao" id="descricao" class="validate"
        value="{{ isset($pagina->descricao) ? $pagina->descricao : '' }}">
    <label for="descricao">Descrição</label>
</div>
@if (isset($pagina->email))
    <div class="input-field">
        <input type="email" name="email" id="email" class="validate"
            value="{{ isset($pagina->email) ? $pagina->email : '' }}">
        <label for="email">Email</label>
    </div>
@endif
<div class="input-field">
    <textarea class="materialize-textarea" name="texto" id="texto" cols="30" rows="10">
        {{ isset($pagina->texto) ? $pagina->texto : '' }}
    </textarea>
    <label for="texto">Texto</label>
</div>

<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn">
            <span>Imagem</span>
            <input type="file" name="imagem">
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validate">
        </div>
    </div>
    <div class="col m6 s12">
        @if (isset($pagina->imagem))
            <img width="120" src="{{ asset($pagina->imagem) }}" alt="Imagem">
        @endif
    </div>
</div>

<div class="input-field">
    <textarea class="materialize-textarea" name="mapa" id="mapa" cols="30" rows="10">
        {{ isset($pagina->mapa) ? $pagina->mapa : '' }}
    </textarea>
    <label for="mapa">Mapa</label>
</div>
