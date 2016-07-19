<?php
/**
 * Контроллер главной страницы
 *
 * @version ===
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace MyApp\Pages\Main;

class Init extends \MFLPHP\Abstracts\PageController
{
    /**
     * Префикс для подстановки в путь до представления
     *
     * @var string
     */
    private $view_prefix = 'Pages/Main/view_';

    /**
     * Запуск главной страницы
     *
     * @return null
     *
     * @version ===
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function start()
    {
        if ($this->di->auth->isLogged()) {
            $template_file = $this->view_prefix . 'main';
        } else {
            $template_file = 'Pages/User/view_auth';
            $this->service->message = 'Необходимо войти в систему.';
        }

        $this->service->uri   = $this->request->uri();
        $this->service->title = getenv('PROJECT_NAME');

        $this->service->render(__DIR__ . '/../../' . $template_file . '.php');
    }
}
