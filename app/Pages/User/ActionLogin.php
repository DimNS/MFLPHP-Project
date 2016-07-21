<?php
/**
 * Аутентификация
 *
 * @version ===
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace MyApp\Pages\User;

use MFLPHP\Helpers;

class ActionLogin
{
    /**
     * Контейнер
     *
     * @var object
     */
    private $di;

    /**
     * Конструктор
     *
     * @param object $di Контейнер
     *
     * @return null
     *
     * @version ===
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function __construct($di)
    {
        $this->di = $di;
    }

    /**
     * Выполним действие
     *
     * @param string $user_email Адрес электронной почты
     * @param string $user_pass  Пароль пользователя
     *
     * @return array
     *
     * @version ===
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function run($user_email, $user_pass)
    {
        $user = [
            'access'  => 'denied',
            'message' => '',
        ];

        $loginResult = $this->di->auth->login($user_email, $user_pass, false);

        if ($loginResult['error'] === false) {
            $user_id = $this->di->auth->getUID($user_email);
            if ($user_id !== false) {
                $user_info = \ORM::for_table('users_info')
                    ->where_equal('uid', $user_id)
                    ->find_one();
                if (is_object($user_info)) {
                    $user_info->last_login = Helpers\FormatTime::convert($this->di->cfg->time);
                    $user_info->save();

                    setcookie($this->di->auth->config->cookie_name, $loginResult['hash'], $loginResult['expire'], $this->di->auth->config->cookie_path, $this->di->auth->config->cookie_domain, $this->di->auth->config->cookie_secure, $this->di->auth->config->cookie_http);

                    $user = [
                        'access'  => 'granted',
                        'message' => 'Добро пожаловать!',
                    ];
                } else {
                    $user['message'] = 'Произошла ошибка при изменении данных. Попробуйте войти ещё раз.';
                }
            } else {
                $user['message'] = 'Данные пользователя не найдены. Попробуйте войти ещё раз.';
            }
        } else {
            $user['message'] = $loginResult['message'];
        }

        return $user;
    }
}
