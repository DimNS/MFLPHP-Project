<div class="auth">
    <div class="auth-container">
        <div class="card">
            <header class="auth-header">
                <h1 class="auth-title">
                    <img src="<?=$this->path?>/assets/img/logo.png">
                </h1>
            </header>

            <div class="auth-content">
                <p class="text-<?=$this->message_code?>"><?=$this->message_text?></p>
                <form id="signup-form" action="<?=$this->path?>/user/register" method="post" novalidate="">
                    <div class="form-group">
                        <label>Ваше имя</label>
                        <input type="text" class="form-control underlined" name="name" placeholder="Введите ваше имя" required="">
                    </div>
                    <div class="form-group">
                        <label>Адрес электронной почты</label>
                        <input type="email" class="form-control underlined" name="email" placeholder="Введите адрес электронной почты" required="">
                    </div>
                    <div class="form-group">
                        <p>
                            Пароль будет выслан на почту сразу после регистрации.
                        </p>
                    </div>
                    <div class="form-group">
                        <label>
                            <input class="checkbox" name="agree" type="checkbox" required="">
                            <span>Я принимаю все условия публичной офёрты и соглашаюсь с политикой конфиденциальности.</span>
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
                        <button type="submit" class="btn btn-block btn-primary">Зарегистрироваться</button>
                    </div>
                    <div class="form-group">
                        <p class="text-muted text-xs-center">
                            Уже есть аккаунт? <a href="<?=$this->path?>/">Войти!</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>