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
                <form id="reset-form" action="<?=$this->path?>/user/reset" method="post" novalidate="">
                    <div class="form-group">
                        <label>Укажите новый пароль</label>
                        <input type="password" class="form-control underlined" name="password" placeholder="Пароль" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="<?=$this->csrf_token?>">
                        <input type="hidden" name="key" value="<?=$this->key?>">
                        <button type="submit" class="btn btn-block btn-primary">Сохранить новый пароль</button>
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