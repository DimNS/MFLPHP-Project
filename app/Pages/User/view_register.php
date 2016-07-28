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
                <form id="signup-form" action="<?=$this->path?>/user/register" method="post">
                    <div class="form-group">
                        <label>Ваше имя</label>
                        <input type="text" class="form-control underlined" name="name" placeholder="Введите ваше имя" data-msg-required="Введите ваше имя" required>
                    </div>
                    <div class="form-group">
                        <label>Адрес электронной почты</label>
                        <input type="email" class="form-control underlined" name="email" placeholder="Введите адрес электронной почты" data-rule-email="true" data-msg-required="Введите адрес электронной почты" data-msg-email="Введите корректный адрес электронной почты" required>
                    </div>
                    <div class="form-group">
                        <p>
                            Пароль будет выслан на почту сразу после регистрации.
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                            <strong>Регистрируясь, вы принимаете все условия <a href="#">публичной офёрты</a> и соглашаетесь с <a href="#">политикой конфиденциальности</a>.</strong>
                        </p>
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