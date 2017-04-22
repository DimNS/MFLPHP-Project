<div id="js-page-profile">
    <h3>Профиль</h3>

    <p><strong>Мои данные</strong></p>
    <table>
        <tbody>
            <tr>
                <td>#ID:</td>
                <td><strong><?=$this->userinfo->uid?></strong></td>
            <tr>
            </tr>
                <td>Дата регистрации:</td>
                <td><strong><?=$this->di->carbon->createFromFormat('Y-m-d H:i:s', $this->userinfo->created_at)->format('d-m-Y')?></strong></td>
            <tr>
            </tr>
                <td>Электронная почта:</td>
                <td><strong id="js-profile-email"><?=xss($this->userinfo->email)?></strong></td>
            <tr>
            </tr>
                <td>Имя:</td>
                <td><strong><?=xss($this->userinfo->name)?></strong></td>
            <tr>
            </tr>
                <td>Доступ:</td>
                <td><strong><?=xss($this->userinfo->access)?></strong></td>
            </tr>
        </tbody>
    </table>

    <p><strong>Смена пароля</strong></p>
    <p><input type="password" name="new_password" placeholder="Новый пароль"></p>
    <p><input type="password" name="old_password" placeholder="Старый пароль"></p>
    <button id="js-profile-change-password">Сохранить новый пароль</button>

    <p><strong>Смена адреса электронной почты</strong></p>
    <p><input type="text" name="new_email" placeholder="Новый адрес электронной почты"></p>
    <p><input type="password" name="password" placeholder="Текущий пароль"></p>
    <button id="js-profile-change-email">Сохранить новый адрес электронной почты</button>
</div>