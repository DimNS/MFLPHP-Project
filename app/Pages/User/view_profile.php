<?php
$carbon = new \Carbon\Carbon();
$carbon->setLocale('ru');

$date_register = $carbon->createFromFormat('Y-m-d H:i:s', $this->userinfo->created_at, 'UTC');
?>

<div class="title-block">
    <h3 class="title">Профиль</h3>
</div>

<div class="row">
    <div class="col-xs-4 col-md-6">
        <div class="card card-default">
            <div class="card-header">
                <div class="header-block">
                    <p class="title">Мои данные</p>
                </div>
            </div>
            <div class="card-block">
                <table class="table table-striped table-hover table-sm">
                    <tbody>
                        <tr>
                            <td>#ID:</td>
                            <td><strong><?=$this->userinfo->uid?></strong></td>
                        <tr>
                        </tr>
                            <td>Дата регистрации:</td>
                            <td><strong><?=$date_register->format('d-m-Y')?></strong></td>
                        <tr>
                        </tr>
                            <td>Электронная почта:</td>
                            <td><strong id="js-profile-email"><?=$this->userinfo->email?></strong></td>
                        <tr>
                        </tr>
                            <td>Имя:</td>
                            <td><strong><?=$this->userinfo->name?></strong></td>
                        <tr>
                        </tr>
                            <td>Доступ:</td>
                            <td><strong><?=$this->userinfo->access?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-4 col-md-6">
        <form id="js-profile-form-change-password">
            <div class="card card-default">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title">Смена пароля</p>
                    </div>
                </div>
                <div class="card-block">
                    <p><input type="password" class="form-control underlined" name="new_password" placeholder="Новый пароль"></p>
                    <p><input type="password" class="form-control underlined" name="old_password" placeholder="Старый пароль"></p>
                </div>
                <div class="card-footer">
                    <a href="javascript:;" id="js-profile-change-password" class="btn btn-success">Сохранить новый пароль</a>
                </div>
            </div>
        </form>
    </div>

    <div class="col-xs-4 col-md-6">
        <form id="js-profile-form-change-email">
            <div class="card card-default">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title">Смена адреса электронной почты</p>
                    </div>
                </div>
                <div class="card-block">
                    <p><input type="text" class="form-control underlined" name="new_email" placeholder="Новый адрес электронной почты"></p>
                    <p><input type="password" class="form-control underlined" name="password" placeholder="Текущий пароль"></p>
                </div>
                <div class="card-footer">
                    <a href="javascript:;" id="js-profile-change-email" class="btn btn-success">Сохранить новый адрес электронной почты</a>
                </div>
            </div>
        </form>
    </div>
</div>