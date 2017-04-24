<form id="signup-form" action="<?=$this->path?>user/register" method="post">
    <div>
        <label>Ваше имя</label>
        <input type="text" name="name" placeholder="Введите ваше имя">
    </div>
    <div>
        <label>Адрес электронной почты</label>
        <input type="email" name="email" placeholder="Введите адрес электронной почты">
    </div>
    <div>
        Пароль будет выслан на почту сразу после регистрации.
    </div>
    <div>
        <strong>Регистрируясь, вы принимаете все условия <a href="#">публичной офёрты</a> и соглашаетесь с <a href="#">политикой конфиденциальности</a>.</strong>
    </div>
    <div>
        <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
        <button type="submit">Зарегистрироваться</button>
    </div>
    <div>
        Уже есть аккаунт? <a href="<?=$this->path?>">Войти!</a>
    </div>
</form>