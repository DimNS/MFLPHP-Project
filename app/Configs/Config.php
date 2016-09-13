<?php
/**
 * Конфигурация
 *
 * @version 13.09.2016
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
     * Конструктор
     *
     * @return null
     *
     * @version 13.09.2016
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function __construct()
    {
        // Текущее время по гринвичу
        $this->time = time();

        // Определим полный путь до корня проекта
        $this->abs_root_path = $_SERVER['DOCUMENT_ROOT'] . Settings::PATH_SHORT_ROOT;
    }
}
