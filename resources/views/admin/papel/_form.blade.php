<div class="input-field">
    <input type="text" name="nome" id="nome" class="validate" value="{{ isset($papel->nome) ? $papel->nome : '' }}">
    <label for="nome">Nome</label>
</div>
<div class="input-field">
    <input type="text" name="descricao" id="descricao" class="validate"
        value="{{ isset($papel->descricao) ? $papel->descricao : '' }}">
    <label for="descricao">Descrição</label>
</div>
