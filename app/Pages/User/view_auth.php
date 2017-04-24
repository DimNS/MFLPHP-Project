<form id="login-form" action="<?=$this->path?>user/login" method="post">
    <div>
        <label>Адрес электронной почты</label>
        <input type="email" name="email" placeholder="Ваш адрес электронной почты">
    </div>
    <div>
        <label>Пароль</label>
        <a href="<?=$this->path?>user/lost">Я не помню пароль</a>
        <input type="password" name="password" placeholder="Ваш пароль">
    </div>
    <div>
        <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
        <button type="submit">Войти</button>
    </div>
    <div>
        У вас нет аккаунта? <a href="<?=$this->path?>user/register">Зарегистрироваться!</a>
    </div>
</form>