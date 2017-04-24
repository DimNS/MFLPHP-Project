<form id="lost-form" action="<?=$this->path?>user/lost" method="post">
    <div>
        <label>Укажите адрес электронной почты на которую зарегистрирован пользователь</label>
        <input type="email" name="email" placeholder="Адрес электронной почты">
    </div>
    <div>
        <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
        <button type="submit">Сбросить пароль</button>
    </div>
    <div>
        <a href="<?=$this->path?>">Войти</a>
        &nbsp;|&nbsp;
        <a href="<?=$this->path?>user/register">Зарегистрироваться</a>
    </div>
</form>