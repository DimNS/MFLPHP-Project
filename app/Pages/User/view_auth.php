<form method="post" action="<?=$this->path?>/user/login">
    <p><?=$this->message?></p>
    <p><input type="text" name="email" placeholder="Адрес электронной почты"></p>
    <p><input type="password" name="password" placeholder="Пароль"></p>
    <p>
        <input type="hidden" name="do" value="login">
        <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
        <input type="submit" value="Войти">
    </p>
</form>