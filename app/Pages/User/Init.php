<?php
/**
 * Контроллер пользователей
 *
 * @version ===
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace MyApp\Pages\User;

class Init extends \MFLPHP\Abstracts\PageController
{
    /**
     * Префикс для подстановки в путь до представления
     *
     * @var string
     */
    private $view_prefix = 'Pages/User/view_';

    //
    //                                  ,,
    //                                  db            mm
    //                                                MM
    //     `7Mb,od8 .gP"Ya   .P"Ybmmm `7MM  ,pP"Ybd mmMMmm .gP"Ya `7Mb,od8
    //       MM' "',M'   Yb :MI  I8     MM  8I   `"   MM  ,M'   Yb  MM' "'
    //       MM    8M""""""  WmmmP"     MM  `YMMMa.   MM  8M""""""  MM
    //       MM    YM.    , 8M          MM  L.   I8   MM  YM.    ,  MM
    //     .JMML.   `Mbmmd'  YMMMMMb  .JMML.M9mmmP'   `Mbmo`Mbmmd'.JMML.
    //                      6'     dP
    //                      Ybmmmd'

    /**
     * Регистрация
     *
     * @return null
     *
     * @version ===
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function register()
    {
        if ($this->request->method('post') === true) {
            $register = new ActionRegister($this->di);
            $result   = $register->run($this->request->param('name'), $this->request->param('email'));

            if ($result['error'] === false) {
                $this->response->redirect(getenv('PATH_SHORT_ROOT'), 200);
            } else {
                $this->service->title   = $this->di->auth->config->site_name;
                $this->service->uri     = $this->request->uri();
                $this->service->message = $result['message'];

                $this->service->render(__DIR__ . '/../../' . $this->view_prefix . 'register.php');
            }
        } else {
            $this->service->title   = $this->di->auth->config->site_name;
            $this->service->uri     = $this->request->uri();
            $this->service->message = 'Регистрация нового аккаунта';

            $this->service->render(__DIR__ . '/../../' . $this->view_prefix . 'register.php');
        }
    }

    //
    //       ,,                       ,,
    //     `7MM                       db
    //       MM
    //       MM  ,pW"Wq.   .P"Ybmmm `7MM  `7MMpMMMb.
    //       MM 6W'   `Wb :MI  I8     MM    MM    MM
    //       MM 8M     M8  WmmmP"     MM    MM    MM
    //       MM YA.   ,A9 8M          MM    MM    MM
    //     .JMML.`Ybmd9'   YMMMMMb  .JMML..JMML  JMML.
    //                    6'     dP
    //                    Ybmmmd'

    /**
     * Аутентификация
     *
     * @return null
     *
     * @version ===
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function login()
    {
        $login  = new ActionLogin($this->di);
        $result = $login->run($this->request->param('email'), $this->request->param('password'));

        if ($result['error'] === false) {
            $this->response->redirect(getenv('PATH_SHORT_ROOT'), 200);
        } else {
            $this->service->title   = $this->di->auth->config->site_name;
            $this->service->uri     = $this->request->uri();
            $this->service->message = $result['message'];

            $this->service->render(__DIR__ . '/../../' . $this->view_prefix . 'auth.php');
        }
    }

    //
    //       ,,
    //     `7MM                                         mm
    //       MM                                         MM
    //       MM  ,pW"Wq.   .P"Ybmmm ,pW"Wq.`7MM  `7MM mmMMmm
    //       MM 6W'   `Wb :MI  I8  6W'   `Wb MM    MM   MM
    //       MM 8M     M8  WmmmP"  8M     M8 MM    MM   MM
    //       MM YA.   ,A9 8M       YA.   ,A9 MM    MM   MM
    //     .JMML.`Ybmd9'   YMMMMMb  `Ybmd9'  `Mbod"YML. `Mbmo
    //                    6'     dP
    //                    Ybmmmd'

    /**
     * Выход
     *
     * @return null
     *
     * @version ===
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function logout()
    {
        $logout = new ActionLogout($this->di);
        $logout->run($_COOKIE['authID']);

        $this->response->redirect(getenv('PATH_SHORT_ROOT'), 200);
    }

    //
    //       ,,
    //     `7MM                     mm
    //       MM                     MM
    //       MM  ,pW"Wq.  ,pP"Ybd mmMMmm
    //       MM 6W'   `Wb 8I   `"   MM
    //       MM 8M     M8 `YMMMa.   MM
    //       MM YA.   ,A9 L.   I8   MM
    //     .JMML.`Ybmd9'  M9mmmP'   `Mbmo
    //
    //

    /**
     * Запрос на восстановление пароля
     *
     * @return null
     *
     * @version ===
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function lost()
    {
        if ($this->request->method('post') === true) {
            $lost   = new ActionLost($this->di);
            $result = $lost->run($this->request->param('email'));

            $this->service->title   = $this->di->auth->config->site_name;
            $this->service->uri     = $this->request->uri();
            $this->service->message = $result['message'];

            $this->service->render(__DIR__ . '/../../' . $this->view_prefix . 'lost.php');
        } else {
            $this->service->title   = $this->di->auth->config->site_name;
            $this->service->uri     = $this->request->uri();
            $this->service->message = 'Сброс пароля';

            $this->service->render(__DIR__ . '/../../' . $this->view_prefix . 'lost.php');
        }
    }

    //
    //
    //                                        mm
    //                                        MM
    //     `7Mb,od8 .gP"Ya  ,pP"Ybd  .gP"Ya mmMMmm
    //       MM' "',M'   Yb 8I   `" ,M'   Yb  MM
    //       MM    8M"""""" `YMMMa. 8M""""""  MM
    //       MM    YM.    , L.   I8 YM.    ,  MM
    //     .JMML.   `Mbmmd' M9mmmP'  `Mbmmd'  `Mbmo
    //
    //

    /**
     * Проверка ключа на восстановление пароля
     *
     * @return null
     *
     * @version ===
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function reset()
    {
        $reset = new ActionReset($this->di, $this->request->param('key'));

        if ($this->request->method('post') === true) {
            $result = $reset->resetPassword($this->request->param('password'));
        } else {
            $result = $reset->showForm();
        }

        $this->service->title   = $this->di->auth->config->site_name;
        $this->service->uri     = $this->request->uri();
        $this->service->key     = $this->request->param('key');

        if ($result['error'] === false) {
            if ($this->request->method('post') == true) {
                $this->service->message = $result['message'];
                $template = 'auth';
            } else {
                $this->service->message = 'Восстановление пароля';
                $template = 'reset';
            }

            $this->service->render(__DIR__ . '/../../' . $this->view_prefix . $template . '.php');
        } else {
            if ($this->request->method('post') === true) {
                $this->service->message = 'Восстановление пароля';
                $template = 'reset';
            } else {
                $this->service->message = $result['message'];
                $template = 'auth';
            }

            $this->service->render(__DIR__ . '/../../' . $this->view_prefix . $template . '.php');
        }
    }

    //
    //                                                            ,...,,    ,,
    //                        mm   `7MM"""Mq.                   .d' ""db  `7MM
    //                        MM     MM   `MM.                  dM`         MM
    //      .P"Ybmmm .gP"Ya mmMMmm   MM   ,M9 `7Mb,od8 ,pW"Wq. mMMmm`7MM    MM  .gP"Ya
    //     :MI  I8  ,M'   Yb  MM     MMmmdM9    MM' "'6W'   `Wb MM    MM    MM ,M'   Yb
    //      WmmmP"  8M""""""  MM     MM         MM    8M     M8 MM    MM    MM 8M""""""
    //     8M       YM.    ,  MM     MM         MM    YA.   ,A9 MM    MM    MM YM.    ,
    //      YMMMMMb  `Mbmmd'  `Mbmo.JMML.     .JMML.   `Ybmd9'.JMML..JMML..JMML.`Mbmmd'
    //     6'     dP
    //     Ybmmmd'

    /**
     * Отображение профиля пользователя
     *
     * @return null
     *
     * @version ===
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function getProfile()
    {
        if ($this->di->auth->isLogged()) {
            $this->service->title    = 'Мой профиль | ' . $this->di->auth->config->site_name;
            $this->service->userinfo = $this->di->userinfo;

            $template_file = $this->view_prefix . 'profile';
        } else {
            $this->service->title   = $this->di->auth->config->site_name;
            $this->service->message = 'Необходимо войти в систему.';

            $template_file = $this->view_prefix . 'auth';
        }

        $this->service->uri = $this->request->uri();

        $this->service->render(__DIR__ . '/../../' . $template_file . '.php');
    }

    //
    //              ,,                                                                                                                        ,,
    //            `7MM                                             `7MM"""Mq.                                                               `7MM
    //              MM                                               MM   `MM.                                                                MM
    //      ,p6"bo  MMpMMMb.   ,6"Yb.  `7MMpMMMb.  .P"Ybmmm .gP"Ya   MM   ,M9 ,6"Yb.  ,pP"Ybd ,pP"Ybd `7M'    ,A    `MF',pW"Wq.`7Mb,od8  ,M""bMM
    //     6M'  OO  MM    MM  8)   MM    MM    MM :MI  I8  ,M'   Yb  MMmmdM9 8)   MM  8I   `" 8I   `"   VA   ,VAA   ,V 6W'   `Wb MM' "',AP    MM
    //     8M       MM    MM   ,pm9MM    MM    MM  WmmmP"  8M""""""  MM       ,pm9MM  `YMMMa. `YMMMa.    VA ,V  VA ,V  8M     M8 MM    8MI    MM
    //     YM.    , MM    MM  8M   MM    MM    MM 8M       YM.    ,  MM      8M   MM  L.   I8 L.   I8     VVV    VVV   YA.   ,A9 MM    `Mb    MM
    //      YMbmd'.JMML  JMML.`Moo9^Yo..JMML  JMML.YMMMMMb  `Mbmmd'.JMML.    `Moo9^Yo.M9mmmP' M9mmmP'      W      W     `Ybmd9'.JMML.   `Wbmd"MML.
    //                                            6'     dP
    //                                            Ybmmmd'

    /**
     * Запрос на смену пароля
     *
     * @return null
     *
     * @version ===
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function changePassword()
    {
        if ($this->di->auth->isLogged()) {
            $userinfo = $this->di->userinfo;

            $change_password = new ActionChangePassword($this->di);
            $result          = $change_password->run($userinfo->uid, $this->request->param('new_password'), $this->request->param('old_password'));
        } else {
            $result = [
                'error'   => true,
                'message' => 'Необходимо войти в систему.',
            ];
        }

        $this->response->json($result);
    }

    //
    //              ,,                                                                                      ,,    ,,
    //            `7MM                                             `7MM"""YMM                               db  `7MM
    //              MM                                               MM    `7                                     MM
    //      ,p6"bo  MMpMMMb.   ,6"Yb.  `7MMpMMMb.  .P"Ybmmm .gP"Ya   MM   d    `7MMpMMMb.pMMMb.   ,6"Yb.  `7MM    MM
    //     6M'  OO  MM    MM  8)   MM    MM    MM :MI  I8  ,M'   Yb  MMmmMM      MM    MM    MM  8)   MM    MM    MM
    //     8M       MM    MM   ,pm9MM    MM    MM  WmmmP"  8M""""""  MM   Y  ,   MM    MM    MM   ,pm9MM    MM    MM
    //     YM.    , MM    MM  8M   MM    MM    MM 8M       YM.    ,  MM     ,M   MM    MM    MM  8M   MM    MM    MM
    //      YMbmd'.JMML  JMML.`Moo9^Yo..JMML  JMML.YMMMMMb  `Mbmmd'.JMMmmmmMMM .JMML  JMML  JMML.`Moo9^Yo..JMML..JMML.
    //                                            6'     dP
    //                                            Ybmmmd'

    /**
     * Запрос на смену адреса электронной почты
     *
     * @return null
     *
     * @version ===
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function changeEmail()
    {
        if ($this->di->auth->isLogged()) {
            $userinfo = $this->di->userinfo;

            $change_email = new ActionChangeEmail($this->di);
            $result       = $change_email->run($userinfo->uid, $this->request->param('new_email'), $this->request->param('password'));
        } else {
            $result = [
                'error'   => true,
                'message' => 'Необходимо войти в систему.',
            ];
        }

        $this->response->json($result);
    }
}
