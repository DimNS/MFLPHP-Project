<p>
    <img src="<?=$this->path?>assets/img/logo.png">
</p>
<p class="<?=$this->message_code?>">
    <?=$this->message_text?>
</p>
<form id="lost-form" action="<?=$this->path?>user/lost" method="post">
    <p>
        <label>Укажите адрес электронной почты на которую зарегистрирован пользователь</label>
        <input type="email" name="email" placeholder="Адрес электронной почты">
    </p>
    <p>
        <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
        <button type="submit">Сбросить пароль</button>
    </p>
    <p>
        <a href="<?=$this->path?>">Войти</a>
        &nbsp;|&nbsp;
        <a href="<?=$this->path?>user/register">Зарегистрироваться</a>
    </p>
</form>