<?php
/**
 * Настройки
 *
 * @version 27.07.2016
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace MFLPHP\Configs;

class Config
{
    /**
     * Текущее время по гринвичу
     *
     * @var integer
     */
    public $time;

    /**
     * Полный путь до корня проекта
     *
     * @var string
     */
    public $abs_root_path;

    /**
     * Шаблоны для писем
     *
     * @var array
     */
    public $email_templates;

    /**
     * Конструктор
     *
     * @return null
     *
     * @version 27.07.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function __construct()
    {
        // Текущее время по гринвичу
        $this->time = time();

        // Определим полный путь до корня проекта
        $this->abs_root_path = $_SERVER['DOCUMENT_ROOT'] . getenv('PATH_SHORT_ROOT');

        // Шаблоны для писем
        $this->email_templates = [
            'header' => '
                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;background:#eee;">
                    <tr>
                        <td style="padding:20px;">
                            <table border="0" cellpadding="10" cellspacing="0" align="center" style="width:600px;color:#444444;font-size:14px;font-family:arial,helvetica,sans-serif;line-height:1.5;border:5px #aed0ea solid;background:#fff;">
                                <tbody>
                                    <tr>
                                        <td align="center"><img src="cid:logotype" style="max-height:60px;"></td>
                                    </tr>
            ',
            'footer' => '
                                    <tr>
                                        <td>
                                            <strong>С уважением,</strong><br>
                                            ваш персональный менеджер<br>
                                            Дмитрий Щербаков<br>
                                            <a href="mailto:info@bestion.ru" style="color:#3baae3;">info@bestion.ru</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            ',
            'user_register' => '
                <tr>
                    <td>Добро пожаловать!</td>
                </tr>
                <tr>
                    <td>Вы <strong>успешно зарегистрировались</strong> на сайте "[[SITE_NAME]]".</td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <table border="0" cellpadding="20" cellspacing="0" align="center" style="background:#d7ebf9;line-height:2;">
                            <tr>
                                <td style="text-align:left;">
                                    Данные для входа:<br>
                                    Почта: <strong>[[USER_EMAIL]]</strong><br>
                                    Пароль: <strong>[[USER_PASSWORD]]</strong>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Для начала работы, пройдите по этой ссылке:</td>
                </tr>
                <tr>
                    <td align="center">
                        <a href="[[SITE_URL]]" style="background:#3baae3;color:#ffffff;font-size:24px;padding:10px 40px;text-decoration:none;">Начать работу</a>
                    </td>
                </tr>
            ',
            'user_lost' => '
                <tr>
                    <td>Мы получили запрос на <strong>восстановление пароля</strong> к вашему аккаунту <strong>[[USER_EMAIL]]</strong> на сайте "[[SITE_NAME]]".</td>
                </tr>
                <tr>
                    <td>В целях безопасности мы не храним оригинальный пароль, а только можем сменить его на новый.</td>
                </tr>
                <tr>
                    <td>Пожалуйста, перейдите по ссылке, чтобы установить новый пароль:</td>
                </tr>
                <tr>
                    <td align="center">
                        <a href="[[SITE_URL]]/user/reset/[[KEY]]" style="background:#3baae3;color:#ffffff;font-size:24px;padding:10px 40px;text-decoration:none;">Получить новый пароль</a>
                    </td>
                </tr>
                <tr>
                    <td>Если вы не запрашивали сброс пароля на сайте "[[SITE_NAME]]", значит это сообщение вы получили по ошибке. Пожалуйста, проигнорируйте его.</td>
                </tr>
            ',
        ];
    }
}
