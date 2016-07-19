<p><?=$this->message?></p>

<div class="clearfix">
    <div class="pull-left">
        <form method="post" action="<?=$this->path?>/user/login" class="c-form">
            <p class="c-form__title">Вход</p>
            <p><input type="text" name="email" placeholder="Адрес электронной почты"></p>
            <p><input type="password" name="password" placeholder="Пароль"></p>
            <p>
                <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
                <input type="submit" value="Войти">
            </p>
            <p><a href="<?=$this->path?>/user/lost">Я не помню пароль</a></p>
        </form>
    </div>
    <div class="pull-left">
        <div class="c-form__block-separator">
            <p class="c-form__title">ИЛИ</p>
        </div>
    </div>
    <div class="pull-left">
        <form method="post" action="<?=$this->path?>/user/register" class="c-form">
            <p class="c-form__title">Регистрация</p>
            <p><input type="text" name="name" placeholder="Ваше имя"></p>
            <p><input type="text" name="email" placeholder="Адрес электронной почты"></p>
            <p>
                <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
                <input type="submit" value="Зарегистрироваться">
            </p>
            <p>
                Пароль будет выслан на почту<br>
                сразу после регистрации.
            </p>
        </form>
    </div>
</div>