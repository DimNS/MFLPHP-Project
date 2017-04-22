<p>
    <img src="<?=$this->path?>assets/img/logo.png">
</p>
<p class="<?=$this->message_code?>">
    <?=$this->message_text?>
</p>
<form id="signup-form" action="<?=$this->path?>user/register" method="post">
    <p>
        <label>Ваше имя</label>
        <input type="text" name="name" placeholder="Введите ваше имя">
    </p>
    <p>
        <label>Адрес электронной почты</label>
        <input type="email" name="email" placeholder="Введите адрес электронной почты">
    </p>
    <p>
        Пароль будет выслан на почту сразу после регистрации.
    </p>
    <p>
        <strong>Регистрируясь, вы принимаете все условия <a href="#">публичной офёрты</a> и соглашаетесь с <a href="#">политикой конфиденциальности</a>.</strong>
    </p>
    <p>
        <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
        <button type="submit">Зарегистрироваться</button>
    </p>
    <p>
        Уже есть аккаунт? <a href="<?=$this->path?>">Войти!</a>
    </p>
</form>