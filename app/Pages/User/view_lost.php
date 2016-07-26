<div class="auth">
    <div class="auth-container">
        <div class="card">
            <header class="auth-header">
                <h1 class="auth-title">
                    <img src="<?=$this->path?>/assets/img/logo.png">
                </h1>
            </header>

            <div class="auth-content">
                <p><?=$this->message?></p>
                <form id="reset-form" action="<?=$this->path?>/user/lost" method="post" novalidate="">
                    <div class="form-group">
                        <label>Укажите адрес электронной почты на которую зарегистрирован пользователь</label>
                        <input type="email" class="form-control underlined" name="email" placeholder="Адрес электронной почты" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
                        <button type="submit" class="btn btn-block btn-primary">Сбросить пароль</button>
                    </div>
                    <div class="form-group clearfix">
                        <a class="pull-left" href="<?=$this->path?>/">Войти</a>
                        <a class="pull-right" href="<?=$this->path?>/user/register">Зарегистрироваться</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>