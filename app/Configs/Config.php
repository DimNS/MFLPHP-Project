<?php
/**
 * Настройки
 *
 * @version ===
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace MFLPHP\Configs;

class Config
{
    /**
     * @var integer $time Текущее время по гринвичу
     */
    public $time;

    /**
     * Конструктор
     *
     * @return null
     *
     * @version ===
     * @author Дмитрий Щербаков <atomcms@ya.ru>
     */
    public function __construct()
    {
        $this->time = time();
    }
}
