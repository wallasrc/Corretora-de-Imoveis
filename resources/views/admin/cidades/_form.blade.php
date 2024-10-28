<div class="input-field">
    <input type="text" name="nome" id="nome" class="validate" value="{{ isset($cidade->nome) ? $cidade->nome : '' }}">
    <label for="nome">Nome</label>
</div>
<div class="input-field">
    <input type="text" name="estado" id="estado" class="validate"
        value="{{ isset($cidade->estado) ? $cidade->estado : '' }}">
    <label for="estado">Estado</label>
</div>
<div class="input-field">
    <input type="text" name="sigla_estado" id="sigla_estado" class="validate"
        value="{{ isset($cidade->sigla_estado) ? $cidade->sigla_estado : '' }}">
    <label for="sigla_estado">Sigla Estado</label>
</div>
