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
            $template_file = 'main';
        } else {
            $template_file = 'auth';
            $this->service->message = 'Необходимо войти в систему.';
        }

        $this->service->uri   = $this->request->uri();
        $this->service->title = getenv('PROJECT_NAME');

        $this->service->render(__DIR__ . '/../../Views/' . $template_file . '.php');
    }
}
