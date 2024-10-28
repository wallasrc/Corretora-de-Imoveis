<div class="input-field">
    <input type="text" name="titulo" id="titulo" class="validate"
        value="{{ isset($imovel->titulo) ? $imovel->titulo : '' }}">
    <label for="titulo">Título</label>
</div>

<div class="input-field">
    <input type="text" name="descricao" id="descricao" class="validate"
        value="{{ isset($imovel->descricao) ? $imovel->descricao : '' }}">
    <label for="descricao">Descrição</label>
</div>

<div class="input-field">
    <select name="status" id="status" class="validate">
        <option value="" disabled {{ !isset($imovel->status) ? 'selected' : '' }}>Selecione o status</option>
        <option value="vende" {{ isset($imovel->status) && $imovel->status == 'vende' ? 'selected' : '' }}>Vende
        </option>
        <option value="aluga" {{ isset($imovel->status) && $imovel->status == 'aluga' ? 'selected' : '' }}>Aluga
        </option>
    </select>
</div>
<div class="input-field">
    <select name="tipo_id" id="tipo_id">
        <option value="" disabled {{ !isset($imovel->status) ? 'selected' : '' }}>Selecione o tipo</option>
        @foreach ($tipos as $tipo)
            <option value="{{ $tipo->id }}"
                {{ isset($imovel->tipo_id) && $imovel->tipo_id === $tipo->id ? 'selected' : '' }}>
                {{ $tipo->titulo }}
            </option>
        @endforeach
    </select>
</div>

<div class="input-field">
    <select name="cidade_id" id="cidade_id">
        <option value="" disabled {{ !isset($imovel->cidade_id) ? 'selected' : '' }}>Selecione a cidade
        </option>
        @foreach ($cidades as $cidade)
            <option value="{{ $cidade->id }}"
                {{ isset($imovel->cidade_id) && $imovel->cidade_id === $cidade->id ? 'selected' : '' }}>
                {{ $cidade->nome }}
            </option>
        @endforeach
    </select>
    <label for="cidade_id">Cidade</label>
</div>
<div class="input-field">
    <input type="text" name="endereco" id="endereco" class="validate"
        value="{{ isset($imovel->endereco) ? $imovel->endereco : '' }}">
    <label for="endereco">Endereço</label>
</div>

<div class="input-field">
    <input type="text" name="cep" id="cep" class="validate"
        value="{{ isset($imovel->cep) ? $imovel->cep : '' }}">
    <label for="cep">CEP</label>
</div>

<div class="input-field">
    <input type="text" name="valor" id="valor" class="validate"
        value="{{ isset($imovel->valor) ? $imovel->valor : '' }}">
    <label for="valor">Valor</label>
</div>

<div class="input-field">
    <input type="text" name="dormitorios" id="dormitorios" class="validate"
        value="{{ isset($imovel->dormitorios) ? $imovel->dormitorios : '' }}">
    <label for="dormitorios">Dormitórios</label>
</div>

<div class="input-field">
    <input type="text" name="detalhes" id="detalhes" class="validate"
        value="{{ isset($imovel->detalhes) ? $imovel->detalhes : '' }}">
    <label for="detalhes">Detalhes</label>
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
        @if (isset($imovel->imagem))
            <img width="120" src="{{ asset($imovel->imagem) }}" alt="Imagem">
        @endif
    </div>
</div>

<div class="input-field">
    <textarea class="materialize-textarea" name="mapa" id="mapa" cols="30" rows="10">
    {{ isset($imovel->mapa) ? $imovel->mapa : '' }}
</textarea>
    <label for="mapa">Mapa</label>
</div>

<div class="input-field">
    <select name="publicar" id="publicar" class="validate">
        <option value="sim" {{ isset($imovel->publicar) && $imovel->publicar == 'sim' ? 'selected' : '' }}>
            Sim
        </option>
        <option value="nao" {{ isset($imovel->publicar) && $imovel->publicar == 'nao' ? 'selected' : '' }}>
            Não
        </option>
    </select>
    <label for="publicar">Publicar</label>
</div>
