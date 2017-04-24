<form id="reset-form" action="<?=$this->path?>user/reset" method="post">
    <div>
        <label>Укажите новый пароль</label>
        <input type="password" name="password" placeholder="Пароль">
    </div>
    <div>
        <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
        <input type="hidden" name="key" value="<?=xss($this->key)?>">
        <button type="submit">Сохранить новый пароль</button>
    </div>
    <div>
        <a href="<?=$this->path?>">Войти</a>
        &nbsp;|&nbsp;
        <a href="<?=$this->path?>user/register">Зарегистрироваться</a>
    </div>
</form>