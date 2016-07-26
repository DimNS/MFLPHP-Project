<div class="auth">
    <div class="auth-container">
        <div class="card">
            <header class="auth-header">
                <h1 class="auth-title">
                    <img src="<?=$this->path?>/assets/img/logo.png">
                </h1>
            </header>

            <div class="auth-content">
                <form id="login-form" action="<?=$this->path?>/user/login" method="post" novalidate="">
                    <p><?=$this->message?></p>
                    <div class="form-group">
                        <label>Адрес электронной почты</label>
                        <input type="email" class="form-control underlined" name="email" placeholder="Ваш адрес электронной почты" required>
                    </div>
                    <div class="form-group">
                        <label>Пароль</label>
                        <a href="<?=$this->path?>/user/lost" class="pull-right">Я не помню пароль</a>
                        <input type="password" class="form-control underlined" name="password" placeholder="Ваш пароль" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
                        <button type="submit" class="btn btn-block btn-primary">Войти</button>
                    </div>
                    <div class="form-group">
                        <p class="text-muted text-xs-center">
                            У вас нет аккаунта? <a href="<?=$this->path?>/user/register">Зарегистрироваться!</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>