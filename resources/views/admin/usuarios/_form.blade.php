<div class="input-field">
    <input type="text" name="name" id="name" class="validate"
        value="{{isset($usuario->name) ? $usuario->name : ''}}">
    <label for="name">Nome</label>
</div>

<div class="input-field">
    <input type="email" name="email" id="email" class="validate"
        value="{{isset($usuario->email) ? $usuario->email : ''}}">
    <label for="email">Email</label>
</div>

<div class="input-field">
    <input type="password" name="password" id="password" class="validate">
    <label for="password">Senha</label>
</div>
