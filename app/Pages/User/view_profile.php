<?php
$carbon = new \Carbon\Carbon();
$carbon->setLocale('ru');

$date_register = $carbon->createFromFormat('Y-m-d H:i:s', $this->userinfo->created_at, 'UTC');
?>

<p><?=$this->message?></p>

<p>
    <table>
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
    </table>
</p>

<form id="js-profile-form-change-password" class="c-form">
    <p class="c-form__title">Смена пароля</p>
    <p><input type="password" name="new_password" placeholder="Новый пароль"></p>
    <p><input type="password" name="old_password" placeholder="Старый пароль"></p>
    <p><a href="javascript:;" id="js-profile-change-password">Сохранить новый пароль</a></p>
</form>

<form id="js-profile-form-change-email" class="c-form">
    <p class="c-form__title">Смена адреса электронной почты</p>
    <p><input type="text" name="new_email" placeholder="Новый адрес электронной почты"></p>
    <p><input type="password" name="password" placeholder="Текущий пароль"></p>
    <p><a href="javascript:;" id="js-profile-change-email">Сохранить новый адрес электронной почты</a></p>
</form>