@if (isset($galeria->imagem))
    <div class="input-field">
        <input type="text" name="titulo" id="titulo" class="validate"
            value="{{ isset($galeria->titulo) ? $galeria->titulo : '' }}">
        <label for="titulo">Título</label>
    </div>

    <div class="input-field">
        <input type="text" name="descricao" id="descricao" class="validate"
            value="{{ isset($galeria->descricao) ? $galeria->descricao : '' }}">
        <label for="descricao">Descrição</label>
    </div>

    <div class="input-field">
        <input type="text" name="ordem" id="ordem" class="validate"
            value="{{ isset($galeria->ordem) ? $galeria->ordem : '' }}">
        <label for="ordem">Ordem</label>
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
            <img width="120" src="{{ asset($galeria->imagem) }}" alt="Imagem">
        </div>
    </div>
@else
    <div class="row">
        <div class="file-field input-field col m6 s12">
            <div class="btn">
                <span>Upload de Imagem</span>
                <input type="file" multiple name="imagem[]">
            </div>
            <div class="file-path-wrapper">
                <input type="text" class="file-path validate">
            </div>
        </div>
    </div>
@endif
