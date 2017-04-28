<?php
/**
 * Конфигурация
 *
 * @version 22.04.2017
 * @author  Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace MFLPHP\Configs;

class Config
{
    /**
     * Полный путь до корня проекта
     *
     * @var string
     */
    public $abs_root_path;

    /**
     * Конструктор
     *
     * @version 13.09.2016
     * @author  Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function __construct()
    {
        // Определим полный путь до корня проекта
        $this->abs_root_path = $_SERVER['DOCUMENT_ROOT'] . Settings::PATH_SHORT_ROOT;
    }
}
