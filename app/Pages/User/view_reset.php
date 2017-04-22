<p>
    <img src="<?=$this->path?>assets/img/logo.png">
</p>
<p class="<?=$this->message_code?>">
    <?=$this->message_text?>
</p>
<form id="reset-form" action="<?=$this->path?>user/reset" method="post">
    <p>
        <label>Укажите новый пароль</label>
        <input type="password" name="password" placeholder="Пароль">
    </p>
    <p>
        <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
        <input type="hidden" name="key" value="<?=xss($this->key)?>">
        <button type="submit">Сохранить новый пароль</button>
    </p>
    <p>
        <a href="<?=$this->path?>">Войти</a>
        &nbsp;|&nbsp;
        <a href="<?=$this->path?>user/register">Зарегистрироваться</a>
    </p>
</form>