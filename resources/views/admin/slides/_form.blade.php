@if (isset($slide->imagem))
    <div class="input-field">
        <input type="text" name="titulo" id="titulo" class="validate"
            value="{{ isset($slide->titulo) ? $slide->titulo : '' }}">
        <label for="titulo">Título</label>
    </div>

    <div class="input-field">
        <input type="text" name="descricao" id="descricao" class="validate"
            value="{{ isset($slide->descricao) ? $slide->descricao : '' }}">
        <label for="descricao">Descrição</label>
    </div>

    <div class="input-field">
        <input type="text" name="link" id="link" class="validate"
            value="{{ isset($slide->link) ? $slide->link : '' }}">
        <label for="link">Link</label>
    </div>

    <div class="input-field">
        <input type="text" name="ordem" id="ordem" class="validate"
            value="{{ isset($slide->ordem) ? $slide->ordem : '' }}">
        <label for="ordem">Ordem</label>
    </div>

    <div class="input-field">
        <select name="publicado" id="publicado" class="validate">
            <option value="sim" {{ isset($imovel->publicado) && $imovel->publicado == 'sim' ? 'selected' : '' }}>
                Sim
            </option>
            <option value="nao" {{ isset($imovel->publicado) && $imovel->publicado == 'nao' ? 'selected' : '' }}>
                Não
            </option>
        </select>
        <label for="publicado">Publicado</label>
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
            <img width="120" src="{{ asset($slide->imagem) }}" alt="Imagem">
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
