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
        $register = new ActionRegister($this->di);
        $result   = $register->run($this->request->param('name'), $this->request->param('email'));

        if ($result['access'] === 'granted') {
            $this->response->redirect(getenv('PATH_SHORT_ROOT'), 200);
        } else {
            $this->service->title   = $this->di->auth->config->site_name;
            $this->service->uri     = $this->request->uri();
            $this->service->message = $result['message'];

            $this->service->render(__DIR__ . '/../../' . $this->view_prefix . 'auth.php');
        }
    }

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

        if ($result['access'] === 'granted') {
            $this->response->redirect(getenv('PATH_SHORT_ROOT'), 200);
        } else {
            $this->service->title   = $this->di->auth->config->site_name;
            $this->service->uri     = $this->request->uri();
            $this->service->message = $result['message'];

            $this->service->render(__DIR__ . '/../../' . $this->view_prefix . 'auth.php');
        }
    }

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
        $lost   = new ActionLost($this->di);
        $result = $lost->run($this->request->param('email'));

        $this->service->title   = $this->di->auth->config->site_name;
        $this->service->uri     = $this->request->uri();
        $this->service->message = $result['message'];

        $this->service->render(__DIR__ . '/../../' . $this->view_prefix . 'auth.php');
    }

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
                $template = 'reset';
            }

            $this->service->render(__DIR__ . '/../../' . $this->view_prefix . $template . '.php');
        } else {
            if ($this->request->method('post') === true) {
                $template = 'reset';
            } else {
                $template = 'auth';
            }

            $this->service->message = $result['message'];
            $this->service->render(__DIR__ . '/../../' . $this->view_prefix . $template . '.php');
        }
    }
}
