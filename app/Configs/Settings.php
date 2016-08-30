<?php
/**
 * Параметры
 *
 * @version 30.08.2016
 * @author Дмитрий Щербаков <atomcms@ya.ru>
 */

namespace MFLPHP\Configs;

class Settings
{
    // Это боевой сервер если стоит значение TRUE
    // Необходим для подставления .min в подключении скриптов и пропуска отправки почты на локальном компьютере
    const PRODUCTION = false;

    // Отображать TRUE или нет FALSE подробную информацию об ошибке
    // Используется библиотека Whoops
    const DEBUG = true;

    // Путь до корня, с начальной "/", но без конечной "/"
    // Пример: "/" - если приложение находится в корне домена
    // Пример: "/proj_sub_folder" - если приложение находится в каталоге
    const PATH_SHORT_ROOT = '/';

    // База данных
    const DB_HOST     = 'localhost';
    const DB_PORT     = 3306;
    const DB_DATABASE = 'mflphp';
    const DB_USER     = 'root';
    const DB_PASSWORD = '';
}
