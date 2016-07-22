<p><?=$this->message?></p>

<form method="post" action="<?=$this->path?>/user/reset" class="c-form">
    <p class="c-form__title">Укажите новый пароль</p>
    <p><input type="password" name="password" placeholder="Пароль"></p>
    <p>
        <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
        <input type="hidden" name="key" value="<?=$this->key?>">
        <input type="submit" value="Сохранить новый пароль">
    </p>
</form>