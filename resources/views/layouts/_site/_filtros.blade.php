<div class="row">
    <form action="{{ route('site.busca') }}">
        <div class="input-field col s6 m4">
            <select name="status" id="status">
                <option {{ isset($busca['status']) && $busca['status'] == 'todos' ? 'selected' : '' }} value="todos">Aluga e vende</option>
                <option {{ isset($busca['status']) && $busca['status'] == 'aluga' ? 'selected' : '' }} value="aluga">Aluga</option>
                <option {{ isset($busca['status']) && $busca['status'] == 'vende' ? 'selected' : '' }} value="vende">Vende</option>
            </select>
            <label for="status">Status</label>
        </div>
        <div class="input-field col s6 m4">
            <select name="tipo_id" id="tipo_id">
                <option {{ isset($busca['tipo_id']) && $busca['tipo_id'] == 'todos' ? 'selected' : '' }} value="todos">Todos os tipos</option>
                @foreach ($tipos as $tipo)
                    <option {{ isset($busca['tipo_id']) && $busca['tipo_id'] == $tipo->id ? 'selected' : '' }} value="{{ $tipo->id }}">{{ $tipo->titulo }}</option>
                @endforeach
            </select>
            <label for="tipo_id">Tipo de imóvel</label>
        </div>
        <div class="input-field col s6 m4">
            <select name="cidade_id" id="cidade_id">
                <option  {{ isset($busca['cidade_id']) && $busca['cidade_id'] == 'todos' ? 'selected' : '' }} value="todos">Todas as cidades</option>
                @foreach ($cidades as $cidade)
                    <option  {{ (isset($busca['cidade_id']) && $busca['cidade_id'] == $cidade->id) ? 'selected' : '' }} value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                @endforeach
            </select>
            <label for="cidade_id">Cidades</label>
        </div>
        <div class="input-field col s6 m2">
            <select name="dormitorios" id="dormitorios">
                <option {{ isset($busca['dormitorios']) && $busca['dormitorios'] == 0 ? 'selected' : '' }} value="0">Todos os dormitórios</option>
                <option {{ isset($busca['dormitorios']) && $busca['dormitorios'] == 1 ? 'selected' : '' }} value="1">1</option>
                <option {{ isset($busca['dormitorios']) && $busca['dormitorios'] == 2 ? 'selected' : '' }} value="2">2</option>
                <option {{ isset($busca['dormitorios']) && $busca['dormitorios'] == 3 ? 'selected' : '' }} value="3">3</option>
                <option {{ isset($busca['dormitorios']) && $busca['dormitorios'] == 4 ? 'selected' : '' }} value="4">Mais</option>
            </select>
            <label for="dormitorios">Dormitórios</label>
        </div>
        <div class="input-field col s12 m3">
            <select name="valor" id="valor">
                <option {{ isset($busca['valor']) && $busca['valor'] == 0 ? 'selected' : '' }} value="0">Todos os valores</option>
                <option {{ isset($busca['valor']) && $busca['valor'] == 1 ? 'selected' : '' }} value="1">Até R$ 500,00</option>
                <option {{ isset($busca['valor']) && $busca['valor'] == 2 ? 'selected' : '' }} value="2">R$ 500,00 a R$ 1000,00</option>
                <option {{ isset($busca['valor']) && $busca['valor'] == 3 ? 'selected' : '' }} value="3">R$ 1000,00 a R$ 2000,00</option>
                <option {{ isset($busca['valor']) && $busca['valor'] == 4 ? 'selected' : '' }} value="4">R$ 2000,00 a R$ 3000,00</option>
                <option {{ isset($busca['valor']) && $busca['valor'] == 5 ? 'selected' : '' }} value="5">R$ 3000,00 a R$ 4000,00</option>
                <option {{ isset($busca['valor']) && $busca['valor'] == 6 ? 'selected' : '' }} value="6">R$ 4000,00 a R$ 5000,00</option>
                <option {{ isset($busca['valor']) && $busca['valor'] == 7 ? 'selected' : '' }} value="7">Acima de R$ 5000,00</option>
            </select>
            <label for="valor">Valor</label>
        </div>
        <div class="input-field col s12 m3">
            <input  value="{{ isset($busca['bairro']) ? $busca['bairro'] : '' }}"  type="text" class="validate" name="bairro">
            <label for="bairro">Bairro</label>
        </div>
        <div class="input-field col s6 m4">
            <button class="btn drop-range darken-1 right">Filtrar</button>
        </div>
    </form>
</div>
